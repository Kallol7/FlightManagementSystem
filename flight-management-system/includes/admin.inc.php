<?php
if(!($_SESSION["admin"]==="true")){
    header("location: login.php?error=notanadmin");
    exit();
}
