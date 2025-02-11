
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="views/css/style.css">
    <title>Document</title>
</head>
<body>
<?php
require_once "autoload.php";

if (isset($_GET['controller'])){
        $nombreController = $_GET['controller']."Controller";
        
}
else{
    $nombreController = "UsuarioController";
}
if (class_exists($nombreController)){

    $controlador = new $nombreController(); 
    if(isset($_GET['action'])){
        $action = $_GET['action'];
    }
    else{
        $action ="mostrarLogin";
    }

    $controlador->$action();

}else{
    echo "No existe el controlador";
}
?>
</body>
</html>