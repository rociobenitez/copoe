<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="alumnos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar alumno</h3>
  	</div>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="pt-3 pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div>
					<p class="fs-5">Id: <?php echo $alumno['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control mb-2"
										value="<?php echo $alumno['id'] ?>">
				</div>
				<div class="col-6">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control mb-2"
										value="<?php echo $alumno['nombre']; ?>">
				</div>
				<div class="col-6">
					<label for="apellidos" class="form-label">Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control mb-2"
										value="<?php echo $alumno['apellidos']; ?>">
				</div>
				<div class="col-3">
					<label for="colegiado" class="form-label">Nº de colegiado</label>
					<input type="number" name="colegiado" id="colegiado" class="form-control mb-2"
										value="<?php echo $alumno['num_colegiado']; ?>">
				</div>
			  <div class="col-9">
			  	<label for="email" class="form-label">Email</label>
			  	<input type="email" name="email" id="email" class="form-control mb-2"
			  						value="<?php echo $alumno['email']; ?>">
			  </div>
			  <div class="col-6">
			  	<label for="direccion" class="form-label">Direccion</label>
			  	<input type="text" name="direccion" id="direccion" class="form-control mb-2"
			  						value="<?php echo $alumno['direccion']; ?>">
			  </div>
				<div class="col-6">
					<label for="cuenta" class="form-label">Número de cuenta bancaria</label>
					<input type="text" name="cuenta" id="cuenta" class="form-control mb-2"
										value="<?php echo $alumno['cuentaBanco']; ?>">
				</div>
			  <div class="col-12">
			  	<label for="curso" class="form-label">Curso</label>
			  	<select id="curso" class="form-select" name="curso">
			  		<option selected><?php echo $alumno['id_curso'] ?></option>
			  		<?php foreach ($cursos as $curso): ?>
	            <option value="<?php echo $curso['id'] ?>">
	            	<?php echo $curso['titulo'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <div class="col-12">
			  	<label for="estado" class="form-label">Estado</label>
			  	<select id="estado" class="form-select" name="estado">
			  		<option selected><?php echo $alumno['id_estado'] ?></option>
			  		<?php foreach ($estados as $estado): ?>
	            <option value="<?php echo $estado['id'] ?>">
	            	<?php echo $estado['estado'] ?></option>
	          <?php endforeach ?>
			    </select>
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
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2 mb-5" name="submit" value="Editar">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>