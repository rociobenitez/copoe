<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="administradores.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar administrador</h3>
  	</div>
		<!-- CAMPOS A RELLENAR -->
		<div class="py-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-12">
					<p class="fs-5">Id: <?php echo $administrador['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control my-2"
									value="<?php echo $administrador['id'] ?>">
				</div>
				<div class="col-6">
					<label for="usuario" class="form-label">Usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control mb-2" value="<?php echo $administrador['usuario']; ?>">
				</div>
			  <div class="col-6">
			  	<label for="password" class="form-label">Contraseña</label>
			  	<input type="text" name="password" id="password" class="form-control mb-2" value="<?php echo $administrador['password'] ?>">
			  </div>
			  <!-- MOSTRAR ERRORES -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
				<!-- BOTÓN DE 'EDITAR' -->
			  <div class="d-grid justify-content-md-end mt-4">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Editar">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>