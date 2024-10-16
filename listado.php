<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de productos - listado</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    </style>
</head>
<body>
    
    <?php
        require_once __DIR__ . '/dbconfig.php';
        require __DIR__ . '/funcionesbd.php';

        $conn = establecerConexion($db, $host, $username, $password, $dbname);

        $productos = recogerProductos($conn);

        $conn = null; 
    ?>

    <h1 id='titulo'>Gestión de Productos</h1>

    <a id='crear' href='crear.php'>Crear</a>

    <table>
        <tr>
            <th>Detalle</th>
            <th>Código</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php 
            while($producto = $productos ->fetch(PDO::FETCH_OBJ)){
                echo "<tr>
                    <td><a id='detalle' href='detalle.php?id={$producto->id}'>Detalle</a></td>
                    <td> {$producto->id} </td>
                    <td> {$producto->nombre} </td>
                    <td><a href='update.php?id={$producto->id}'>Actualizar</a> | <a href='borrar.php?id={$producto->id}'>Borrar</a></td>
                </tr>";
            }
        ?>
    </table>
</body>
</html>