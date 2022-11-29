<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0">
<?php include_once 'templates/cabeceraPrincipal.php' ?>

<main class="container-fluid p-0">

  <!-- SECCIÓN 1 - CABECERA BLOG -->

  <section id="cabeceraBlog" class="container-fluid py-5 cabecera">
    <div class="px-4 py-5 my-5 text-center"> 
      <h1 class="fw-bold lh-sm mb-3 text-light mt-5 pt-5 cabecera">Blog</h1>
    </div>
  </section>

  <!-- BUSCADOR -->

  <div class="container mt-5 d-grid justify-content-end">
    <form
        action="buscar.php"
        method="GET"
        class="row g-1 mt-3">
      <div class="col-auto ms-auto">
        <input
          type="search"
          name="busqueda"
          placeholder="Buscar"
          class="form-control form-control-sm">
      </div>
      <div class="col-auto me-2">
        <button 
          type="submit" 
          class="btn btn-4 btn-sm">
            <i class="bi bi-search mx-1"></i>
        </button>
      </div>
    </form>
  </div>

	<!-- ARTÍCULOS DEL BLOG -->

  <div class="container-xl mx-auto my-3 row g-4">

    <?php foreach ($articulos as $articulo): ?>

      <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="card h-100 shadow-sm" >
          <img src="<?php echo $front_config['carpetaImgBlog'].$articulo['imagen'] ?>"
               class="card-img-top"
               alt="<?php echo $articulo['titulo'] ?>">
          <div class="card-body d-flex align-content-between flex-wrap">
            <div>
              <h5 class="card-title text-start pb-3">
                <?php echo $articulo['titulo'] ?>
              </h5>
              <p class="card-text text-start">
                <?php echo nl2br($articulo['extracto']) ?>
              </p>             
            </div>
            <div class="mt-3 ms-auto">
              <a href="singleArticulo.php?id=<?php echo $articulo['id'] ?>"
                class="card-link turquesa">
                LEER MÁS<i class="bi bi-caret-right-fill"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach ?>

  </div><!-- final campoArticulos-->

  <div class="container pt-3 pb-5">
    <?php include_once 'admin/paginacion.php' ?>
  </div>

</main>

<?php include_once 'templates/footer.php' ?>