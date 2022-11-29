<?php include_once 'templates/header.php' ?>
<body class="container-fluid bg-light px-0">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container-fluid p-0">
  <!-- ////// SECCIÓN 1 - CABECERA BLOG ////// -->
  <section class="container-fluid">
  </section>
  <!-- ////// BOTÓN VOLVER ////// -->
  <div class="container d-flex justify-content-between align-items-center mt-4 pt-4 pb-3 border-bottom">
    <a href="blog.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
    <h3 class="fs-3">Resultados</h3>
  </div>
  <!-- ////// RESULTADOS ////// -->
  <div class="container mx-auto my-3 px-0 row g-4">
    <!-- ////// Mostrar el mensaje de los resultados de la búsqueda ////// -->
    <p><?php echo $mensaje ?></p>
    <?php foreach ($articulos as $articulo): ?>
      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card h-100" >
          <img src="<?php echo $front_config['carpetaImgBlog'].$articulo['imagen'] ?>" class="card-img-top" alt="<?php echo $articulo['titulo'] ?>">
          <div class="card-body d-flex align-content-between flex-wrap">
            <div>
              <h5 class="card-title text-start pb-3"><?php echo $articulo['titulo'] ?></h5>            
            </div>
            <div class="mt-3 ms-auto">
              <a href="singleArticulo.php?id=<?php echo $articulo['id'] ?>" class="card-link turquesa">Ver artículo<i class="bi bi-caret-right-fill"></i></a>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div><!-- final campoArticulos-->
</main>

<?php include_once 'templates/footer.php' ?>