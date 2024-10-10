<?php
    $nombre = $_POST['nombre'];
    $nombreCorto = $_POST['nombreCorto'];
    $precio = $_POST['precio'];
    $familia = $_POST['familia'];
    $descripcion = $_POST['descripcion'];

    require_once __DIR__."/funcionesbd.php";
    require_once __DIR__."/dbconfig.php";

    $conn = establecerConexion($db, $host, $username, $password, $dbname);

    crearProducto($conn, $nombre, $nombreCorto, $precio, $familia, $descripcion);

    $conn = null;

    header('Location:listado.php');
?>