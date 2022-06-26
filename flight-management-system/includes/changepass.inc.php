<?php   
session_start();
if(!isset($_SESSION["useruid"])){
    header("location: ../login.php?error=loginfirst");
    exit();
}

if(isset($_POST["change_pass_submit"])) {
    $pwd=$_POST["pwd"];
    $pwdnew=$_POST["pwdnew"];
    $pwdrepeat=$_POST["pwdrepeat"];
    
    $username=$_SESSION["username"];
    
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    if(pwdDontMatch($pwdnew,$pwdrepeat) !== false) {
        header("location: ../change_pass.php?error=passdontmatch");
        exit();
    }
    
    changePass($conn,$username,$pwd,$pwdnew,$pwdrepeat);
}
else {
    header("location: ../registration.php");
    exit();
}
