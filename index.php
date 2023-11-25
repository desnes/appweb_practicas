<?php
session_start();
$preferencias = false;
if(isset($_COOKIE["chkRecordame"]) && $_COOKIE["chkRecordame"] != ""){
    $preferencias = true;
    $_SESSION["usuario"] = isset($_COOKIE["usuario"]) ? $_COOKIE["usuario"] : "";
    $_SESSION["contrasena"] = isset($_COOKIE["contrasena"]) ? $_COOKIE["contrasena"] : "";
    $_SESSION["idioma"] = isset($_COOKIE["idioma"]) ? $_COOKIE["idioma"] : "es";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LOGIN</h1>
    <form action="validar.php" method="post">
        <fieldset>
            Usuario<br>
            <input type="text" name="usuario" placeholder="Usuario" value="<?php echo isset($_SESSION['usuario']) ? $_SESSION['usuario'] : ''; ?>"required><br>
            Contraseña<br>
            <input type="password" name="contrasena" placeholder="Contraseña" value="<?php echo isset($_SESSION['contrasena']) ? $_SESSION['contrasena'] : ''; ?>" required><br>
            <br>
            Recordarme
            <input type="checkbox" name="chkRecordame" <?php echo ($preferencias)?"checked" : "" ?>>
            <br>
            <br>
            <input type="submit" value="Ingresar">
        </fieldset>
    </form>
</body>
</html>