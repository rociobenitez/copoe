<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5 pb-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="asociados.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Datos del Asociado</h3>
  	</div>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="pt-3 pb-5 mb-5">
			<table class="table bg-white table-borderless table-hover align-middle">
        <tbody>
          <tr>
          	<th>ID</th>
          	<th><?php echo $asociado['id'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>USUARIO</th>
          	<th><?php echo $asociado['usuario'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>CONTRASEÑA</th>
          	<th><?php echo $asociado['password'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>NOMBRE</th>
          	<th><?php echo $asociado['nombre'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>APELLIDOS</th>
          	<th><?php echo $asociado['apellidos'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>EMAIL</th>
          	<th><?php echo $asociado['email'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>FECHA DE REGISTRO</th>
          	<th><?php echo $asociado['fecha'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>DIRECCIÓN</th>
          	<th><?php echo $asociado['direccion'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>PROVINCIA</th>
          	<th><?php echo $asociado['fecha'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>ID CUENTA</th>
          	<th><?php echo $asociado['id_cuenta'] ?></th>
          </tr>
        </tbody>
      </table>
      <div class=" container py-5">
      	<!-- ////// TABLA ID CUENTAS ////// -->
	      <table class="table table-small table-hover mb-5" id="tablaCuentas">
	        <thead class="bg-white">
	          <tr>
	            <th class="col-1">ID</th>
	            <th>CURSO</th>
	          </tr>
	        </thead>
	        <tbody>
	          <?php foreach ($cuentas as $cuenta): ?>
	            <tr>
	              <th class="col-1"><?php echo $cuenta['id'] ?></th>
	              <th><?php echo $cuenta['titulo'] ?></th>
	            </tr>
	          <?php endforeach ?>
	        </tbody>
	      </table>
      </div>
      
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>