<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0">
<?php include_once 'templates/cabeceraPrincipal.php' ?>

<main class="container-fluid p-0">

  <!-- ////// SECCIÓN 1 - CABECERA CURSOS ////// -->

  <section id="cabeceraCursos" class="container-fluid py-5 cabecera">
    <div class="px-4 py-5 my-5 text-center"> 
      <h1 class="fw-bold lh-sm mb-3 text-light mt-5 pt-5 cabecera">
        ¿Qué te gustaría aprender?
      </h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead text-light">Te ofrecemos <em class="text-light">cursos y formación exclusiva</em> para que estés actualizado.</p>
      </div>
    </div>
  </section>

  <!-- ////// SECCIÓN 2 - ¿POR QUÉ ESTUDIAR CON NOSOTROS? ////// -->
  <section class="container-fluid bg-light py-5">
  	<div class="container py-5">
  	  <h5 class="text-center lh-base py-5">Aquí encontrarás cursos sobre <strong><em>biomecánica, ecografía, abordaje integral de patologías, intervencionismo ecoguiado, cirugía...</em></strong></h5>
  	</div>
  	<div class="container py-5">
  	  <h2 class="text-center mx-4 mx-lg-0">
        ¿Por qué estudiar con nosotros?
      </h2>
  	  <div class="container text-center py-2 mx-auto">
  	  	<div class="row row-cols-lg-5 row-cols-md-3 row-cols-sm-2 g-4 justify-content-center">
          <div>
          	<img src="img/iconos/cursos-docentes.png" 
                 alt="icono docencia" 
                 class="cursosIcon my-5">
          	<h4 class="fs-5">Docentes</h4>
          	<p class="my-4 mx-5 mx-md-0">
              Contamos con el mejor equipo de profesores, expertos a nivel mundial
            </p>
      	  </div>

          <div>
          	<img src="img/iconos/cursos-formacion.png"
                 alt="icono formación"
                 class="cursosIcon my-5">
          	<h4 class="fs-5">Formación</h4>
          	<p class="my-4 mx-5 mx-md-0">
              Formación excelente y de calidad. Cursos diseñados y dirigidos por podólogos
            </p>
      	  </div>

          <div>
          	<img src="img/iconos/cursos-evidencia.png"
                 alt="icono evidencia científica"
                 class="cursosIcon my-5">
          	<h4 class="fs-5">Evidencia Científica</h4>
          	<p class="my-4 mx-5 mx-md-0">
              Enfocados en la investigación y los avances científicos
            </p>
      	  </div>

          <div>
          	<img src="img/iconos/cursos-clinica.png"
                 alt="icono práctica clínica"
                 class="cursosIcon my-5">
          	<h4 class="fs-5">Orientados a la práctica clínica</h4>
          	<p class="my-4 mx-5 mx-md-0">
              Deseamos que mejores en tus intervenciones y tratamientos
            </p>
      	  </div>

          <div>
          	<img src="img/iconos/cursos-actualizados.png"
                 alt="icono de 'estar actualizado'"
                 class="cursosIcon my-5">
          	<h4 class="fs-5">Actualizados</h4>
          	<p class="my-4 mx-4 mx-md-0">
              Queremos compartir, difundir y enseñar técnicas vanguardistas para el avance de la profesión
            </p>
      	  </div>

    	  </div>
  	  </div>
  	</div>
  	
  </section>

  <!-- ////// SECCIÓN 3 - Próximos cursos ////// -->
  <section class="container">
  	<div class="container pt-5">
  	  <h2 class="mt-5">Próximos cursos</h2>

      <!-- ////// BLOQUE CON LOS PRÓXIMOS CURSOS ////// -->
      <div id="campoProximos" class="row my-5">

        <?php foreach ($proximos as $curso): ?>
          <div class="col-lg-4 col-12 px-lg-2 px-md-5">

            <!-- CARD -->
            <div class="card h-100 cardProximos shadow-sm my-2 my-lg-0">
              <img 
                src="<?php echo $front_config['carpetaImgCursos'].$curso['imagen'] ?>"
                class="card-img-top"
                alt="<?php echo $curso['titulo'] ?>">

              <!-- CARD-BODY -->
              <div class="card-body d-flex align-content-between flex-wrap">
                <div class="p-1">
                  <h5 class="card-title text-start pb-3">
                    <?php echo $curso['titulo'] ?>
                  </h5>
                  <p class="card-text text-start turquesa fw-bold fs-6">
                    <?php echo $curso['fecha'].' - '. strtoupper($curso['lugar']) ?>
                  </p>
                </div>
                <div class="my-4 ms-auto">
                  <a href="singleCurso.php?id=<?php echo $curso['id'] ?>"
                    class="btn btn-s btn-3">
                    + info e Inscripción<i class="bi bi-caret-right-fill ms-2"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>

      </div><!-- final campo de próximos cursos-->	
    </div>  
  </section>

  <section class="container">
    <div class="container py-5">
      <h2 class="mt-5">Todos los cursos</h2>

      <!-- ////// BLOQUE CON TODOS LOS CURSOS ////// -->

      <div id="campoCursos" class="card-deck my-5">

        <?php foreach ($cursos as $curso): ?>
          <div class="card mb-3 cardCursos shadow-sm">
            <div class="row g-0">
              <div class="col-md-4">
                <img
                  src="<?php echo $front_config['carpetaImgCursos'].$curso['imagen'] ?>"
                  alt="<?php echo $curso['titulo'] ?>"
                  class="card-img-top" >
              </div>
              <!-- CARD-BODY -->
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title lh-base">
                    <?php echo $curso['titulo'] ?>
                  </h5>
                  <p class="card-text turquesa fw-bold pt-2 fs-6">
                    <?php echo $curso['fecha'] ?>
                  </p>
                  <p class="card-text">
                    <?php echo strtoupper($curso['lugar']) ?>
                  </p>
                  <div class="mt-2 text-end">
                    <a href="singleCurso.php?id=<?php echo $curso['id'] ?>"
                       class="btn btn-s btn-1">
                      + info e Inscripción<i class="bi bi-caret-right-fill ms-2"></i>
                    </a>
                  </div>         
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?>
      </div><!-- final campo de próximos cursos-->  
  	</div>
  </section>

  <!-- ////// SECCIÓN 5 - ¿Echas de menos algún curso? ////// -->
  <section class="container-fluid bg-light py-5 text-center">
  	<div class="container p-5">
  	  <h3>¿Echas de menos algún curso?</h3>
  	  <p class="my-4">
        Puedes proponerlo aquí y  procuraremos realizar los más solicitados.
      </p>
      <form method="POST"
        action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
        <div class="container d-grid gap-3 d-md-flex justify-content-md-start mx-5 px-xl-5">
          <input
            type="text"
            name="nombre"
            placeholder="Nombre o temática del curso"
            class="form-control"
            value="<?php if(isset($_POST['solicitar']) && !empty($nombre)) echo $nombre ?>">
          <input
            type="submit"
            name="solicitar"
            value="¡Solicítalo!"
            class="btn btn-3 btn-s btnSolicitar"
            id="">
        </div>
      </form>

      <!-- ////// MOSTRAR LOS ERRORES ////// -->

      <?php if (!empty($errores)): ?>
        <div>
          <ul>
            <?php echo $errores ?>
          </ul>
        </div>
      <?php endif ?>

    </div>
  </section>

  <?php include_once 'templates/bannerPremium.php' ?> 

</main>

<?php include_once 'templates/footer.php' ?>