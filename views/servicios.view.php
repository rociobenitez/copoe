<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 bg-white">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container mb-5 pb-3">
  <!-- ////// MENÚ 'MI CUENTA' ////// -->
  <?php include_once 'templates/nav-registrados.php' ?>

  <div class="row pt-5">
    <?php foreach ($servicios as $servicio): ?>
      <div class="col-3">
          <img src="<?php echo $front_config['carpetaImgVentajas'].$servicio['imagen'] ?>" alt="<?php echo $servicio['servicio'] ?>">            
      </div>
    <?php endforeach ?>
  </div>
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data"> <!-- enctype: permite enviar archivos a través del formulario -->
    <input type="hidden" name="id" id="id" class="form-control mb-2" value="<?php echo $datosUsuario['id'] ?>">
    <div class="pt-5">
      <div>
        <label for="servicio">Elige el servicio que quieres deseas solicitar:</label>
        <select id="servicio" class="form-select mt-3" name="servicio">
          <?php foreach ($servicios as $servicio): ?>
            <option value="<?php echo $servicio['id'] ?>">
              <?php echo $servicio['servicio']; ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <!-- ////// MOSTRAR LOS ERRORES ////// -->
      <?php if(!empty($errores)): ?>
        <div>
          <ul>
            <?php echo $errores ?>
          </ul>
        </div>
      <?php endif ?>
      <!-- ////// MOSTRAR MENSAJE ////// -->
      <?php if(empty($errores)): ?>
        <div class="pt-3">
          <p><em><?php echo $mensaje ?></em></p>
        </div>
      <?php endif ?>
      <!-- ////// BOTÓN DE 'SOLICITAR' ////// -->
      <div class="ms-auto col-2">
        <input type="submit" class="btn btn-3 btn-s form-control mt-3" name="submit" value="Solicitar">
      </div>
    </div>
  </form>
</main>

<?php include_once 'templates/footerRegistrados.php' ?>
