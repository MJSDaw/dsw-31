<?php
    $id = $_GET['id'];

    require_once __DIR__.'/funcionesbd.php';
    require_once __DIR__.'/dbconfig.php';

    $conn = establecerConexion($db, $host, $username, $password, $dbname);

    try {
        if (eliminarProducto($conn, $id)) {
            echo "El producto con id $id se ha eliminado correctamente! <br> <a href='listado.php'>Volver</a>";
        } else {
            echo "El producto con id $id no se ha podido eliminar! <br> <a href='listado.php'>Volver</a>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    

    $conn = null;
?>
