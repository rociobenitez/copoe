<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5 pb-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="contactos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Datos del Asociado</h3>
  	</div>
		<div class="pt-3 pb-5 mb-5">
			<table class="table bg-white table-borderless table-hover align-middle">
        <tbody>
          <tr>
          	<th>ID</th>
          	<th><?php echo $contacto['id'] ?></th>
          </tr>
          <tr>
          	<th>NOMBRE</th>
          	<th><?php echo $contacto['nombre'] ?></th>
          </tr>
          <tr>
          	<th>EMAIL</th>
          	<th><?php echo $contacto['email'] ?></th>
          </tr>
          <tr>
          	<th>TELÉFONO</th>
          	<th><?php echo $contacto['telefono'] ?></th>
          </tr>
          <tr>
          	<th>MENSAJE</th>
          	<th><?php echo $contacto['descripcion'] ?></th>
          </tr>
          <tr>
          	<th>FECHA DE REGISTRO</th>
          	<th><?php echo $contacto['fecha'] ?></th>
          </tr>
        </tbody>
      </table><!-- final de la tabla 'Datos del contacto'-->
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>