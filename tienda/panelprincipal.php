
<?php

    session_start(); 
    
    if(!isset($_SESSION['usuario'])&& !isset($_SESSION['contrasena'])){ 
        header("Location:index.php"); 

    }

 $idioma = isset($_GET['idioma']) ? $_GET['idioma'] : (isset($_COOKIE['idioma']) ? $_COOKIE['idioma'] : 'es');

 if (isset($_GET['idioma'])) {
     $idioma = $_GET['idioma'];
     setcookie('idioma', $idioma, 0, "/"); 
 } elseif (isset($_COOKIE['idioma'])) {
     $idioma = $_COOKIE['idioma'];
 }

    // Definir el nombre del archivo según el idioma seleccionado
    $archivo_txt = ($idioma === 'en') ? 'categorias_en.txt' : 'categorias_es.txt';
	$ruta_archivo = $archivo_txt ;
	$archivo = fopen($ruta_archivo, 'r');
    $contenido = ''; // Variable para almacenar el contenido del archivo
	while(!feof($archivo)) {
        $contenido .= fgets($archivo) . "<br />";
	}
	fclose($archivo);


 ?>

<!DOCTYPE html>
<html lang="<?php echo $idioma; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php 
    if($idioma != "es"){
        echo "Principal Panel";
    }else{
        echo "Panel Principal";
    }

    ?></h1>
    <h2><?php 
    if($idioma !=  "es"){
        echo "Welcome user: ". $_SESSION["usuario"];
    }else{
        echo "Bienvenido usuario: ". $_SESSION["usuario"];
    }

    ?></h2>
    <!-- Enlaces para cambiar el idioma -->
    <a href="?idioma=en">English</a> | 
    <a href="?idioma=es">Español</a>
    <br>
    <h2><?php 
    if($idioma !=  "es"){
        echo "Categories";
    }else{
        echo "Categorias";
    }

    ?></h2>
    <!--Colocar la varibale que esta leyendo el archivo del php aqui-->
    <p> <?php echo $contenido; ?> </p>
    <br>
    <a href="cerrarsesion.php"><?php 
    if($idioma !=  "es"){
        echo "Logout";
    }else{
        echo "Cerrar Sesión";
    }

    ?></a>

</body>
</html>