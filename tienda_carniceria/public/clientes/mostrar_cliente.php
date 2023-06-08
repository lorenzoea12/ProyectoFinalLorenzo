<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ver prenda</title>
</head>

<style>
 body {
        
        background-image:url('https://img.freepik.com/fotos-premium/filete-mignon-solomillo-carne-cruda-filetes-ternera-mesa-carniceria-fondo-negro-vista-superior-copie-espacio_89816-33228.jpg?w=2000');
        background-size: cover;
        background-position: center;
        color: white;
    }

    th{
        color: white;
    }
    td{
        color: white;
    }
</style>
<body>
    <div class="container">
        <?php require '../../util/control_acceso.php' ?>
        <?php require '../../util/base_de_datos.php' ?>
        <?php require '../header.php' ?>
        <h1>Ver cliente</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $id = $_GET["id"];
            echo "<p>$id</p>";

            $sql = "SELECT * FROM clientes WHERE id = '$id'";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    $usuario = $fila["usuario"];
                    $nombre = $fila["nombre"];
                    $primer_apellido = $fila["primer_apellido"];
                    $segundo_apellido = $fila["segundo_apellido"];
                    $fecha = $fila["fecha_nacimiento"];
                }
            }
        }
        echo "<p>Usuario: $usuario</p>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Primer apellido: $primer_apellido</p>";
        echo "<p>Segundo apellido: $segundo_apellido</p>";
        echo "<p>Fecha de nacimiento: $fecha</p>";




        ?>


    </div>
    <a class="btn btn-dark" href="index.php">Volver</a>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>