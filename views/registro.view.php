<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 bg-white">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container mb-5 pb-3">
  <!-- ////// FINALIZAR SUSCRIPCIÓN - REGISTRO ////// -->
  <div class="d-flex justify-content-between mb-2 pt-5">
    <h4 class="mt-5">Únete a nuestro Círculo de Podólogos</h4>
    <p class="fs-6 fw-bold"><b>¿Ya eres cliente?</b> <a href="login.php" class="turquesa text-decoration-underline ms-1 fs-6 fw-bold">Inicia sesión</a></p> 
  </div>

  <div class="p-5 bg-light">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
      <h6 class="pb-2">Datos de registro</h6>
      <div class="row g-2">
        <div class="col">
          <input type="text" name="nombre" placeholder="Nombre *" class="form-control mb-2"
                  value="<?php if(isset($_POST['submit']) && !empty($nombre)) echo $nombre ?>">
        </div>
        <div class="col">
          <input type="text" name="apellidos" placeholder="Apellidos *" class="form-control mb-2"
                  value="<?php if(isset($_POST['submit']) && !empty($apellido))echo $apellido ?>">
        </div>
      </div>
      <div class="row g-2">
        <div class="col">
          <input type="text" name="user" placeholder="Nombre de Usuario *" class="form-control mb-2" 
     
            value="<?php if(isset($_POST['submit']) && !empty($user)) echo $user ?>">
        </div>
        <div class="col">
          <input type="text" name="email" placeholder="Email *" class="form-control mb-2"
                  value="<?php if(isset($_POST['submit']) && !empty($email)) echo $email ?>">
        </div>
      </div>
      <div class="row g-2 pb-4">
        <div class="col">
         <input type="password" name="pass" placeholder="Contraseña *" class="form-control mb-2"> 
        </div>
        <div class="col"> 
          <input type="password" name="pass2" placeholder="Repite Contraseña *" class="form-control mb-2">     
        </div>
      </div>
      <h6 class="pb-2">Datos de facturación</h6>
      <div class="row g-2 pb-4">
        <div class="col">
          <input type="text" name="direccion" placeholder="Dirección (calle, avenida...) *" class="form-control mb-2"
                  value="<?php if(isset($_POST['submit']) && !empty($direccion)) echo $direccion ?>">
        </div>
        <div class="col">
          <input type="text" name="provincia" placeholder="Provincia *" class="form-control mb-2"
                  value="<?php if(isset($_POST['submit']) && !empty($provincia)) echo $provincia ?>">
        </div>
      </div>
      <!-- ////// MOSTRAR LOS ERRORES ////// -->
      <?php if (!empty($errores)): ?>
        <div>
          <ul>
            <?php echo $errores ?>
          </ul>
        </div>
      <?php endif ?>
      <h6 class="pb-2">¿Cómo quieres asociarte?</h6>
      <div class="input-group mb-4">
        <select class="form-select" name="cuenta" id="cuentasSelect" required>
          <option selected>Elige tu cuenta...</option>
          <?php foreach ($cuentas as $cuenta): ?>
            <option value="<?php echo $cuenta['id'] ?>"><?php echo $cuenta['titulo'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <!-- ////// ACEPTAR TÉRMINOS Y CONDICIONES ////// -->
      <div class="col-12 mb-5">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">Acepto los términos y condiciones</label>
          <div class="invalid-feedback">Debes aceptar antes de suscribirte</div>
        </div>
      </div>
      <!-- ////// BOTÓN 'ASOCIARME' ////// -->
      <div class="d-grid justify-content-end ms-auto">
        <input type="submit" name="submit" value="Asociarme" class="btn btn-3 btn-s ms-auto form-control">
      </div> 
    </form>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>
