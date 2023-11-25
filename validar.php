<?php
session_start();

if(!isset($_SESSION["usuario"]) && !isset($_SESSION["contrasena"])){
    header("Location:index.php");
}
if($_POST["usuario"] !="" && $_POST["contrasena"] !=""){
    $_SESSION["usuario"] = $_POST["usuario"];
    $_SESSION["contrasena"] = $_POST["contrasena"];
    $_SESSION["chkRecordame"] = isset($_POST["chkRecordame"]) ? $_POST["chkRecordame"] : '';

    if($_POST["chkRecordame"] == "on"){
        setcookie("usuario",$_POST["usuario"],0);
        setcookie("contrasena",$_POST["contrasena"],0);
        setcookie("chkRecordame",$_POST["chkRecordame"],0);
        setcookie("idioma",$idioma,0);
    }else{
        setcookie("idioma", "",-1, "/");
        if(isset($_COOKIE)){
            foreach($_COOKIE as $name => $value){
                setcookie($name, '', -1);
            }
        }
    }
    header("Location:panelprincipal.php");
}else{
    header("Location:index.php");
}


?>