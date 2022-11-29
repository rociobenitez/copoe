<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="productos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar producto</h3>
  	</div>
		<div class="pt-3 pb-5">
			<!-- ////// IMAGEN DEL PRODUCTO ////// -->
			<div class="mb-3 text-end">
				<img src="<?php echo $admin_config['carpetaImgTienda'].$producto['imagen'] ?>" alt="<?php echo $producto['nombre'] ?>" id="imgEditarAdmin">
			</div>
			<!-- ////// CAMPOS DEL PRODUCTO ////// -->
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div>
					<p class="fs-5">Id: <?php echo $producto['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control mb-2"
										value="<?php echo $producto['id'] ?>">
				</div>
				<div class="col-12">
					<label for="nombre" class="form-label">Título</label>
					<input type="text" name="nombre" id="nombre" class="form-control mb-2"
									value="<?php echo $producto['nombre'] ?>">
				</div>
				<div class="col-12">
					<label for="descripcion" class="form-label">Descripción del producto</label>
					<textarea name="descripcion" id="descripcion" class="form-control mb-2" cols="30" rows="8"><?php echo $producto['descripcion'] ?></textarea>
				</div>
				<div class="col-3">
			  	<label for="precio" class="form-label">Precio</label>
			  	<input type="text" name="precio" id="precio" class="form-control mb-2"
			  					value="<?php echo $producto['precio'] ?>">
			  </div>
			  <div class="col-3">
			  	<label for="cantidad" class="form-label">Cantidad</label>
			  	<input type="number" name="cantidad" id="cantidad" class="form-control mb-2"
			  					value="<?php echo $producto['cantidad'] ?>">
			  </div>
			  <div class="col-6">
			  	<label for="categoria" class="form-label">Categoría</label>
			  	<select id="categoria" class="form-select" name="categoria">
	          <option selected><?php echo $producto['id_categoria'] ?></option>
	          <?php foreach ($categorias as $categoria): ?>
	            <option value="<?php echo $categoria['id'] ?>">
	            	<?php echo $categoria['categoria'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <!-- ////// CAMBIAR IMAGEN / IMAGEN GUARDADA ////// -->
			  <div>
			  	<label for="imagen" class="form-label">Cambiar la imagen:</label>
			  	<input type="file" name="imagen" id="imagen" class="form-control mb-2">
			  	<input type="hidden" name="imagenGuardada" id="imagenGuardada" class="form-control mb-2" value="<?php echo $producto['imagen'] ?>"><!-- Este va a guardar el valor de la imagen de la Base de Datos -->
			  	<p class="fst-italic">Imagen guardada: <?php echo $producto['imagen'] ?></p>
			  </div>
			  <!-- ////// MOSTRAR ERRORES ////// -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
			  <!-- ////// BOTÓN 'EDITAR' ////// -->
			  <div class="d-grid justify-content-md-end pb-5">
			  	<input type="submit" class="btn btn-3 btn-s form-control mt-2 mb-5" name="editar" value="Editar">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>