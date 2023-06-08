<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body class="registrar">
    <h1 align="center" >Registrarse</h1>
    <?php require '../util/base_de_datos.php' ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $nombre = $_POST["nombre"];
        $primer_apellido = $_POST["primer_apellido"];
        $segundo_apellido = $_POST["segundo_apellido"];
        $fecha_nacimiento = $_POST["fecha_nacimiento"];
        $rol = $_POST["rol"];


        if (empty($usuario) || empty($contrasena) || empty($nombre) || empty($primer_apellido) || empty($segundo_apellido) || empty($fecha_nacimiento) || empty($rol)) {
            echo "<p>Error: todos los campos del formulario son requeridos</p>";
        } else {
        $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

        $sql = "INSERT INTO clientes (usuario, contrasena, nombre, primer_apellido, segundo_apellido, fecha_nacimiento, rol)
                    VALUES ('$usuario', '$hash_contrasena', '$nombre', '$primer_apellido', '$segundo_apellido', '$fecha_nacimiento', '$rol')";

        if ($conexion -> query($sql) == "TRUE") {
            echo "<p>Usuario registrado</p>";
            header("location:http://localhost/ProyectoFinal/tienda_carniceria/public/inicio_sesion.php");
        } else {
            echo "<p>Error en el registro</p>";
        }
    }
}
    ?>

    <div class="container">
        <h1></h1>

        <div class="row justify-content-center text-center mt-5">
            <div class="col-6">
                <form action="" method="post">
                    <div class="form-group mb-3">
                        <label class="form-label">Usuario</label>
                        <input class="form-control" name="usuario" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Contraseña</label>
                        <input class="form-control" name="contrasena" type="password">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Nombre</label>
                        <input class="form-control" name="nombre" type="text">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Primer apellido</label>
                        <input class="form-control" type="text" name="primer_apellido">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Segundo apellido</label>
                        <input class="form-control" type="text" name="segundo_apellido">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Fecha de nacimiento</label>
                        <input class="form-control" type="date" name="fecha_nacimiento">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Rol</label>
                        <select class="form-select" name="rol">
                            <option value="cliente">Cliente</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit">Registrarse</button>
                        <a class="btn btn-secondary" href="./inicio_sesion.php">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>