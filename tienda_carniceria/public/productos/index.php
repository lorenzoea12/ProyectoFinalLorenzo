<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Index</title>
</head>

<style>
    body {
   
        background-image: url('https://luzco.es/wp-content/uploads/2023/04/iluminacion-a-medida-para-carniceria.jpg');
        background-size: cover;
        background-position: center;
    }

    h1 {
        color: white;
    }
</style>

<body>

    <div class="container">
        <?php require '../../util/control_acceso.php' ?>
        <?php require '../../util/base_de_datos.php' ?>
        <?php require '../header.php' ?>
        <br>
        <h1>Listado de productos</h1>

        <div class="row">
            <div class="col-9">
                <br>
                <a class="btn btn-dark" href="insertar_producto.php">Nueva producto</a>
                <br><br>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Imagen</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Calidad</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //  Borrar prenda
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $id = $_POST["id"];

                            //  Consulta para coger la ruta de la imagen y luego borrarla
                            $sql = "SELECT imagen FROM productos WHERE id = '$id'";
                            $resultado = $conexion->query($sql);

                            if ($resultado->num_rows > 0) {
                                while ($fila = $resultado->fetch_assoc()) {
                                    $imagen = $fila["imagen"];
                                }

                            }

                            //  Consulta para borrar la prenda
                            $sql = "DELETE FROM productos WHERE id = '$id'";

                            if ($conexion->query($sql)) {
                                ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Se ha borrado el producto
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php
                            } else {
                                echo "<p>Error al borrar</p>";
                            }
                        }
                        ?>

                        <?php
                        $sql = "SELECT * FROM productos";
                        $resultado = $conexion->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                $nombre_productos = $fila["nombre_productos"];
                                $precio = $fila["precio"];
                                $cantidad = $fila["cantidad"];
                                $calidad = $fila["calidad"];
                                $imagen = $fila["imagen"];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $nombre_productos ?>
                                    </td>
                                    <td>
                                        <img width="50" height="60" src="../..<?php echo $imagen ?>">
                                    </td>
                                    <td>
                                        <?php echo $precio ?>
                                    </td>
                                    <td>
                                        <?php echo $cantidad ?>
                                    </td>
                                    <td>
                                        <?php echo $calidad ?>
                                    </td>
                                    <td>
                                        <form action="mostrar_producto.php" method="get">
                                            <button class="btn btn-dark" type="submit">Ver</button>
                                            <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <button class="btn btn-danger" type="submit">Borrar</button>
                                            <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>

<br><br>
                <div align="center">
                    <iframe width="800" height="450" src="https://www.youtube.com/embed/LXWKN2QGaUE"
                        title="Video de YouTube" frameborder="0" allowfullscreen></iframe>
                </div>


            </div>
            <div class="col-3">
                <img width="200" heigth="200" src="../cuartoymitad.jpeg">

            </div>
        </div>
    </div>
    <a class="btn btn-dark" href="../index.php"> Volver</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>