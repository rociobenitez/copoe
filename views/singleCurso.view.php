<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container-fluid p-0 pt-4">
  <!-- ////// MENU SUPERIOR IZQUIERZA ////// -->
  <nav class="navbar navbar-expand-sm navbar-light border-bottom ">
    <div class="container">
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto mb-2 mb-sm-0">
          <li class="nav-item text-muted"><a href="index.php">Inicio<i class="bi bi-caret-right-fill ms-2 me-3"></i></a></li>
          <li class="nav-item text-muted"><a href="cursos.php">Cursos<i class="bi bi-caret-right-fill ms-2 me-3"></i></a></li>
          <li class="nav-item nav-item-single"><a href="#" class="turquesa"><?php echo $curso['titulo'] ?></a></li>
        </ul>
      </div>     
    </div>
  </nav>

  <!-- ////// CURSO ////// -->
  <div class="container" id="curso">
    <!-- ////// DIV ENCABEZADO TITULO ////// -->
    <div class="p-3 p-md-3 mt-5 mb-4">
      <div class="col-md-7 px-0"> 
        <h1 class="fw-bold fst-italic"><?php echo $curso['titulo'] ?></h1>
        <p class="lead my-3"><?php echo $curso['extracto'] ?></p>
        <div class="pb-5 pt-2">
          <a href="#inscripcion" class="btn btn-1 btn-s btnAniadir">Quiero inscribirme</a>
          <a href="contacto.php" class="btn btn-5 btn-s ms-2">Pedir información</a>
        </div> 
      </div>
    </div>
    <!-- ////// DIV DESCRIPCIÓN ////// -->
    <div class="row g-5">
      <!-- Columna izquierda -->
      <div class="col-md-8">
        <img src="<?php echo $front_config['carpetaImgCursos'].$curso['imagen'] ?>" alt="<?php echo $curso['titulo'] ?>">
        <div class="my-5 py-5 px-3">
          <p><?php echo nl2br($curso['descripcion']) ?></p>
        </div>
      </div>
      <!-- Columna derecha -->
      <div class="col-md-4">
        <div class="position-sticky" style="top:2rem;">
          <div class="p-4 mb-3 bg-light rounded">
            <h4 class="fw-bold fs-6">Fecha: <?php echo $curso['fecha'] ?></h4>
            <h4 class="fw-bold fs-6">Lugar: <?php echo $curso['lugar'] ?></h4>
          </div>
          <div class="p-4 mb-3 bg-white">
            <h5>Docentes</h5>
            <p class="fst-italic"><?php echo nl2br($curso['docentes']) ?></p>
          </div>
          <div class="p-4 mb-3 bg-light rounded">
            <h5><?php echo $curso['plazas'] ?> Plazas disponibles</h5>
          </div>
          <div class="p-4 mb-3 bg-white">
            <h6 class="fst-italic">Precio No Asociado</h6>
            <h4 class="fst-italic"><?php echo $curso['precio'] ?> €</h4>
            <h6 class="fst-italic">Precio Asociado</h6>
            <h4 class="fst-italic"><?php echo $curso['precio_asociado'] ?> €</h4>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ////// INSCRIPCIÓN CURSO ////// -->
  <div class="container my-5 pb-5" id="inscripcion">
    <div class="d-flex justify-content-between mb-2 pt-5">
      <h4 class="mt-5">Inscripción al curso</h4>
      <p class="fs-6 fw-bold"><b>¿Ya eres cliente?</b> <a href="login.php" class="turquesa text-decoration-underline ms-1 fs-6 fw-bold">Inicia sesión</a></p> 
    </div>
    <!-- ////// FORMULARIO ////// -->
    <div class="p-5 bg-light">
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?> " >
        <!-- ////// DATOS DE REGISTRO ////// -->
        <h6 class="pb-2">Datos de registro</h6>
        <div class="row g-2">
          <div class="col">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre *" class="form-control mb-2"
                    value="<?php if(isset($_POST['enviar']) && !empty($nombre)) echo $nombre; ?>">
          </div>
          <div class="col">
            <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos *" class="form-control mb-2"
                    value="<?php if(isset($_POST['enviar']) && !empty($apellidos)) echo $apellidos; ?>">
          </div>
        </div>
        <div class="row g-2 mb-4">
          <div class="col">
            <input type="text" name="colegiado" id="colegiado" placeholder="Número colegiado *" class="form-control mb-2" 
                    value="<?php if(isset($_POST['enviar']) && !empty($user)) echo $user; ?>">
          </div>
          <div class="col">
            <input type="text" name="email" id="email" placeholder="Email *" class="form-control mb-2"
                    value="<?php if(isset($_POST['enviar']) && !empty($email)) echo $email; ?>">
          </div>
        </div>
        <!-- ////// DATOS DE FACTURACIÓN ////// -->
        <h6 class="pb-2">Datos de facturación</h6>
        <div class="row g-2 pb-4">
          <div class="col">
            <input type="text" name="direccion" placeholder="Dirección (calle, avenida...) *" class="form-control mb-2"
                    value="<?php if(isset($_POST['enviar']) && !empty($direccion)) echo $direccion; ?>">
          </div>
          <div class="col">
            <input type="text" name="cuenta" placeholder="Número de cuenta *" class="form-control mb-2"
                    value="<?php if(isset($_POST['enviar']) && !empty($cuenta)) echo $cuenta; ?>">
          </div>
          <!-- ////// ID DEL CURSO ////// -->
          <input type="hidden" name="id" id="id" class="form-control mb-2"
                    value="<?php echo $curso['id']; ?>">
      
        </div>
          <!-- ////// MOSTRAR LOS ERRORES ////// -->
          <?php if (!empty($errores)): ?>
            <div>
              <ul>
                <?php echo $errores ?>
              </ul>
            </div>
          <?php endif ?>

        <!-- ////// BOTÓN 'ASOCIARME' ////// -->
        <div class="d-grid justify-content-end ms-auto">
          <input type="submit" name="enviar" value="Inscribirme" class="btn btn-3 btn-s ms-auto form-control">
        </div> 
      </form>
    </div>   
  </div>
</main>

<?php include_once 'templates/footer.php' ?>
