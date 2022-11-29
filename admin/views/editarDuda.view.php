<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5 pb-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="dudas.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar duda</h3>
  	</div>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="py-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-12">
					<p class="fs-5">Id: <?php echo $duda['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control mt-2"
									value="<?php echo $duda['id'] ?>">
				</div>
				<div class="col-12">
					<label for="pregunta" class="form-label">Pregunta</label>
					<input type="text" name="pregunta" id="pregunta" class="form-control mb-2" value="<?php echo $duda['pregunta']; ?>">
				</div>
			  <div class="col-12">
			  	<label for="respuesta" class="form-label">Respuesta</label>
			  	<textarea name="respuesta" id="respuesta" class="form-control my-2" cols="30" rows="8"><?php echo $duda['respuesta'] ?></textarea>
			  </div>
			  <!-- ////// MOSTRAR ERRORES ////// -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
				<!-- ////// BOTÓN DE 'EDITAR' ////// -->
			  <div class="d-grid justify-content-md-end mt-2 pb-5 mb-5">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Editar">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>