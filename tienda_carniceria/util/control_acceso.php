<?php
    session_start();
    if (!isset($_SESSION["usuario"])) {
        header("location: http://localhost/ProyectoFinal/tienda_carniceria/public/inicio_sesion.php");
    }
?>