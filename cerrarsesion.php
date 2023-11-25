<?php

session_start();
if(!isset($_SESSION["usuario"]) && !isset($_SESSION["contrasena"])){
    header("Location:index.php");
}
session_destroy();


if(!isset($_COOKIE["chkRecordame"]) ){
    // La cookie 'chkRecordarme' no existe, entonces borramos la cookie 'idioma'
    setcookie("idioma", "",-1, "/");
} 

header("Location:index.php");

?>