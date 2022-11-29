<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="categorias.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar cuenta</h3>
  	</div>
  	<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="py-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-12">
					<p class="fs-5">Id: <?php echo $cuenta['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control mt-2"
									value="<?php echo $cuenta['id'] ?>">
				</div>
			  <div class="col-8">
			  	<label for="titulo">Nombre de la cuenta</label>
			  	<input type="text" name="titulo" id="titulo" class="form-control mt-2"
			  					value="<?php echo $cuenta['titulo'] ?>">
			  </div>
			  <div class="col-4">
			  	<label for="precio">Precio</label>
			  	<input type="number" name="precio" id="precio" class="form-control mt-2"
			  					value="<?php echo $cuenta['precio'] ?>">
			  </div>
			  <div class="col-12">
			  	<label for="descripcion">Descripción de la cuenta</label>
			  	<textarea name="descripcion" id="descripcion" class="form-control my-2" cols="30" rows="8"><?php echo $cuenta['descripcion'] ?></textarea>
			  </div>
			  <!-- ////// MOSTRAR ERROES ////// -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
			  <!-- ////// BOTÓN DE 'EDITAR' ////// -->
			  <div class="d-grid justify-content-md-end mt-2 pb-5">
			  	<input type="submit" class="btn btn-3 btn-s form-control mt-2 mb-5" name="submit" value="Editar">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>