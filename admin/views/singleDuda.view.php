<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5 pb-5 mb-5">
  	<div class="d-flex justify-content-between align-items-center pb-3 border-bottom">
  		<a href="dudas.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Datos de la 'duda frecuente'</h3>
  	</div>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="py-5 mb-5">
			<table class="table bg-white table-borderless align-middle text-center tableAdmin">
        <thead>
          <tr>
          	<th>ID</th>
          	<th>PREGUNTA</th>
          	<th>RESPUESTA</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          	<th class="py-4"><?php echo $duda['id'] ?></th>
          	<th class="py-4"><?php echo $duda['pregunta'] ?></th>
          	<th class="py-4"><?php echo $duda['respuesta'] ?></th>
          </tr>
        </tbody>
      </table>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>