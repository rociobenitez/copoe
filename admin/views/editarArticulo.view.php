<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="articulos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar articulo</h3>
  	</div>
  	<div class="pt-3 pb-5">
  		<!-- IMAGEN DEL PRODUCTO -->
			<div class="mb-3 text-end">
				<img src="<?php echo $admin_config['carpetaImgBlog'].$articulo['imagen'] ?>" alt="<?php echo $articulo['titulo'] ?>" id="imgEditarAdmin">
			</div>
  		<!-- CAMPOS A RELLENAR -->
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div>
					<p class="fs-5">Id: <?php echo $articulo['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control mb-2"
										value="<?php echo $articulo['id'] ?>">
				</div>
			  <div class="col-md-12">
			  	<label for="titulo" class="form-label">Título</label>
			  	<input type="text" name="titulo" id="titulo" class="form-control mb-2"
			  						value="<?php echo $articulo['titulo'] ?>">
			  </div>
			  <label for="extracto" class="form-label">Extracto</label>
			  <textarea name="extracto" id="extracto" class="form-control mb-2" cols="30" rows="6"><?php echo $articulo['extracto'] ?></textarea>
			  <label for="descripcion" class="form-label">Descripción</label>
			  <textarea name="descripcion" class="form-control mb-2" cols="30" rows="15"><?php echo $articulo['descripcion'] ?></textarea>
			  <div class="col-md-12 my-3">
			  	<label for="categoria" class="form-label">Categoría</label>
			  	<select id="categoria" class="form-select" name="categoria">
	          <option selected><?php echo $articulo['id_categoria'] ?></option>
	          <?php foreach ($categorias as $categoria): ?>
	            <option value="<?php echo $categoria['id'] ?>">
	            	<?php echo $categoria['categoria'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <!-- CAMBIAR IMAGEN / IMAGEN GUARDADA -->
			  <div>
			  	<label for="imagen" class="form-label">Cambiar la imagen:</label>
			  	<input type="file" name="imagen" id="imagen" class="form-control mb-2">
			  	<input type="hidden" name="imagenGuardada" id="imagenGuardada" class="form-control mb-2"
			  						value="<?php echo $articulo['imagen'] ?>">
			  						<!-- Este va a guardar el valor de la imagen de la Base de Datos -->
			  	<p class="fst-italic">Imagen guardada: <?php echo $articulo['imagen'] ?></p>
			  </div>
			  <!-- MOSTRAR ERRORES -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
			  <div class="d-grid justify-content-md-end pb-5">
			  	<input type="submit" class="btn btn-3 btn-s form-control mt-2 mb-5" name="editar" value="Editar">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>