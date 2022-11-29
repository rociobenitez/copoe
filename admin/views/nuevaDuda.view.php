<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="articulos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nueva duda</h3>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-12">
					<label for="pregunta" class="form-label">Pregunta</label>
					<input type="text" name="pregunta" id="pregunta" class="form-control mb-2" placeholder="Redacta la pregunta" 
									value="<?php if(isset($_POST['submit']) && !empty($pregunta)) echo $pregunta; ?>">
				</div>
			  <div class="col-12">
			  	<label for="respuesta" class="form-label">Respuesta</label>
			  	<textarea name="respuesta" id="respuesta" class="form-control mb-2" placeholder="Redacta la respuesta" cols="30" rows="5"><?php if(isset($_POST['submit']) && !empty($respuesta)) echo $respuesta; ?></textarea>
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