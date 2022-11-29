<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="asociados.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Editar asociado</h3>
  	</div>
		<!-- CAMPOS A RELLENAR -->
		<div class="py-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div>
					<p class="fs-5">Id: <?php echo $asociado['id'] ?></p>
					<input type="hidden" name="id" id="id" class="form-control mb-2"
										value="<?php echo $asociado['id'] ?>">
				</div>
				<div class="col-6">
					<label for="usuario" class="form-label">Usuario</label>
					<input type="text" name="usuario" id="usuario" class="form-control mb-2"
										value="<?php echo $asociado['usuario']; ?>">
				</div>
				<div class="col-6">
					<label for="password" class="form-label">Contraseña</label>
					<input type="password" name="password" id="password" class="form-control mb-2"
										value="<?php echo $asociado['password']; ?>">
				</div>
			  <div class="col-6">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control mb-2"
										value="<?php echo $asociado['nombre']; ?>">
				</div>
				<div class="col-6">
					<label for="apellidos" class="form-label">Apellidos</label>
					<input type="text" name="apellidos" id="apellidos" class="form-control mb-2"
										value="<?php echo $asociado['apellidos']; ?>">
				</div>
				<div class="col-3">
			  	<label for="cuenta" class="form-label">Cuenta de Asociado</label>
			  	<select id="cuenta" class="form-select" name="cuenta">
			  		<option selected><?php echo $asociado['id_cuenta'] ?></option>
			  		<?php foreach ($cuentas as $cuenta): ?>
	            <option value="<?php echo $cuenta['id'] ?>">
	            	<?php echo $cuenta['titulo'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
				<div class="col-9">
			  	<label for="email" class="form-label">Email</label>
			  	<input type="email" name="email" id="email" class="form-control mb-2"
			  						value="<?php echo $asociado['email']; ?>">
			  </div>
			  <div class="col-8">
			  	<label for="direccion" class="form-label">Direccion</label>
			  	<input type="text" name="direccion" id="direccion" class="form-control mb-2"
			  						value="<?php echo $asociado['direccion']; ?>">
			  </div>
			  <div class="col-4">
			  	<label for="provincia" class="form-label">Provincia</label>
			  	<input type="text" name="provincia" id="provincia" class="form-control mb-2"
			  						value="<?php echo $asociado['provincia']; ?>">
			  </div>
			  <!-- MOSTRAR ERRORES -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>
				<!-- BOTÓN DE 'EDITAR' -->
			  <div class="d-grid justify-content-md-end mt-4">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Editar">
			  </div>
			</form>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>