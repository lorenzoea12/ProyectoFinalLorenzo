<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Borrar proveedor</title>
</head>
<body>
<div class="container">
    <?php require '../../util/base_de_datos.php'?>
    <?php require '../header.php'?>
<h1>Ver proveedor</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $id = $_GET["id"];
        echo "<p>$id</p>";
        
      
        $sql = "SELECT imagen FROM proveedores WHERE id = '$id'";
        $resultado = $conexion ->query($sql);
        
        if($resultado -> num_rows > 0) {
            while ($fila = $resultado ->fetch_assoc()) {
                $imagen = $fila["imagen"];
            }
            
        }

        $sql = "DELETE FROM proveedores WHERE id = '$id'";
        
        if ($conexion ->query($sql)) {
            echo "borrado el proveedor";
        }else {
            echo "Error al borrar";
        }
        
            
        }
    ?>
    

    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>