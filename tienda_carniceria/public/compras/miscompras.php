<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="compras.css" />
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <title>Compras</title>
</head>
<style>
    body {
       
        background-image: url('https://img.freepik.com/fotos-premium/filete-mignon-solomillo-carne-cruda-filetes-ternera-mesa-carniceria-fondo-negro-vista-superior-copie-espacio_89816-33228.jpg?w=2000');
        background-size: cover;
        background-position: center;
        color: white;
    }

    #gracias {
        position: absolute;
        top: 50%;
        left: 40%;
        transform: translate(-50%, -50%);
    }
th{
    color: white;
}
td{
    color: white;
}
    #boton {
  position: fixed;
  bottom: 0;
  left: 0;
}

</style>

<body>

    <?php
    require '../../util/control_acceso.php';
    require '../../util/base_de_datos.php';
    require '../header.php';

    // Verificar si se ha enviado el formulario para vaciar la tabla
    if (isset($_POST['vaciarTabla'])) {
        // Ejecutar la consulta DELETE para eliminar los registros de la tabla
        $usuario = $_SESSION["usuario"];
        $sql = "DELETE FROM clientes_productos ";
        if ($conexion->query($sql) === TRUE) {
            echo "<h1 id='gracias'>Gracias por su Compra</h1>";
            echo "<a  id='boton'class='btn btn-dark' href='../index.php'>Volver</a>";
        } else {
            echo "Error al eliminar el contenido de la tabla: " . $conexion->query($sql);

        }



        exit();
    }
    ?>






    <h1>Mis compras</h1>

    <div class="row">
        <div class="col-9">
            <table class="table" id="comprasTable">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $precio_total = 0;
                    $usuario = $_SESSION["usuario"];
                    $sql = "SELECT * FROM vw_clientes_productos where usuario = '$usuario'";
                    $resultado = $conexion->query($sql);

                    if ($resultado->num_rows > 0) {
                        while ($fila = $resultado->fetch_assoc()) {
                            $usuario = $fila["usuario"];
                            $producto = $fila["producto"];
                            $cantidad = $fila["cantidad"];
                            $precio_unitario = $fila["precio_unitario"];
                            $fecha = $fila["fecha"];
                            $precio_total += ($precio_unitario * $cantidad);
                            ?>
                            <tr>
                                <td>
                                    <?php echo $producto ?>
                                </td>
                                <td>
                                    <?php echo $cantidad ?>
                                </td>
                                <td>
                                    <?php echo $precio_unitario ?>
                                </td>
                                <td>
                                    <?php echo $fecha ?>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>

                </tbody>

            </table>
            <table class="table" id="comprasTable">
            </table>
            <h4><span class="badge bg-success">Total:
                    <?php echo $precio_total ?>€
                </span></h4>

            <form action="" method="POST">
                <a class="btn btn-dark" href="index.php">Volver</a>
                <button type="submit" name="vaciarTabla" class="btn btn-primary">Finalizar Compra</button>
            </form>



        </div>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>