<?php
    function ir($nombrePagina){
        echo '2';
        switch ($nombrePagina){
            case 'crear':
                echo "1";
                // header('Location: localhost/dsw-31/crear.php', true);
                break;
            default:
                header('Location: ./listado.php');
        }
    }
?>