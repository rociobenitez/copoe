<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="alumnos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nuevo alumno</h3>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-6">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control mb-2" placeholder="Escribe el nombre del alumno"
									value="<?php if(isset($_POST['submit']) && !empty($nombre)) echo $nombre; ?>">
				</div>
				<div class="col-6">
					<label for="apellidos" class="form-label">Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control mb-2" placeholder="Escribe los apellidos del alumno"
									value="<?php if(isset($_POST['submit']) && !empty($apellidos)) echo $apellidos; ?>">
				</div>
				<div class="col-3">
					<label for="colegiado" class="form-label">Nº de colegiado</label>
					<input type="number" name="colegiado" id="colegiado" class="form-control mb-2" placeholder="Ej: 838281017"
									value="<?php if(isset($_POST['submit']) && !empty($colegiado)) echo $colegiado; ?>">
				</div>
			  <div class="col-9">
			  	<label for="email" class="form-label">Email</label>
			  	<input type="text" name="email" id="email" class="form-control mb-2" placeholder="Escribe la dirección de correo"
			  					value="<?php if(isset($_POST['submit']) && !empty($email)) echo $email; ?>">
			  </div>
			  <div class="col-6">
			  	<label for="direccion" class="form-label">Direccion</label>
			  	<input type="text" name="direccion" id="direccion" class="form-control mb-2" placeholder="Escribe la calle"
			  					value="<?php if(isset($_POST['submit']) && !empty($direccion)) echo $direccion; ?>">
			  </div>
				<div class="col-6">
					<label for="cuenta" class="form-label">Número de cuenta bancaria</label>
					<input type="text" name="cuenta" id="cuenta" class="form-control mb-2" placeholder="Ej: ES6600190020961234567890"
									value="<?php if(isset($_POST['submit']) && !empty($cuenta)) echo $cuenta; ?>">
				</div>
			  <div class="col-12">
			  	<label for="curso" class="form-label">Curso</label>
			  	<select id="curso" class="form-select" name="curso">
			  		<option selected>Elige el curso...</option>
			  		<?php foreach ($cursos as $curso): ?>
			  			<option value="<?php echo $curso['id'] ?>"><?php echo $curso['titulo'] ?></option>
			  		<?php endforeach ?>
			    </select>
			  </div>
			  <div class="col-12">
			  	<label for="estado" class="form-label">Estado</label>
			  	<select id="estado" class="form-select" name="estado">
			  		<option selected>Elige el estado...</option>
			  		<?php foreach ($estados as $estado): ?>
			  			<option value="<?php echo $estado['id'] ?>"><?php echo $estado['estado'] ?></option>
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
				<!-- ////// BOTÓN DE 'CREAR NUEVO' ////// -->
			  <div class="d-grid justify-content-md-end pb-5 mb-5">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Crear nuevo">
			  </div>
			</form>
		</div> 
	</main>

<?php include_once 'templates/footer.php' ?>