<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="cuentas.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nueva cuenta</h3>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-9">
					<label for="titulo" class="my-2 fw-bold">Título</label>
			  	<input type="text" name="titulo" id="titulo" class="form-control mb-2" placeholder="Nombre de la cuenta"
			  					value="<?php if(isset($_POST['submit']) && !empty($titulo)) echo $titulo; ?>">
			  </div>
			  <div class="col-3">
			  	<label for="precio" class="my-2 fw-bold">Precio</label>
			  	<input type="number" name="precio" id="precio" class="form-control mb-2" placeholder="Ejemplo: 10"
			  					value="<?php if(isset($_POST['submit']) && !empty($precio)) echo $precio; ?>">
				</div>
			  <div class="col-12">
			  	<label for="descripcion" class="my-2 fw-bold">Descripción</label>
			  	<textarea name="descripcion" id="descripcion" class="form-control mb-2" placeholder="Escribe las características de la cuenta..." cols="30" rows="10"><?php if(isset($_POST['submit']) && !empty($descripcion)) echo $descripcion; ?></textarea>
				</div>
			  <!-- ////// MOSTRAR ERRORES ////// -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
			  <!-- ////// BOTÓN DE 'CREAR NUEVO' ////// -->
			  <div class="d-grid justify-content-md-end mt-4 mb-5 pb-4">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Crear nueva">
			  </div>
			</form>
		</div>
	</main>


<?php include_once 'templates/footer.php' ?>