<?php
    function establecerConexion($ddbb, $host, $usuario, $password, $database){
        // Creacion de variable temporal que almacena el resultado de la conexión
        try{
            $conexion = new PDO("$ddbb:host=$host;dbname=$database",
            $usuario,
            $password);
        } catch (PDOException $e){
            die('Error al conectar con la base de datos, revise los valores de inicio.' . $e -> getMessage());
        }

        return $conexion;
    }

    function querySelect($stringQuery, $conexion){
        return $conexion -> query($stringQuery);
    }

    function recogerProductos($conexion){
        return $conexion->query('select id, nombre from productos');
    }

    function recogerProductoEspecifico($conexion, $id){
        return $conexion->query("select * from productos where id = $id");
    }

?>