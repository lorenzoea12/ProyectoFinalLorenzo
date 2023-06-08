<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Editar Proveedor</title>
</head>

<style>
    body {
      
      background-image: url('https://www.carnescriado.es/wp-content/uploads/2020/07/distribuidor-jaen-carne-proveedor-carnicas-36.jpg');
      background-size: cover;
      background-position: center;
  }
</style>
<body>
    <?php require '../../util/control_acceso.php' ?>
    <?php require '../../util/base_de_datos.php' ?>



    <?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET["id"];
    $nombre_proveedores = isset($_GET["nombre_proveedores"]) ? $_GET["nombre_proveedores"] : "";
    $provincia = $_GET["provincia"];
}





    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nombre_proveedores = $_POST["nombre_proveedores"];
        $provincia = $_POST["provincia"];


        $sql = "UPDATE proveedores SET nombre_proveedores = '$nombre_proveedores', provincia = '$provincia' WHERE id = '$id'";


        if ($conexion->query($sql) == "TRUE") {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Se ha insertado el proveedor
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
      
    }
}
    ?>
    <div class="container">
        <h1>Editar proveedor</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre_proveedores" value="<?php echo $nombre_proveedores ?>">
                
                    </div>



                    <div class="form-group mb-3">
                        <label class="form-label">Provincia</label>
                        <input class="form-control" type="text" name="provincia" value="<?php echo $provincia ?>">
                    </div>




                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <button class="btn btn-dark" type="submit">Editar</button>
                    <a class="btn btn-dark" href="index.php">Volver</a>
                </form>
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>