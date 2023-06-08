<?php
    session_start();
    session_destroy();
    header("location: http://localhost/ProyectoFinal/tienda_carniceria/public/inicio_sesion.php");
?>

