<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once __DIR__ . '/dbconfig.php';
        require_once __DIR__ . '/funcionesbd.php';

        $conn = establecerConexion($db, $host, $username, $password, $dbname);

        if (isset($_GET['id'])) {
            $productoId = $_GET['id'];

            $producto = recogerProductoEspecifico($conn, $productoId);
            $producto = $producto->fetch(PDO::FETCH_OBJ);

            if ($producto) {
                echo "<h1>Detalle del Producto</h1>
                      <div class='producto-info'>
                          <p><strong>Nombre:</strong> {$producto->nombre}</p>
                          <p><strong>Nombre Corto:</strong> {$producto->nombre_corto}</p>
                          <p><strong>Descripción:</strong> {$producto->descripcion}</p>
                          <p><strong>PVP:</strong> €{$producto->pvp}</p>
                      </div>
                      <a href='listado.php'>Volver</a>";

            } else {
                echo "<h2>Producto no encontrado</h2>";
            }
        } else {
            echo "<h2>ID de producto no especificado</h2>";
        }

        $conn = null; 
    ?>
</body>
</html>
