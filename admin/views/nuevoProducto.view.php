<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="productos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nuevo producto</h3>

		<!-- ///// CAMPOS A RELLENAR ///// -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-12">
					<label for="nombre" class="form-label">Producto</label>
					<input type="text" name="nombre" id="nombre" class="form-control mb-2" placeholder="Nombre del producto" value="<?php if(isset($_POST['crear']) && !empty($nombre)) echo $nombre; ?>">
				</div>
				<div class="col-12">
					<label for="descripcion" class="form-label">Descripción del producto</label>
					<textarea name="descripcion" id="descripcion" class="form-control mb-2" placeholder="Escribe sus características" cols="30" rows="10"><?php if(isset($_POST['crear']) && !empty($descripcion)) echo $descripcion; ?></textarea>
				</div>
				<div class="col-md-3">
			  	<label for="precio" class="form-label">Precio</label>
			  	<input type="text" name="precio" id="precio" class="form-control mb-2" placeholder="Ejemplo: 12.50" value="<?php if(isset($_POST['crear']) && !empty($precio)) echo $precio; ?>">
			  </div>
			  <div class="col-md-3">
			  	<label for="cantidad" class="form-label">Cantidad</label>
			  	<input type="number" name="cantidad" id="cantidad" class="form-control mb-2" placeholder="Ejemplo: 1" value="<?php if(isset($_POST['crear']) && !empty($cantidad)) echo $cantidad; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="categoria" class="form-label">Categoría</label>
			  	<select id="categoria" class="form-select" name="categoria">
	          <option selected>Elige la categoría del producto...</option>
	          <?php foreach ($categorias as $categoria): ?>
	            <option value="<?php echo $categoria['id'] ?>">
	            	<?php echo $categoria['categoria'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <!-- ///// SUBIR IMAGEN ///// -->
			  <label for="imagen" class="mt-4 fw-bold">Subir imagen:</label>
			  <input type="file" name="imagen" id="imagen" class="form-control mb-2">
			  <!-- ///// MOSTRAR ERRORES ///// -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
				<!-- ///// BOTÓN DE 'CREAR NUEVO' ///// -->
			  <div class="d-grid justify-content-md-end mt-4 mb-5">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="crear" value="Crear nuevo">
			  </div>
			</form>
		</div> 
	</main>

<?php include_once 'templates/footer.php' ?>