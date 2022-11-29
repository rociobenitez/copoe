<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="contactos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar contacto</h3>
  	</div>
		<!-- CAMPOS A RELLENAR -->
		<div class="py-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div>
					<p class="fs-5">Id: <?php echo $contacto['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control mb-2"
										value="<?php echo $contacto['id'] ?>">
				</div>
			  <div class="col-12">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control mb-2"
										value="<?php echo $contacto['nombre']; ?>">
				</div>
				<div class="col-8">
			  	<label for="email" class="form-label">Email</label>
			  	<input type="email" name="email" id="email" class="form-control mb-2"
			  						value="<?php echo $contacto['email']; ?>">
			  </div>
			  <div class="col-4">
			  	<label for="telefono" class="form-label">Teléfono</label>
			  	<input type="tel" name="telefono" id="telefono" class="form-control mb-2"
			  						value="<?php echo $contacto['telefono']; ?>">
			  </div>
			  <div class="col-12">
			  	<p class="fs-5">Consulta: <?php echo $contacto['descripcion'] ?></p>
					<textarea name="descripcion" id="descripcion" class="form-control mb-2" cols="30" rows="5"><?php echo $contacto['descripcion']; ?></textarea>
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