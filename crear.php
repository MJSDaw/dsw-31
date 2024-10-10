<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once __DIR__.'/funcionesbd.php';
        require_once __DIR__.'/dbconfig.php';

        $conn = establecerConexion($db, $host, $username, $password, $dbname);

        $familias = recogerFamilias($conn);        
    ?>
    <form method="POST" action="cargaProducto.php">
        <label for="nombre">Nombre: </label><input type="text" id="nombre" name="nombre" require>
        <label for="nombreCorto">Nombre corto: </label><input type="text" id="nombreCorto" name="nombreCorto" require>
        <label for="precio">Precio (€): </label><input type="number" id="precio" name="precio" require>
        <label for="familia">Familia: </label><select name="familia" id="familia" require>
            <?php
                while($familia = $familias->fetch()) {
                    echo "<option value='{$familia['familia']}'>{$familia['familia']}</option>";
                }
            ?>
        </select> <br>
        <label for="descripcion">Descripcion: </label><textarea name="descripcion" id="descripcion"></textarea>
        <button type="submit">Crear producto</button>
    </form>
    <a href="listado.php">Volver</a>
</body>
</html>