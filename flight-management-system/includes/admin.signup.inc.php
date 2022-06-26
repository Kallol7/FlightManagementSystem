<?php   

session_start();
if(!($_SESSION["admin"]==="true")){
    header("location: ../login.php?error=notanadmin");
    exit();
}

if(isset($_POST["admin_submit"])) {
    
    $fname=$_POST["fname"];
    $lname=$_POST["lname"];
    $email=$_POST["email"];
    $username=$_POST["uid"];
    $gender=$_POST["gender"];
    $pwd=$_POST["pwd"];
    $pwdrepeat=$_POST["pwdrepeat"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(emptyInputSignup($fname,$lname,$email,$username,$gender,$pwd,$pwdrepeat) !== false) {
        header("location: ../add_admin.php?error=emptyinput");
        exit();
    }
    
    if(invalidUid($username) !== false) {
        header("location: ../add_admin.php?error=invaliduid");
        exit();
    }
    
    if(invalidEmail($email) !== false) {
        header("location: ../add_admin.php?error=invalidemail");
        exit();
    }
    
    if(pwdDontMatch($pwd,$pwdrepeat) !== false) {
        header("location: ../add_admin.php?error=passdontmatch");
        exit();
    }
    
    if(uidExists($conn,$username,$email) !== false) {
        header("location: ../add_admin.php?error=usernametaken");
        exit();
    }
    
    createAdmin($conn,$fname,$lname,$email,$username,$gender,$pwd);
    
} 
else {
    header("location: ../add_admin.php");
    exit();
}
