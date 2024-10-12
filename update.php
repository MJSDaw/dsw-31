<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar producto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require_once __DIR__.'/funcionesbd.php';
        require_once __DIR__.'/dbconfig.php';

        $conn = establecerConexion($db, $host, $username, $password, $dbname);   
        
        $id = $_GET['id'];

        $producto = querySelect("select * from productos where id = '{$id}'", $conn)->fetch();

        $familias = querySelect("select distinct familia from productos", $conn);
    ?>
    <form method="POST" action="cargaProducto.php">
    <label for="nombre">Nombre: </label>
        <input type="number" name="id" value="<?php echo htmlspecialchars($id); ?>" hidden>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($producto['nombre']); ?>" required>
        <label for="nombreCorto">Nombre corto: </label>
        <input type="text" id="nombreCorto" name="nombreCorto" value="<?php echo htmlspecialchars($producto['nombre_corto']); ?>" required>
        <label for="precio">Precio (€): </label>
        <input type="number" id="precio" name="precio" value="<?php echo htmlspecialchars($producto['pvp']); ?>" required>
        <label for="familia">Familia: </label>
        <select name="familia" id="familia" required>
            <?php
                while($familia = $familias->fetch()) {
                    $selected = ($producto['familia'] == $familia['familia']) ? 'selected' : '';
                    echo "<option value='{$familia['familia']}' {$selected}>{$familia['familia']}</option>";
                }
            ?>
        </select> <br>
        <label for="descripcion">Descripcion: </label><textarea name="descripcion" id="descripcion" required><?php echo htmlspecialchars($producto['descripcion']); ?></textarea><br>
        <button type="submit">Actualizar producto</button>
    </form>
    <a href="listado.php">Volver</a>
</body>
</html>