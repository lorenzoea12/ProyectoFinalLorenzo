<?php
$servidor = 'localhost';
$usuario = 'root';
$contrasena = "";
$base_de_datos = 'tienda_carniceria';
$por_pagina = 1000; 

$conexion = new mysqli($servidor,$usuario,$contrasena,$base_de_datos)
or die("Error en la conexion");

if(isset($_POST['page'])) {
    $page = $_POST['page'];
} else {
    $page = 1;
}

$start = ($page - 1) * $por_pagina; 

if(isset($_POST['nombre_productos'])) {
    $nombre_productos= $_POST['nombre_productos'];
    $query = "SELECT * FROM productos WHERE nombre_productos LIKE '%$nombre_productos%' OR imagen LIKE '%$nombre_productos%' LIMIT $start, $por_pagina";
    $result = $conexion->query($query);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div>' . $row['nombre_productos'] . '</div>';
        }
    } else {
        echo '<div>No se encontraron resultados</div>';
    }
}

?>

