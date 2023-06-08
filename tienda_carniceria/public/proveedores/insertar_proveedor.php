<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Proveedor</title>
</head>

<style>
      body {
  
        background-image: url('https://www.carnescriado.es/wp-content/uploads/2020/07/distribuidor-jaen-carne-proveedor-carnicas-36.jpg');
        background-size: cover;
        background-position: center;
    }
</style>
<body>
    <?php 
    

    require '../../util/base_de_datos.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_proveedores  = $_POST["nombre_proveedores"];
        if (isset($_POST["provincia"])) {
            $provincia = ($_POST["provincia"]);
        } else {
            $err_provincia = "Selecciona una provincia";
        }
       

        
        

        $file_name = $_FILES["imagen"]["name"];
        $file_temp_name = $_FILES["imagen"]["tmp_name"];
        $path = "../../resources/proveedores/" . $file_name;


        if (!empty($nombre_proveedores) && !empty($provincia) ) {
            //  Subimos la imagen a la carpeta deseada
            if (move_uploaded_file($file_temp_name, $path)) {
                echo "<p>Fichero movido con éxito</p>";
            } else {
                echo "<p>No se ha podido mover el fichero</p>";
            }


            //  Insertamos la prenda en la base de datos
            $imagen = "/resources/proveedores/" . $file_name;
            if (!empty($nombre_proveedores)) {
                $sql = "INSERT INTO proveedores (nombre_proveedores, provincia ,imagen)
                    VALUES ('$nombre_proveedores','$provincia','$imagen')";
            } else {
                $sql = "INSERT INTO proveedores (nombre_proveedores , provincia,imagen)
                    VALUES ('$nombre_proveedores ', '$provincia',  '$imagen')";
            }


            if ($conexion->query($sql) == "TRUE") {
    ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Se ha insertado el proveedor
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php
            } else {
                echo "<p>Error al insertar</p>";
            }
        }

        if (isset($nombre_proveedores) && isset($provincia) ){
            
        }
    }

    
    ?>
    <div class="container">
  
        <br>
        <h1>Nuevo Proveedor</h1>
        <div class="row">
            <div class="col-7">
                <form action="" method="post" enctype="multipart/form-data">
               
                <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" type="text" name="nombre_proveedores">
                        <span class="error">
                         
                    </div>
                   
                    
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Provincia</label>
                        <input class="form-control" type="text" name="provincia">
                        <span class="error">
                  
                        </span>
                    </div>
                    
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Imagen</label>
                        <input class="form-control" type="file" name="imagen">
                        <span class="error">
             
                        </span>
                    </div>
                    <button class="btn btn-dark" type="submit">Crear</button>
                    <a class="btn btn-dark" href="index.php">Atras</a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>