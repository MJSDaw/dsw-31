<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de producto</title>
</head>
<body>
    <?php
        require_once __DIR__ . '/dbconfig.php';
        require_once __DIR__ . '/funcionesbd.php';

        $conn = establecerConexion($db, $host, $username, $password, $dbname);

        $producto = recogerProductoEspecifico($conn, $_GET['id']);

        $producto = $producto->fetch(PDO::FETCH_OBJ);

        echo "El producto es $producto->nombre";

        $conn = null;

    ?>
</body>
</html>