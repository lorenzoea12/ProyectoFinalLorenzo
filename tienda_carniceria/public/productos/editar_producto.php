<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="prendas.css" />
    <title>Document</title>
</head>


<style>
  body {
    
        background-image: url('https://luzco.es/wp-content/uploads/2023/04/iluminacion-a-medida-para-carniceria.jpg');
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
        $nombre_productos = isset($_GET["nombre_productos"]) ? $_GET["nombre_productos"] : "";
        $precio = $_GET["precio"];
        $cantidad = $_GET["cantidad"];
        $calidad = $_GET["calidad"];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST["id"];
        $nombre_productos = $_POST["nombre_productos"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $calidad = $_POST["calidad"];

        $sql = "UPDATE productos SET  nombre_productos = '$nombre_productos', 
                                    precio = '$precio',
                                    cantidad = '$cantidad',
                                    calidad = '$calidad'
                                WHERE id = '$id'";

        if ($conexion->query($sql) == "TRUE") {
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Producto modificado con exito
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        } else {
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Error al modificar el producto
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
        }
    }
    ?>
    <div class="container">
        <h1>Editar Producto</h1>
        <div class="row">
            <div class="col-6">
                <form action="" method="post" enctype="multipart/form-data">
               
                <div  class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre_productos" value="<?php echo $nombre_productos ?>">
                    </div>



                    <div  class="form-group mb-3">
                        <label class="form-label">Precio</label>
                        <input class="form-control" type="numeric" name="precio" value="<?php echo $precio ?>">
                    </div>



                    <div  class="form-group mb-3">
                        <label class="form-label">Cantidad</label>
                        <input class="form-control" type="numeric" name="cantidad" value="<?php echo $cantidad ?>">
                    </div>




                    <div  class="form-group mb-3">
                        <label class="form-label">Calidad</label>
                        <input class="form-control" type="text" name="calidad" value="<?php echo $calidad ?>">
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