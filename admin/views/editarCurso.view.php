<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="cursos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar curso</h3>
  	</div>
  	<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="py-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div>
					<p class="fs-5">Id: <?php echo $curso['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control mb-2"
										value="<?php echo $curso['id'] ?>">
				</div>
				<div class="col-12">
					<label for="titulo" class="form-label">Título</label>
					<input type="text" name="titulo" id="titulo" class="form-control mb-2" value="<?php echo $curso['titulo'] ?>">
				</div>
			  <div class="col-md-6">
			  	<label for="fecha" class="form-label">Fecha</label>
			  	<input type="text" name="fecha" id="fecha" class="form-control mb-2" value="<?php echo $curso['fecha'] ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="lugar" class="form-label">Lugar</label>
			  	<input type="text" name="lugar" id="lugar" class="form-control mb-2" value="<?php echo $curso['lugar']; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="duracion" class="form-label">Duración</label>
			  	<input type="number" name="duracion" id="duracion" class="form-control mb-2" value="<?php echo $curso['duracion']; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="direccion" class="form-label">Dirección</label>
			  	<input type="text" name="direccion" id="direccion" class="form-control mb-2" value="<?php echo $curso['direccion']; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="precio" class="form-label">Precio Estándar</label>
			  	<input type="text" name="precio" id="precio" class="form-control mb-2" value="<?php echo $curso['precio']; ?>">
			  </div>
			  <div class="col-md-6">
			  	<label for="precio_asociado" class="form-label">Precio Asociados</label>
			  	<input type="text" name="precio_asociado" id="precio_asociado" class="form-control mb-2" value="<?php echo $curso['precio_asociado']; ?>">
			  </div>
			  <div class="col-md-4">
			  	<label for="modalidad" class="form-label">Modalidad</label>
			  	<select id="modalidad" class="form-select" name="modalidad">
	          <option selected><?php echo $curso['id_modalidad'] ?></option>
	          <?php foreach ($modalidades as $modalidad): ?>
	            <option value="<?php echo $modalidad['id'] ?>">
	            	<?php echo $modalidad['modalidad']; ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <div class="col-md-6">
			  	<label for="categoria" class="form-label">Categoría</label>
			  	<select id="categoria" class="form-select" name="categoria">
	          <option selected><?php echo $curso['id_categoria'] ?></option>
	          <?php foreach ($categorias as $categoria): ?>
	            <option value="<?php echo $categoria['id'] ?>">
	            	<?php echo $categoria['categoria'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <div class="col-md-2">
			  	<label for="plazas" class="form-label">Plazas</label>
			  	<input type="text" name="plazas" id="plazas" class="form-control mb-2" value="<?php echo $curso['plazas']; ?>">
			  </div>
			  <div class="col-12">
					<label for="docentes" class="form-label">Docentes</label>
					<input type="text" name="docentes" id="docentes" class="form-control mb-2" value="<?php echo $curso['docentes']; ?>">
				</div>
			  <div class="col-12">
			  	<label for="estado" class="form-label">Estado del curso</label>
			  	<select id="estado" class="form-select" name="estado">
	          <option selected><?php echo $curso['id_estado'] ?></option>
	          <?php foreach ($estados as $estado): ?>
	            <option value="<?php echo $estado['id'] ?>">
	            	<?php echo $estado['estado']; ?></option>
	          <?php endforeach ?>
			    </select>
				</div>
				<div class="col-12">
					<label for="extracto" class="form-label">Extracto o cabecera del curso</label>
					<textarea name="extracto" id="extracto" class="form-control mb-2" cols="30" rows="10"><?php echo $curso['extracto']; ?></textarea>
				</div>
				<div class="col-12">
					<label for="descripcion" class="form-label">Descripción del curso</label>
					<textarea name="descripcion" id="descripcion" class="form-control mb-2" cols="30" rows="10"><?php echo $curso['descripcion']; ?></textarea>
				</div>
			  <!-- ////// CAMBIAR IMAGEN / IMAGEN GUARDADA ////// -->
			  <div>
			  	<label for="imagen" class="mt-4 fw-bold">Cambiar la imagen:</label>
			  	<input type="file" name="imagen" id="imagen" class="form-control mb-2">
			  	<input type="hidden" name="imagenGuardada" id="imagenGuardada" class="form-control mb-2" value="<?php echo $curso['imagen'] ?>"><!-- Este va a guardar el valor de la imagen de la Base de Datos -->
			  	<p class="fst-italic">Imagen guardada: <?php echo $curso['imagen'] ?></p>
			  </div>
			  <!-- ////// IMAGEN DEL CURSO ////// -->
				<div class="mb-3">
					<img src="<?php echo $admin_config['carpetaImgCursos'].$curso['imagen'] ?>"
								alt="<?php echo $curso['titulo'] ?>" id="imgEditarAdmin">
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
			  <div class="d-grid justify-content-md-end pb-5">
			  	<input type="submit" class="btn btn-3 btn-s form-control mt-2 mb-5" name="submit" value="Editar">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>