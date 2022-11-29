<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="ventajas.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar ventaja</h3>
  	</div>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="py-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data"> <!-- enctype: permite enviar archivos a través del formulario -->
			  <div class="col-12">
					<p class="fs-5">Id: <?php echo $ventaja['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control my-2"
									value="<?php echo $ventaja['id'] ?>">
				</div>
			  <input type="text" name="titulo" id="titulo" class="form-control mb-2"
			  					value="<?php echo $ventaja['titulo'] ?>">
			  <input type="text" name="extracto" id="extracto" class="form-control mb-2"
			  					value="<?php echo $ventaja['extracto'] ?>">
			  <textarea name="enfasis" id="enfasis" class="form-control mb-2" cols="30" rows="3"><?php echo $ventaja['enfasis'] ?></textarea>
			  <textarea name="descripcion" id="descripcion" class="form-control mb-2" cols="30" rows="10"><?php echo $ventaja['descripcion'] ?></textarea>
			  <input type="text" name="boton" id="boton" class="form-control mb-3"
			  					value="<?php echo $ventaja['boton'] ?>">
			  <input type="text" name="url" id="url" class="form-control mb-3"
			  					value="<?php echo $ventaja['url'] ?>">
			  <!-- ////// SUBIR IMÁGENES ////// -->
			  <label for="icono" class="my-2 fw-bold">Subir icono:</label>
			  <input type="file" name="icono" id="icono" class="form-control mb-2">
			  <input type="hidden" name="iconoGuardado" id="iconoGuardado" class="form-control mb-2"
			  					value="<?php echo $ventaja['icono'] ?>"><!-- Valor de la imagen BBDD -->
			  <p class="fst-italic">Imagen guardada: <?php echo $ventaja['icono'] ?></p>
			  <label for="imagen" class="my-2 fw-bold">Subir imagen:</label>
			  <input type="file" name="imagen" id="imagen" class="form-control mb-2">
			  <input type="hidden" name="imagenGuardada" id="imagenGuardada" class="form-control mb-2"
			  					value="<?php echo $ventaja['imagen'] ?>"><!-- Valor de la imagen BBDD -->
			  <p class="fst-italic">Imagen guardada: <?php echo $ventaja['imagen'] ?></p>
			  <!-- ////// MOSTRAR ERRORES ////// -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
			  <!-- ////// BOTÓN 'EDITAR' ////// -->
			  <div class="d-grid justify-content-md-end mt-2 pb-5">
			  	<input type="submit" class="btn btn-3 btn-s form-control mt-2 mb-5" name="submit" value="Editar">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>