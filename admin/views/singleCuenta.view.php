<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5 pb-5 mb-5">
  	<div class="d-flex justify-content-between align-items-center pb-3 border-bottom">
  		<a href="cuentas.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Datos de la cuenta</h3>
  	</div>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="py-5 mb-5">
			<table class="table bg-white table-borderless align-middle text-center tableAdmin">
        <thead>
          <tr>
          	<th>ID</th>
          	<th>TITULO</th>
          	<th>PRECIO</th>
          	<th>DESCRIPCIÓN</th>
          </tr>
        </thead>
        <tbody>
          <tr>
          	<th class="py-4"><?php echo $cuenta['id'] ?></th>
          	<th class="py-4"><?php echo $cuenta['titulo'] ?></th>
          	<th class="py-4"><?php echo $cuenta['precio'] ?></th>
          	<th class="py-4"><?php echo nl2br($cuenta['descripcion']) ?></th>
          </tr>
        </tbody>
      </table>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>