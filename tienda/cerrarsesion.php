<?php

session_start();
if(!isset($_SESSION["usuario"]) && !isset($_SESSION["contrasena"])){
    header("Location:index.php");
}

if(!isset($_COOKIE["chkRecordame"]) ){
    setcookie("idioma", "",-1, "/");
} 

session_destroy();
header("Location:index.php");
?>