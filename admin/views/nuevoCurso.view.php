<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="cursos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nuevo curso</h3>

		<!-- ///// CAMPOS A RELLENAR ///// -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-12">
					<label for="titulo" class="form-label">Título</label>
					<input type="text" name="titulo" id="titulo" class="form-control mb-2" placeholder="Título del curso"
									value="<?php if(isset($_POST['submit']) && !empty($titulo)) echo $titulo; ?>">
				</div>
			  <div class="col-md-6">
			  	<label for="fecha" class="form-label">Fecha</label>
			  	<input type="text" name="fecha" id="fecha" class="form-control mb-2" placeholder="DD-MM-AAA (Ejemplo: 24-03-2023)"
			  					value="<?php if(isset($_POST['submit']) && !empty($fecha)) echo $fecha; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="lugar" class="form-label">Lugar</label>
			  	<input type="text" name="lugar" id="lugar" class="form-control mb-2" placeholder="Provincia"
			  					value="<?php if(isset($_POST['submit']) && !empty($lugar)) echo $lugar; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="duracion" class="form-label">Duración</label>
			  	<input type="text" name="duracion" id="duracion" class="form-control mb-2" placeholder="Número de horas"
			  					value="<?php if(isset($_POST['submit']) && !empty($duracion)) echo $duracion; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="direccion" class="form-label">Dirección</label>
			  	<input type="text" name="direccion" id="direccion" class="form-control mb-2" placeholder="Calle, avenida, paseo..."
			  					value="<?php if(isset($_POST['submit']) && !empty($direccion)) echo $direccion; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="precio" class="form-label">Precio Estándar</label>
			  	<input type="text" name="precio" id="precio" class="form-control mb-2" placeholder="Ejemplo: 250"
			  					value="<?php if(isset($_POST['submit']) && !empty($precio)) echo $precio; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="precio_asociados" class="form-label">Precio Asociados</label>
			  	<input type="text" name="precio_asociado" id="precio_asociado" class="form-control mb-2" placeholder="Ejemplo: 180"
			  					value="<?php if(isset($_POST['submit']) && !empty($precio_asociado)) echo $precio_asociado; ?>">
			  </div>
			  <div class="col-md-4">
			  	<label for="modalidad" class="form-label">Modalidad</label>
			  	<select id="modalidad" class="form-select" name="modalidad">
	          <option selected>Elige...</option>
	          <?php foreach ($modalidades as $modalidad): ?>
	            <option value="<?php echo $modalidad['id'] ?>">
	            	<?php echo $modalidad['modalidad'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <div class="col-md-6">
			  	<label for="categoria" class="form-label">Categoría</label>
			  	<select id="categoria" class="form-select" name="categoria">
	          <option selected>Elige...</option>
	          <?php foreach ($categorias as $categoria): ?>
	            <option value="<?php echo $categoria['id'] ?>">
	            	<?php echo $categoria['categoria'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <div class="col-md-2">
			  	<label for="plazas" class="form-label">Plazas</label>
			  	<input type="text" name="plazas" id="plazas" class="form-control mb-2" placeholder="Ejemplo: 20"
			  					value="<?php if(isset($_POST['submit']) && !empty($plazas)) echo $plazas; ?>">
			  </div>
			  <div class="col-12">
					<label for="docentes" class="form-label">Docentes</label>
					<input type="text" name="docentes" id="docentes" class="form-control mb-2" placeholder="Título del curso"
									value="<?php if(isset($_POST['submit']) && !empty($docentes)) echo $docentes; ?>">
				</div>
			  <div class="col-12">
			  	<label for="estado" class="form-label">Estado del curso</label>
			  	<select id="estado" class="form-select" name="estado">
	          <option selected>Elige...</option>
	          <?php foreach ($estados as $estado): ?>
	            <option value="<?php echo $estado['id'] ?>">
	            	<?php echo $estado['estado'] ?></option>
	          <?php endforeach ?>
			    </select>
				</div>
				<div class="col-12">
					<label for="extracto" class="form-label">Extracto del curso</label>
					<textarea name="extracto" id="extracto" class="form-control mb-2" placeholder="Descripción" cols="30" rows="10"><?php if(isset($_POST['submit']) && !empty($extracto)) echo $extracto; ?></textarea>
				</div>
				<div class="col-12">
					<label for="descripcion" class="form-label">Descripción del curso</label>
					<textarea name="descripcion" id="descripcion" class="form-control mb-2" placeholder="Descripción" cols="30" rows="10"><?php if(isset($_POST['submit']) && !empty($descripcion)) echo $descripcion; ?></textarea>
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
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Crear nuevo">
			  </div>
			</form>
		</div> 
	</main>

<?php include_once 'templates/footer.php' ?>


