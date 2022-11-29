<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container pb-5 admin">
  	<div class="d-flex justify-content-between align-items-center py-4">
  		<a href="asociados.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  	</div>
		<h3 class="my-4">Nuevo asociado</h3>
		<!-- CAMPOS A RELLENAR -->
		<div class="pb-5">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data" class="row g-3"> <!-- enctype: permite enviar archivos a través del formulario -->
				<div class="col-4">
					<label for="usuario" class="form-label">Usuario</label>
					<input type="text" name="usuario" class="form-control mb-2" placeholder="Escribe el nombre de usuario" value="<?php if(isset($_POST['submit']) && !empty($usuario)) echo $usuario; ?>">
				</div>
			  <div class="col-4">
			  	<label for="password" class="form-label">Contraseña</label>
			  	<input type="password" name="password" class="form-control mb-2" placeholder="Escribe la contraseña">
			  </div>
			  <div class="col-4">
			  	<label for="password2" class="form-label">Repetir Contraseña</label>
			  	<input type="password" name="password2" class="form-control mb-2" placeholder="Repite la contraseña">
			  </div>
			  <div class="col-6">
					<label for="nombre" class="form-label">Nombre</label>
					<input type="text" name="nombre" class="form-control mb-2" placeholder="Escribe el nombre del asociado" value="<?php if(isset($_POST['submit']) && !empty($nombre)) echo $nombre; ?>">
				</div>
			  <div class="col-6">
			  	<label for="apellidos" class="form-label">Apellidos</label>
			  	<input type="text" name="apellidos" class="form-control mb-2" placeholder="Escribe los apellidos" value="<?php if(isset($_POST['submit']) && !empty($apellidos)) echo $apellidos; ?>">
			  </div>
			  <div class="col-4">
			  	<label for="cuenta" class="form-label">Cuenta de Asociado</label>
			  	<select id="cuenta" class="form-select" name="cuenta">
	          <option selected>Elige...</option>
	          <?php foreach ($cuentas as $cuenta): ?>
	            <option value="<?php echo $cuenta['id'] ?>">
	            	<?php echo $cuenta['titulo'] ?></option>
	          <?php endforeach ?>
			    </select>
			  </div>
			  <div class="col-8">
					<label for="email" class="form-label">Email</label>
					<input type="email" name="email" class="form-control mb-2" placeholder="Escribe el email del asociado" value="<?php if(isset($_POST['submit']) && !empty($email)) echo $email; ?>">
				</div>
			  <div class="col-8">
			  	<label for="direccion" class="form-label">Dirección</label>
			  	<input type="text" name="direccion" class="form-control mb-2" placeholder="Calle, avenida, paseo..." value="<?php if(isset($_POST['submit']) && !empty($direccion)) echo $direccion; ?>">
			  </div>
			  <div class="col-4">
			  	<label for="provincia" class="form-label">Provincia</label>
			  	<input type="text" name="provincia" class="form-control mb-2" placeholder="Escribe la provincia" value="<?php if(isset($_POST['submit']) && !empty($provincia)) echo $provincia; ?>">
			  </div>

			  <!-- MOSTRAR ERRORES -->
			  <?php if (!empty($errores)): ?>
			  	<div>
			  		<ul>
			  			<?php echo "$errores"; ?>
			  		</ul>
			  	</div>
			  <?php endif ?>

				<!-- BOTÓN DE 'CREAR NUEVO' -->
			  <div class="d-grid justify-content-md-end mt-4">
			  	<input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Crear nuevo">
			  </div>
			</form>
		</div> 
	</main>

<?php include_once 'templates/footer.php' ?>