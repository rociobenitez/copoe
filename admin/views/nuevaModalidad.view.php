<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="modalidades.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nueva modalidad</h3>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-12">
					<label for="modalidad" class="form-label">Modalidad</label>
					<input type="text" name="modalidad" id="modalidad" class="form-control mb-2" placeholder="Nombre de la modalidad" value="<?php if(isset($_POST['submit']) && !empty($modalidad)) echo $modalidad; ?>">
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
			  <div class="d-grid justify-content-md-end mt-4">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Crear nueva">
			  </div>
			</form>
		</div> 
	</main>

<?php include_once 'templates/footer.php' ?>