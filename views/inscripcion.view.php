<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 bg-light pt-4">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container mb-5 p-5  bg-light" id="loginFront">
  <div class="text-center">
    <h1 class="h3 fw-normal my-5">¡Gracias por inscribirte!</h1>
    <p class="fst-italic pb-5">Te mandaremos <em>un mail</em> con toda la información del curso.</p>
  </div>
  <h2 class="fs-5 my-5 text-center">¿Podemos ayudarte en algo más?</h2>
  <div class="row g-4">
    <div class="card bg-transparent col-lg-3 col-md-6 border-0 boxAdmin">
      <a href="cursos.php"><img src="img/teclado.png" class="card-img imgAdmin" alt="cursos">
      <div class="card-img-overlay ms-2">
        <h5 class="card-title text-white">VER MÁS CURSOS</h5>
      </div></a>
    </div> 
    <div class="card bg-transparent col-lg-3 col-md-6 border-0 boxAdmin">
      <a href="contacto.php"><img src="img/teclado.png" class="card-img imgAdmin" alt="contacto">
      <div class="card-img-overlay ms-2">
        <h5 class="card-title text-white">CONTACTAR CON NOSOTROS</h5>
      </div></a>
    </div>
    <div class="card bg-transparent col-lg-3 col-md-6 border-0 boxAdmin">
      <a href="blog.php"><img src="img/teclado.png" class="card-img imgAdmin" alt="blog">
      <div class="card-img-overlay ms-2">
        <h5 class="card-title text-white">VISITAR EL BLOG</h5>
      </div></a>
    </div>
    <?php if(isset($_SESSION['usuario'])): ?> 
    <div class="card bg-transparent col-lg-3 col-md-6 border-0 boxAdmin">
      <a href="tienda-registrados.php"><img src="img/teclado.png" class="card-img imgAdmin" alt="tienda-registrados">
      <div class="card-img-overlay ms-2">
        <h5 class="card-title text-white">TIENDA ONLINE</h5>
      </div></a>
    </div>
    <?php endif ?>
    <?php if(!isset($_SESSION['usuario'])): ?>
    <div class="card bg-transparent col-md-3 col-sm-6 border-0 boxAdmin">
      <a href="ventajas.php"><img src="img/teclado.png" class="card-img imgAdmin" alt="ventajas">
      <div class="card-img-overlay ms-2">
        <h5 class="card-title text-white">CONOCER LAS VENTAJAS DE COPOE</h5>
      </div></a>
    </div>
    <?php endif ?>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>