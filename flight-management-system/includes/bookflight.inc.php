<?php
if(!isset($_SESSION["useruid"])){
    header("location: login.php?error=loginfirst");
    exit();
}
