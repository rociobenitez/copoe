<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="ventajas.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nueva ventaja</h3>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data"> <!-- enctype: permite enviar archivos a través del formulario -->
			  <input type="text" name="titulo" id="titulo" class="form-control mb-2" placeholder="Título"
			  				value="<?php if(isset($_POST['submit']) && !empty($titulo)) echo $titulo; ?>">
			  <input type="text" name="extracto" id="extracto" class="form-control mb-2" placeholder="Extracto"
			  				value="<?php if(isset($_POST['submit']) && !empty($extracto)) echo $extracto; ?>">
			  <textarea name="enfasis" id="enfasis" class="form-control mb-2" placeholder="Texto destacado" cols="30" rows="3"><?php if(isset($_POST['submit']) && !empty($enfasis)) echo $enfasis; ?></textarea>
			  <textarea name="descripcion" id="descripcion" class="form-control mb-2" placeholder="Descripción" cols="30" rows="10"><?php if(isset($_POST['submit']) && !empty($descripcion)) echo $descripcion; ?></textarea>
			  <input type="text" name="boton" id="boton" class="form-control mb-3" placeholder="Texto del boton"
			  				value="<?php if(isset($_POST['submit']) && !empty($boton)) echo $boton; ?>">
			  <input type="text" name="url" id="url" class="form-control mb-3" placeholder="Url del botón"
			  				value="<?php if(isset($_POST['submit']) && !empty($url)) echo $url; ?>">
			  <!-- ////// SUBIR IMÁGENES ////// -->
			  <label for="icono" class="my-2 fw-bold">Subir icono:</label>
			  <input type="file" name="icono" id="icono" class="form-control mb-2" accept="image/png, image/jpeg">
			  <label for="imagen" class="my-2 fw-bold">Subir imagen:</label>
			  <input type="file" name="imagen" id="imagen" class="form-control mb-2" accept="image/png, image/jpeg">
			  <!-- ////// MOSTRAR ERRORES ////// -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
			  <!-- ////// BOTÓN DE 'CREAR NUEVO' ////// -->
			  <div class="d-grid justify-content-md-end mt-4 mb-5">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Crear nueva">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>