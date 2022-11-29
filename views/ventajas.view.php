<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0">
<?php include_once 'templates/cabeceraPrincipal.php' ?>

<main class="container-fluid p-0">
  <!-- ////// CABECERA VENTAJAS ////// -->
  <section id="cabeceraVentajas" class="container-fluid py-5 cabecera">
    <div class="container px-4 py-5 my-5 text-center"> 
      <h1 class="fw-bold lh-sm text-light mt-5 mb-3 pt-5 cabecera">Conoce todas las ventajas de ser asociado</h1>
    </div>
  </section>
  <!-- ////// DESCRIPCIÓN DE LAS VENTAJAS ////// -->
  <div id="campoVentajas" class="container row mx-auto py-5">
    <?php foreach ($ventajas as $ventaja): ?>
      <div class="col-xl-6 col-sm-12">
        <div class="card border-0 h-100 mb-5">
          <img src="<?php echo $front_config['carpetaImgIconos'].$ventaja['icono'] ?>" class="icon-ventaja ms-3 mt-4" alt="<?php echo $ventaja['titulo'] ?>">
          <div class="card-body d-flex flex-wrap">
            <div>
              <h3 class="card-title text-start pt-2 pb-4"><?php echo $ventaja['titulo'] ?></h3>
              <h6 class="card-text text-start azuloscuro lh-base mb-4"><?php echo nl2br($ventaja['enfasis']) ?></h6>
    					<p class="card-text text-start"><?php echo nl2br($ventaja['descripcion']) ?></p>
              <div>
                <a href="<?php echo $ventaja['url'] ?>" class="btn btn-1 btn-s px-4 me-md-2 my-4"><?php echo $ventaja['boton'] ?><i class="bi bi-caret-right-fill ms-2"></i></a>   
              </div>
            </div>
          </div>
        </div>              
      </div>
    <?php endforeach ?>
  </div>  
    <?php include_once 'templates/bannerPremium.php' ?> 
</main>

<?php include_once 'templates/footer.php' ?>