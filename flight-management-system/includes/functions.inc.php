<?php

    function emptyInputSignup($fname,$lname,$email,$username,$gender,$pwd,$pwdrepeat){
        $result;
        if(empty($fname) || empty($lname) || empty($email) || empty($username) || empty($gender) || empty($pwd) || empty($pwdrepeat)){
            $result=true;
        }
        else {
            $result=false;
        }
        return $result;
    }
    
    function invalidUid($username){
        $result;
        if( !preg_match("/^[a-zA-Z0-9]*$/", $username) ){
            $result=true;
        }
        else {
            $result=false;
        }
        return $result;
    }

    function invalidEmail($email) {
        $result;
        if( !filter_var($email,FILTER_VALIDATE_EMAIL) ){
            $result=true;
        }
        else {
            $result=false;
        }
        return $result;
    }

    function pwdDontMatch($pwd,$pwdrepeat) {
        $result;
        if($pwd !== $pwdrepeat){
            $result=true;
        }
        else {
            $result=false;
        }
        return $result;
    }

    function uidExists($conn,$username,$email) {
        $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;" ;
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../registration.php?error=stmtfailed");
            exit;
        }
        
        mysqli_stmt_bind_param($stmt,"ss",$username,$email);
        mysqli_stmt_execute($stmt);
        
        $resultData = mysqli_stmt_get_result($stmt);
        
        if($row = mysqli_fetch_assoc($resultData)){
            return $row;
        }
        else {
            $result=false;
            return $result;
        }
        
        mysqli_stmt_close($stmt);
        
    }

    function createUser($conn,$fname,$lname,$email,$username,$gender,$pwd) {
        $sql = "INSERT INTO users(usersFName,usersLName,usersEmail,usersUid,usersGender,usersPwd) VALUES(?,?,?,?,?,?) ;" ;
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../registration.php?error=stmtfailed");
            exit;
        }
        
        $pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);   
    
        mysqli_stmt_bind_param($stmt,"ssssss",$fname,$lname,$email,strtolower($username),$gender,$pwdhashed);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../registration.php?error=none");
        exit();
    }

    function createAdmin($conn,$fname,$lname,$email,$username,$gender,$pwd) {
        $sql = "INSERT INTO users(usersFName,usersLName,usersEmail,usersUid,usersGender,usersPwd,usersAuthority) VALUES(?,?,?,?,?,?,'true') ;" ;
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            header("location: ../registration.php?error=stmtfailed");
            exit;
        }
        
        $pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);   
    
        mysqli_stmt_bind_param($stmt,"ssssss",$fname,$lname,$email,strtolower($username),$gender,$pwdhashed);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("location: ../add_admin.php?error=none");
        exit();
    }

    function emptyInputLogin($username,$pwd){
        $result;
        if(empty($username) || empty($pwd) ){
            $result=true;
        }
        else {
            $result=false;
        }
        return $result;
    }


    function loginUser($conn,$username,$pwd) {
        $uidexists = uidExists($conn,$username,$username);
        
        if($uidexists === false){
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        
        $pwdHashed = $uidexists["usersPwd"];
        $checkPwd = password_verify($pwd,$pwdHashed);
        
        if($checkPwd === false) {
            header("location: ../login.php?error=wronglogin");
            exit();
        }
        else if($checkPwd === true)
        {
            session_start();
            $_SESSION["userid"] = $uidexists["usersId"];
            $_SESSION["useruid"] = $uidexists["usersUid"];
            $_SESSION["username"] = $uidexists["usersUid"];
            $_SESSION["admin"] = $uidexists["usersAuthority"];
            if($_SESSION["admin"]==='true'){
                header("location: ../admin_homepage.php");
                exit();
            }
            else{
                header("location: ../customer_homepage.php");
                exit();
                }
        }
    }

    function changePass($conn,$username,$pwd,$pwdnew){
        $uidexists = uidExists($conn,$username,$username);
        
        if($uidexists === false){
            header("location: ../change_pass.php?error=wrongpass");
            exit();
        }
        
        $pwdHashed = $uidexists["usersPwd"];
        $checkPwd = password_verify($pwd,$pwdHashed);
        
        if($checkPwd === false) {
            header("location: ../change_pass.php?error=wrongpass");
            exit();
        }
        else if($checkPwd === true)
        {
            $sql = "UPDATE users SET usersPwd = ? where usersUid = ?" ;
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("location: ../change_pass.php?error=stmtfailed");
                exit;
            }

            $pwdnewhashed = password_hash($pwdnew, PASSWORD_DEFAULT);   

            mysqli_stmt_bind_param($stmt,"ss",$pwdnewhashed,$username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            header("location: ../change_pass.php?error=none");
            exit();
        }
    }

    function getFligtNo() {
        $todays_date=date('Y-m-d', strtotime('+6 hours')); 
			require_once 'dbh.inc.php';
            $query="SELECT flight_no,from_city,to_city,departure_date,arrival_date,price_economy,price_business,jet_id FROM flight_details where departure_date>=? ORDER BY departure_date";
            
//            $query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
			$stmt=mysqli_prepare($conn,$query);
			mysqli_stmt_bind_param($stmt,"s",$todays_date);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$flight_no,$from_city,$to_city,$departure_date,$arrival_date,$price_economy,$price_business,$jet_id);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt)==0)
			{
				
			}
			else
			{
				while(mysqli_stmt_fetch($stmt)) {
        			echo "<option>".$flight_no."</option>";
    			}
			}
			
			mysqli_stmt_close($stmt);
            mysqli_close($conn);
			
    }

    function getOrigin() {
        $todays_date=date('Y-m-d',strtotime('+6 hours')); 
			require_once 'dbh.inc.php';
            $query="SELECT DISTINCT lower(from_city) FROM flight_details where departure_date>=? ORDER BY departure_date";
            
//            $query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY  journey_date";
			$stmt=mysqli_prepare($conn,$query);
			mysqli_stmt_bind_param($stmt,"s",$todays_date);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_bind_result($stmt,$from_city);
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt)==0)
			{
				
			}
			else
			{
				while(mysqli_stmt_fetch($stmt)) {
        			echo "<option>",ucwords(strtolower($from_city)),"</option>";
    			}
			}
			
			mysqli_stmt_close($stmt);
            mysqli_close($conn);
			
    }

    function getDestination() {
        
        $todays_date=date('Y-m-d',strtotime('+6 hours'));
        
        $serverName="localhost";
        $dBUserName="root";
        $dBPassword="";
        $dBName="flightmanagement";

        $conn_des=mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

        if (!$conn_des) {
            die("Connection failed: ".mysqli_connect_error());
        }
        $query="SELECT DISTINCT lower(to_city) FROM flight_details where departure_date>=? ORDER BY LENGTH(to_city)";
        $stmt_des=mysqli_prepare($conn_des,$query);
        mysqli_stmt_bind_param($stmt_des,"s",$todays_date);
        mysqli_stmt_execute($stmt_des);
        mysqli_stmt_bind_result($stmt_des,$to_city);
        mysqli_stmt_store_result($stmt_des);
        if(mysqli_stmt_num_rows($stmt_des)==0)
        {
            
        }
        else
        {
            while(mysqli_stmt_fetch($stmt_des)) {
                echo "<option>",ucwords($to_city),"</option>";
        }
        }
        
        mysqli_stmt_close($stmt_des);
        mysqli_close($conn_des);
        
    }

    function getFlightId() {
        $todays_date=date('Y-m-d',strtotime('+6 hours'));
        $thirty_days_before_date=date_create(date('Y-m-d'));
        date_sub($thirty_days_before_date,date_interval_create_from_date_string("30 days")); $thirty_days_before_date=date_format($thirty_days_before_date,"Y-m-d");
        require_once 'dbh.inc.php';
        $query="SELECT DISTINCT flight_no FROM flight_details where departure_date>=? ORDER BY departure_date";
        
        // $query="SELECT pnr,date_of_reservation,flight_no,journey_date,class,booking_status,no_of_passengers,payment_id FROM Ticket_Details where customer_id=? AND journey_date>=? AND booking_status='CONFIRMED' ORDER BY journey_date";
        
        $stmt=mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt,"s",$todays_date);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$flight_no);
        mysqli_stmt_store_result($stmt);
        
        if(mysqli_stmt_num_rows($stmt)==0){
            
        }
        else{
            while(mysqli_stmt_fetch($stmt)) {
                echo "<option>",$flight_no,"</option>";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
			
    }

    function getAirCraftId() {
        require_once('Database Connection file/mysqli_connect.php');
        $query="SELECT jet_id FROM jet_details where active=? ";
        $stmt=mysqli_prepare($dbc,$query);
        $active="Yes";
        mysqli_stmt_bind_param($stmt,"s",$active);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$jet_id);
        mysqli_stmt_store_result($stmt);
        
        if(mysqli_stmt_num_rows($stmt)==0) {
            
        }
        else {
            while(mysqli_stmt_fetch($stmt)) {
                echo "<option>",$jet_id,"</option>";
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);
    }

    function getDisabledAirCraftId() {
        require_once('Database Connection file/mysqli_connect.php');
        $query="SELECT jet_id FROM jet_details where active!=? ";
        $stmt=mysqli_prepare($dbc,$query);
        $active="Yes";
        mysqli_stmt_bind_param($stmt,"s",$active);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$jet_id);
        mysqli_stmt_store_result($stmt);
        
        if(mysqli_stmt_num_rows($stmt)==0) {
            
        }
        else {
            while(mysqli_stmt_fetch($stmt)) {
                echo "<option>",$jet_id,"</option>";
            }
        }
        
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);
    }

    function getDepartureTime($flight_no,$journey_date) {
        $serverName="localhost";
        $dBUserName="root";
        $dBPassword="";
        $dBName="flightmanagement";

        $conn2=mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

        if (!$conn2) {
            die("Connection failed: ".mysqli_connect_error());
        }

        $query="SELECT departure_time FROM flight_details where flight_no=? and departure_date=?";
        $stmt2=mysqli_prepare($conn2,$query);
        $active="Yes";
        mysqli_stmt_bind_param($stmt2,"ss",$flight_no,$journey_date);
        mysqli_stmt_execute($stmt2);
        mysqli_stmt_bind_result($stmt2,$departure_time);
        mysqli_stmt_store_result($stmt2);
        
        mysqli_stmt_fetch($stmt2);
        
        mysqli_stmt_close($stmt2);
        mysqli_close($conn2);
        
        return $departure_time;
    }
