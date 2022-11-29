<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 bg-white">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container mb-5 pb-3">
  <!-- ////// MENÚ 'MI CUENTA' ////// -->
  <?php include_once 'templates/nav-registrados.php' ?>

  <div class="container px-4 pb-5">
    <div class="row flex-lg align-items-center g-5 g-md-0 g-sm-0">
      <div class="col-10 col-sm-8 col-lg-5">
        <img src="<?php echo $front_config['carpetaImgTienda'].$producto['imagen'] ?>" class="d-block mx-lg-auto img-fluid p-xl-5 p-md-3 p-sm-0" alt="<?php echo $producto['nombre'] ?>" width="700" height="500" loading="lazy">
      </div>
      <div class="col-lg-7">
        <h1 class="display-6 fw-bold lh-1 mb-3"><?php echo $producto['nombre'] ?></h1>
        <p class="fs-5 turquesa my-4"><?php echo round($producto['precio'],2).' €' ?></p>
        <p class=" my-4"><?php echo nl2br($producto['descripcion']) ?></p>
        <div class="d-grid justify-content-start">
          <button type="button" class="btn btn-1 btn-s btnAniadir btn-lg px-4 me-md-2" data-id="<?php echo $producto['id'] ?>">Comprar</button>
        </div>
      </div>
    </div>
  </div>
</main>

<?php include_once 'templates/footerRegistrados.php' ?>