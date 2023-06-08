<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style_compras.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <title>cliente compras</title>
</head>


<style>
    body{
        background-color: gold;
    }
</style>
<body>
   
        <?php 
         require '../../util/control_acceso.php';
        
         require '../header.php';

         require '../../util/base_de_datos.php';
        
        ?>
      

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $usuario = $_GET["usuario"];
        }
        ?>

       
        <h1>Compras de <?php echo $usuario ?></h1>
        <div class="container">
        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead class="table table-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio unitario</th>
                            <th>Subtotal</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM vw_clientes_productos
                            WHERE usuario = '$usuario'";
                            
                        $resultado = $conexion->query($sql);
                        $precio_total = 0;

                        if ($resultado->num_rows > 0) {
                            while ($fila = $resultado->fetch_assoc()) {
                                $producto  = $fila["producto"];
                                $cantidad = $fila["cantidad"];
                                $precio_unitario = $fila["precio_unitario"];
                                $fecha = $fila["fecha"];
                                $precio_total += ($precio_unitario * $cantidad);
                        ?>
                                <tr>
                                    <td><?php echo $producto ?></td>
                                    <td><?php echo $cantidad ?></td>
                                    <td><?php echo $precio_unitario ?></td>
                                    <td><?php echo $precio_unitario*$cantidad ?></td>
                                    <td><?php echo $fecha ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <h4><span class="badge bg-success">Total: <?php echo $precio_total ?>€</span></h4>
            </div>
        </div>
    </div>
    <a class="btn btn-dark" href="index.php">Volver</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>