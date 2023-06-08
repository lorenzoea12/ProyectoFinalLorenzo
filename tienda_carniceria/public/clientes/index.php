<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Index</title>
</head>
<style>
    body {
    
        background-image:url('https://img.freepik.com/fotos-premium/filete-mignon-solomillo-carne-cruda-filetes-ternera-mesa-carniceria-fondo-negro-vista-superior-copie-espacio_89816-33228.jpg?w=2000');
        background-size: cover;
        background-position: center;
        color: white;
    }
    td{
        color: white;
    }

    th{
        color: white;
    }
    tr{
        color: white;
    }
</style>

<body>
    <div class="container">
        <?php require '../../util/control_acceso.php' ?>
        <?php require '../../util/base_de_datos.php' ?>
        <?php require '../header.php' ?>
        <br>
        <h1>Listado de clientes</h1>

        <div class="row">
            <div class="col-9">
                <a class="btn btn-dark" href="insertar_cliente.php">Nuevo cliente</a>
                <br><br>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Primer apellido</th>
                            <th>Segundo apellido</th>
                            <th>Fecha de nacimiento</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        $sql = "SELECT * FROM clientes";
                        $resultado = $conexion->query($sql);

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                $usuario = $fila["usuario"];
                                $nombre = $fila["nombre"];
                                $primer_apellido = $fila["primer_apellido"];
                                $segundo_apellido = $fila["segundo_apellido"];
                                $fecha = $fila["fecha_nacimiento"];
                        ?>

                                <tr>
                                    <td><?php echo $usuario ?></td>
                                    <td><?php echo $nombre ?></td>
                                    <td><?php echo $primer_apellido ?></td>
                                    <td><?php echo $segundo_apellido ?></td>
                                    <td><?php echo $fecha ?></td>
                                    <td>
                                        <form action="mostrar_cliente.php" method="get">
                                            <button class="btn btn-dark" type="submit">Ver</button>
                                            <input type="hidden" name="id" value="<?php echo $fila["id"] ?>">
                                        </form>
                                    </td>
                                    <td>
                                        <form action="borrar_cliente.php" method="get">
                                            <button class="btn btn-dark" type="submit">Borrar</button>
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
            </div>
            <div class="col-3">
                <img width="200" heigth="200" src="../cuartoymitad.jpeg">

            </div>
        </div>
    </div>



    <a class="btn btn-dark" href="../index.php">Volver</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>