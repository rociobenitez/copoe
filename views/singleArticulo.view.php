<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container-fluid p-0 pt-4">
  <!-- ////// MENU SUPERIOR IZQUIERZA ////// -->
  <nav class="navbar navbar-expand-sm navbar-light border-bottom">
    <div class="container">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item"><a href="index.php">Inicio<i class="bi bi-caret-right-fill ms-2 me-3"></i></a></li>
          <li class="nav-item"><a href="blog.php">Blog<i class="bi bi-caret-right-fill ms-2 me-3"></i></a></li>
          <li class="nav-item nav-item-single"><a href="#" class="turquesa"><?php echo $articulo['titulo'] ?></a></li>
        </ul>
      </div>     
    </div>
  </nav>
  <!-- ////// ARTICULO ////// -->
  <div class="container pb-5">
    <!-- DIV ENCABEZADO TITULO -->
    <div class="p-3 p-md-3 mt-5 mb-4">
      <div class="col-md-7 px-0"> 
        <h1 class="fw-bold fst-italic pb-4"><?php echo $articulo['titulo'] ?></h1>
        <p class="lead my-3"><?php echo $articulo['extracto'] ?></p>
      </div>
    </div>
    <!-- ////// DIV DESCRIPCIÓN ////// -->
    <div class="row g-5 pb-5">
      <!-- Columna izquierda -->
      <div class="col-md-8">
        <img src="<?php echo $front_config['carpetaImgBlog'].$articulo['imagen'] ?>" class="pb-5">
        <div class="px-3">
          <p><?php echo nl2br($articulo['descripcion']) ?></p>
        </div>
      </div>
      <!-- ////// Columna derecha ////// -->
      <div class="col-md-4">
        <div class="position-sticky" style="top:2rem;">
          <div class="p-4 mb-3 bg-white">
            <h5 class="my-3">Conoce nuestros próximos cursos</h5>
              <?php foreach ($cursos as $curso): ?>
                <div>
                  <a href="singleCurso.php?id=<?php echo $curso['id'] ?>">
                    <div class="card cardCurso border-top my-4">
                      <div class="card-header text-end fw-bold bg-white"><?php echo strtoupper($curso['lugar']) ?></div>
                      <img src="<?php echo $front_config['carpetaImgCursos'].$curso['imagen'] ?>" class="card-img-top" alt="<?php echo $curso['titulo'] ?>" style="height: 100px;">
                      <div class="card-body d-grid align-content-between bg-white">
                        <h5 class="card-title fs-6 text-start pb-2"><?php echo $curso['titulo'] ?></h5>
                        <p class="card-text text-end fw-bold fs-6 turquesa"><?php echo $curso['fecha'] ?></p>             
                      </div>
                    </div>
                  </a>
                </div>
              <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'templates/formContact.php' ?>
  </main>

<?php include_once 'templates/footer.php' ?>