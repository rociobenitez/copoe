<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="articulos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nuevo artículo</h3>

		<!-- ///// CAMPOS A RELLENAR ///// -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data"> <!-- enctype: permite enviar archivos a través del formulario -->
			  <input type="text" name="titulo" id="titulo" class="form-control mb-2" placeholder="Título" 
			  					value="<?php if(isset($_POST['crear']) && !empty($titulo)) echo $titulo; ?>">
			  <input type="text" name="extracto" id="extracto" class="form-control mb-2" placeholder="Extracto" 
			  					value="<?php if(isset($_POST['crear']) && !empty($extracto)) echo $extracto; ?>">
			  <div id="toolbar"></div>
			  <div id="editor"></div>
			  <textarea name="descripcion" id="descripcion" class="form-control mb-2 editor" placeholder="Descripción" cols="30" rows="10"><?php if(isset($_POST['crear']) && !empty($descripcion)) echo $descripcion; ?></textarea>
			  <div class="col-md-12">
			  	<select id="categoria" class="form-select" name="categoria">
	          <option selected>Elige la categoría...</option>
	          <?php foreach ($categorias as $categoria): ?>
	            <option value="<?php echo $categoria['id'] ?>">
	            	<?php echo $categoria['categoria'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <!-- ///// SUBIR IMÁGENES ///// -->
			  <label for="imagen" class="mt-4 mb-2 fw-bold">Subir imagen:</label>
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
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="crear" value="Crear nuevo" id="botonCrear">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>