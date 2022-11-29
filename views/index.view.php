<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 position-relative">
<?php include_once 'templates/cabeceraPrincipal.php' ?>

<main class="container-fluid p-0">
	
  <!-- ////// SECTION 1 - CABECERA PRINCIPAL ////// -->

    <section id="cabeceraHome" class="cabecera container-fluid d-grid">
      <div class="p-4 my-auto container">
        <h1 class="display-5 fw-bold text-light">Únete a COPOE</h1>
        <div class="col-lg-7 col-md-9 me-auto">
          <p class="lead text-light mb-4 ">El espacio que reúne a todos <span class="fst-bold">los Profesionales de la Podología</span> para que juntos, hagamos crecer y mejorar la profesión.</p>
          <div class="d-grid gap-2 d-sm-flex ">
            <a href="ventajas.php" class="btn btn-2 btn-lg px-4 gap-3">
              CONOCE LAS VENTAJAS
            </a>
            <a href="registro.php" class="btn btn-1 btn-lg px-4">
              HAZTE SOCIO
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- ////// SECTION 2 - QUIÉNES SOMOS ////// -->

    <section class="container-fluid p-5 my-5">
      <div class="container row mx-auto">
        <div class="pb-4 col-lg-9 col-md-12">
          <h6>CÍRCULO OFICIAL DE PODÓLOGOS DE ESPAÑA</h6>
          <h2 class="mb-4">¿Quiénes somos?</h2>
          <p class="fs-6"><b>COPOE</b> es una organización de <b>Profesionales de la Podología Española</b> que nace con la finalidad de promover el estudio científico y la formación, conseguir ventajas y descuentos únicos y exclusivos para los asociados y luchar por los intereses de las clínicas de Podología en España.</p>
        </div>
        <div class="col-10 col-md-8 ms-auto my-5 text-end">
          <p class="enfasis">"Queremos ayudarte a <em>mejorar como podólogo</em> y a impulsar o hacer crecer tu clínica o centro de trabajo"</p>
        </div>        
      </div>
    </section>

    <!-- ////// SECTION 3 - VENTAJAS ////// -->

    <section id="ventajas" class="p-4 my-5 text-center bg-light">
      <div class="container py-5">
        <h2 class="my-4">Ventajas de ser asociado</h2>
        <p>Conoce los <b>beneficios</b> tanto para ti como para tu clínica <b>por ser miembro de COPOE</b></p>
       
        <div id="campoVentajas" class="container row row-cols-sm-1 row-cols-md-2 row-cols-lg-3 my-5">

          <?php foreach ($ventajas as $ventaja): ?>
            <div class="mb-4">
              <div class="card h-100 my-3 p-2 shadow-sm">
                <img src="<?php echo $front_config['carpetaImgIconos'].$ventaja['icono'] ?>" class="icon-ventaja ms-3 mt-4" alt="<?php echo $ventaja['titulo'] ?>" width="60">
                <div class="card-body d-flex align-content-between flex-wrap">
                  <div>
                    <h4 class="card-title text-start py-2 azuloscuro">
                      <?php echo $ventaja['titulo']; ?>
                    </h4>
                    <p class="card-text text-start">
                      <?php echo $ventaja['extracto'] ?>
                    </p>
                  </div>
                  <div class="mt-3 ms-auto">
                    <a href="ventajas.php" class="card-link turquesa text-decoration-underline">DESCUBRE MÁS</a>    
                  </div>
                </div>
              </div>              
            </div>
          <?php endforeach ?>

        </div>   
      </div>
    </section>

    <!-- ////// SECTION 4 - CURSOS ////// -->

    <section id="cursos" class="container p-4 my-5 text-center">
      <h2 class="my-4">Cursos COPOE</h2>
      <p><b>Manténte actualizado.</b> Conoce nuestros próximos cursos.</p>
      
      <div id="campoCursos" class="row row-cols-1 row-cols-md-2 row-cols-lg-3 my-5">

        <?php foreach ($proximos as $curso): ?>
          <div class="col mb-sm-5">
            <a href="singleCurso.php?id=<?php echo $curso['id'] ?>">
              <div class="card h-100 cardCurso shadow-sm">
                <div class="card-header text-end fw-bold bg-light">
                  <?php echo strtoupper($curso['lugar']) ?>
                </div>
                <img src="<?php echo $front_config['carpetaImgCursos'].$curso['imagen'] ?>" class="card-img-top" alt="<?php echo $curso['titulo'] ?>">
                <div class="card-body d-grid align-content-between bg-light">
                  <h5 class="card-title text-start pb-2">
                    <?php echo $curso['titulo'] ?>
                  </h5>
                  <p class="card-text text-end fw-bold fs-6 turquesa">
                    <?php echo $curso['fecha'] ?>
                  </p>  
                </div>
              </div>
            </a>
          </div>
        <?php endforeach ?>

      </div>
      <a href="cursos.php" class="btn btn-m btn-1 mb-5">
        Accede a todos los CURSOS
      </a>
    </section>

    <!-- ////// SECTION 5 - CUENTAS ////// -->

    <section id="cuentas" class="py-5 my-5 text-center bg-light">
      <div class="container py-5">
        <h3 class="my-4">Tú decides cómo formar parte de COPOE</h3>
        <p>Elige la cuenta que mejor se adapte a <b>tus necesidades.</b></p>
        
        <div id="campoCuentas" class="container row row-cols-1 row-cols-md-3 g-3 py-5">

          <?php foreach ($cuentas as $cuenta): ?>
            <div class="col">
              <div class="card h-100 shadow-sm">
                <div class="card-body px-1 py-4">
                  <h4 class="card-title py-4"><br>
                    <?php echo strtoupper($eliminarTildes($cuenta['titulo'])) ?>
                  </h4>
                  <H1 class="card-text pricing-card-title mt-3 display-1">
                    <?php echo $cuenta['precio'] ?>
                  </H1>
                  <p class="card-text">€/mes</p>
                  <p class="card-text text-muted">IVA NO INCL.</p>
                  <a href="registro.php" class="btn btn-1 btn-s my-4">
                    ASOCIARME
                  </a>
                  <p class="card-text my-3 fw-bold mx-1 mx-xl-5">
                    <?php echo nl2br($cuenta['descripcion']) ?>
                  </p>          
                </div>
              </div>           
            </div>
          <?php endforeach ?>

        </div> 
      </div>
    </section>

    <!-- ////// SECTION 6 - PROVEEDORES ////// -->

    <section class="container p-4 my-5 text-center">
      <h2 class="my-4">Nuestros proveedores</h2>
      <p>Conoce los <b>beneficios</b> tanto para ti como para tu clínica <b>por ser miembro de COPOE</b></p>

      <div id="campoProveedores" class="row g-5 my-4 justify-content-center">

        <?php foreach ($proveedores as $proveedor): ?>
            <div class="col-xl-2 col-md-3 col-sm-6">
              <div class="card h-100 border-0">
                <img src="<?php echo $front_config['carpetaImgProveedores'].$proveedor['logo'] ?>" alt="<?php echo $proveedor['proveedor'] ?>" class="my-auto">
              </div>           
            </div>
          <?php endforeach ?>

      </div>
    </section>

     <!-- ////// SECTION 7 - DUDAS ////// -->
    <section id="dudas" class="p-4 text-center bg-light">
      <div class="container  py-5">
        <h2 class="my-4">¿Dudas sobre COPOE?</h2>

        <div id="campoDudas" class="container row row-cols-1 row-cols-md-2 my-5 g-4">

          <?php foreach ($dudas as $duda): ?>
            <div class="col-lg-6 col-md-12 col-sm-12">
              <div class="card h-100 shadow-sm">
                <div class="card-body my-2">
                  <h5 class="card-title text-start pb-3 fs-6">
                    <i class="bi bi-question-circle-fill preguntaIcon me-2"></i>
                    <?php echo $duda['pregunta'] ?>
                  </h5>
                  <p class="card-text text-start">
                    <?php echo nl2br($duda['respuesta']) ?>
                  </p> 
                </div>
              </div>
            </div>
          <?php endforeach ?>

        </div>
      </div>
    </section>

    <!-- ////// SECTION 8 - CONTACTO ////// -->
    <?php include_once 'templates/formContact.php' ?>

</main>

<?php include_once 'templates/footer.php' ?>