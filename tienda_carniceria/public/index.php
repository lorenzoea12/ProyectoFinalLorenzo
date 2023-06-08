<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  <title>Document</title>
</head>
<style>
  body {
    background-color: black;
    color: white;
    background-image: url("https://www.mercado47.com/Files/Images/PPAs/2019/08/b5541e9f-f0fd-4fd5-a2ed-596ba8c6363f/44d40a3f-dbd0-4091-a63a-5734d4928ac6.png");
    background-position: center;
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-attachment: fixed;
    font: 100% sans-serif;
  }
</style>

<body>
  <?php require '../util/base_de_datos.php' ?>
  <?php require '../util/control_acceso.php' ?>
  <?php require 'header.php' ?>

  <div class="container">

    <br><br><br>

    <h1 align="center">Bienvenido al Cuarto y Mitad </h1>
    <br><br><br>



    <div style="text-align:center;">
      <img src="cuartoymitad.jpeg" style="max-width: 10%;"><br><br>

    </div>
    <br><br>

    <h3 align="center">Productos Más Recomendados</h3>
    <br><br>

    <div class="container">
      <div class="row">
        <div class="col-sm">
          <img
            src="https://media.istockphoto.com/id/156722293/es/foto/chorizo-ib%C3%A9rica-de-espa%C3%B1a.jpg?s=612x612&w=0&k=20&c=pl4HFmlcg3jV2mEnni-YMOHah5CPAnjGb-NwYfJOT94="
            alt="" style="width: 100%;">
        </div>
        <div class="col-sm">
          <img src="https://t4.ftcdn.net/jpg/00/18/34/73/360_F_18347371_FWA9NYmP9QyK8qdKg6mEIietE0F2G5PL.jpg" alt=""
            style="width: 100%;">
        </div>
        <div class="col-sm">
          <img
            src="https://st2.depositphotos.com/1001719/9141/i/950/depositphotos_91413292-stock-photo-fresh-raw-beef-steak.jpg"
            alt="" style="width: 100%;">
        </div>
      </div>
    </div>

    <br><br>

    <div class="container">
      <div class="row">
        <div class="col-sm">
          <img
            src="https://www.rebanando.com/cache/slideshow/31/72/02/e6/pollo1.jpg/2cb6823c975ee09b0d93e071c71c86d5.jpg"
            alt="" style="width: 100%;">
        </div>
        <div class="col-sm">
          <img
            src="https://media.istockphoto.com/id/1225545036/es/foto/h%C3%ADgados-de-pollo-crudos-sobre-fondo-blanco.jpg?s=612x612&w=0&k=20&c=Q8FfOU-etksc2ibeOcZgogjq8sK6XbL4GPWNCFVH6P8="
            alt="" style="width: 100%;">
        </div>
        <div class="col-sm">
          <img src="https://www.cocinista.es/download/bancorecursos/recetas/salchicha-vienesa.jpg" alt=""
            style="width: 100%;">
        </div>
      </div>
    </div>




    <br><br><br>



    <div class="carrusel">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="../resources/img/oferta.webp" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../resources/img/oferta2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="../resources/img/oferta3.jpeg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <br><br><br><br><br>

      <div align="center">
        <iframe width="640" height="360" src="https://www.youtube.com/embed/uVuMBnvi8kQ" title="Video de YouTube"
          frameborder="0" allowfullscreen></iframe>
      </div>


      <script>
        $(document).ready(function () {
          $('#nombre_productos').on('input', function () {
            var title = $(this).val();
            if (title.length > 0) {
              var dataString = 'nombre_productos=' + nombre_productos;
              $.ajax({
                type: "POST",
                url: "../util/base_de_datos.php",
                data: dataString,
                success: handleResponse
              });
            } else {
              $('#autocomplete-results').empty();
            }
          });

          function handleResponse(response) {
            var results = response.slice(10);
            $('#autocomplete-results').html(results);
            $('#autocomplete-results .autocomplete-item').on('click', function () {
              var optionValue = $(this).text();
              $('#nombre_productos').val(optionValue);
              $('#autocomplete-results').empty();
              $('form').submit();
            });
          }
        });
      </script>

    </div>
    <div class="caja_index">
    </div>
    <br><br><br>
    <?php require 'footer.php' ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"></script>
</body>

</html>