<?php   

if(isset($_POST["submit"])) {
    
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
        header("location: ../registration.php?error=emptyinput");
        exit();
    }
    
    if(invalidUid($username) !== false) {
        header("location: ../registration.php?error=invaliduid");
        exit();
    }
    
    if(invalidEmail($email) !== false) {
        header("location: ../registration.php?error=invalidemail");
        exit();
    }
    
    if(pwdDontMatch($pwd,$pwdrepeat) !== false) {
        header("location: ../registration.php?error=passdontmatch");
        exit();
    }
    
    if(uidExists($conn,$username,$email) !== false) {
        header("location: ../registration.php?error=usernametaken");
        exit();
    }
    
    createUser($conn,$fname,$lname,$email,$username,$gender,$pwd);
    
} 
else {
    header("location: ../registration.php");
    exit();
}
