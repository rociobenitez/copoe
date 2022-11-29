<?php include_once 'views/templates/header.php' ?>

<!-- ////// INICIAR SESIÓN PARA ACCEDER AL PANEL DE ADMINISTRACIÓN DEL ADMIN ////// -->
<main class="my-5 py-5 form-signin text-center">

  <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST"><!-- htmlspecialchars para evitar inyecciones de código-->
  	<img src="../img/favicon.png" alt="logo COPOE" class="mb-4" id="logoAdmin">
    <h1 class="h3 fw-normal my-3">Iniciar sesión</h1>

    <!-- ////// CAMPO USUARIO ////// -->
    <div class="form-floating">
      <input type="text" name="user" placeholder="Usuario" class="form-control mb-2" id="floatingInput"
              value="<?php if(isset($_POST['submit']) && !empty($user)) echo $user ?>">
      <label for="floatingInput">Usuario</label>
    </div>
    <!-- ////// CAMPO CONTRASEÑA ////// -->
    <div class="form-floating">
      <input type="password" name="pass" placeholder="Contraseña" class="form-control mb-2" id="floatingPassword"> 
      <label for="floatingPassword">Contraseña</label>    
    </div>
    <!-- ////// CHECKBOX RECORDAR DATOS ////// -->
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="recuerdame"> Recuérdame
      </label>
    </div>
  	<!-- ////// MOSTRAR LOS ERRORES ////// -->
  	<?php if(!empty($errores)) : ?>  <!-- Si hay errores: -->
  	  <div>
  	  	<ul>
  	  	  <?php echo $errores ?> <!-- Muéstralos al usuario -->
  	  	</ul>
  	  </div>
  	<?php endif ?>
    <!-- ////// BOTÓN INICIAR SESIÓN ////// -->
  	<input type="submit" name="submit" value="Iniciar sesión" class="btn btn-3 btn-s my-5">
    <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
  </form>

</main>

