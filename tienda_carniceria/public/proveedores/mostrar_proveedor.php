<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ver proveedor</title>
</head>


<style>
    body {
    
        background-image: url('https://www.carnescriado.es/wp-content/uploads/2020/07/distribuidor-jaen-carne-proveedor-carnicas-36.jpg');
        background-size: cover;
        background-position: center;
    }
</style>

<body>
<div class="container">
        <?php require '../../util/base_de_datos.php' ?>
        <?php require '../header.php' ?>

        <h1>Ver proveedor</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["id"];

            $sql = "SELECT * FROM proveedores WHERE id = '$id'";

            $resultado = $conexion -> query($sql);

            if ($resultado -> num_rows > 0) {
                while ($fila = $resultado -> fetch_assoc()) {
                    $nombre_proveedores= $fila["nombre_proveedores"];
                    $provincia = $fila["provincia"];
                    $imagen = $fila["imagen"];
                }
            }
        } 
        ?>


        <div class="row">
            <div class="col-4">
                <p>Nombre: <?php echo $nombre_proveedores ?></p>
                <p>Provincia: <?php echo $provincia ?></p>
                
                <form action="editar_proveedor.php" method="get">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="nombre_proveedores " value="<?php echo $nombre_proveedores ?>">
                    <input type="hidden" name="provincia" value="<?php echo $provincia ?>">
                    <button type="submit" class="btn btn-dark">Editar</button>
                    <a class="btn btn-dark" href="index.php">Volver</a>
                </form>
            </div>
            <div class="col-4">
                <img witdh="200" height="300" src="../..<?php echo $imagen ?>">
            </div>
        </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>