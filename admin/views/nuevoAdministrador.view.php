<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="administradores.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nuevo administrador</h3>
		<!-- CAMPOS A RELLENAR -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-6">
					<label for="usuario" class="form-label">Usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control mb-2" placeholder="Escribe el nombre de usuario" value="<?php if(isset($_POST['submit']) && !empty($usuario)) echo $usuario; ?>">
				</div>
			  <div class="col-6">
			  	<label for="password" class="form-label">Contraseña</label>
			  	<input type="pass" name="password" id="password" class="form-control mb-2" placeholder="Escribe la contraseña" value="<?php if(isset($_POST['submit']) && !empty($password)) echo $password; ?>">
			  </div>

			  <!-- MOSTRAR ERRORES -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>

				<!-- BOTÓN DE 'CREAR NUEVO' -->
			  <div class="d-grid justify-content-md-end mt-4">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Crear nuevo">
			  </div>
			</form>
		</div> 
	</main>

<?php include_once 'templates/footer.php' ?>