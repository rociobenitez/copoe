
<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 bg-whote pt-4">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container my-5 pb-5 form-signin text-center" id="loginFront">
  <!-- ////// FORMULARIO LOGIN - INICIO SESIÓN ////// -->
  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><!-- htmlspecialchars para evitar inyecciones de código-->
    <h1 class="h3 fw-normal my-5">Iniciar sesión</h1>
    <!-- ////// CAMPO USUARIO ////// -->
    <div class="form-floating pb-2">
      <input type="text" name="user" placeholder="Usuario" class="form-control mb-2" id="floatingInput"
              value="<?php if(isset($_POST['submit']) && !empty($user)) echo $user ?>">
      <label for="floatingInput">Usuario</label>
    </div>
    <!-- ////// CAMPO CONTRASEÑA ////// -->
    <div class="form-floating pb-2">
      <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" id="floatingPassword"> 
      <label for="floatingPassword">Contraseña</label>    
    </div>
    <div class="checkbox mb-1 pt-1 d-flex me-auto ms-1 text-muted">
      <label>
        <input type="checkbox" value="recuerdame"> Recuérdame
      </label>
    </div>
    <!-- ////// MOSTRAR LOS ERRORES ////// -->
    <?php if(!empty($errores)) : ?>  <!-- Si hay errores: -->
      <div class="mt-3">
        <ul class="fst-italic turquesa">
          <?php echo $errores ?> <!-- Muéstralos al usuario -->
        </ul>
      </div>
    <?php endif ?>
    <!-- ////// BOTÓN INICIAR SESIÓN ////// -->
    <input type="submit" name="submit" value="Iniciar sesión" class="btn btn-3 btn-s my-5">
    <p class=" fw-bold">¿No tienes cuenta? <a href="registro.php?id=<?php echo $asociado['id'] ?>" class="turquesa text-decoration-underline ms-1 fw-bold">Quiero asociarme</a></p>
  </form>
</main>

<?php include_once 'templates/footer.php' ?>


