<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5 pb-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="ventajas.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Datos de la ventaja</h3>
  	</div>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="pt-3 pb-5 mb-5">
			<div class="mb-3 text-end">
				<img src="<?php echo $admin_config['carpetaImgIconos'].$ventaja['icono'] ?>" alt="<?php echo $ventaja['titulo'] ?>" id="imgIconoAdmin" class="p-3">
			</div>
			<table class="table bg-white table-borderless table-hover align-middle table-striped">
        <tbody>
          <tr>
          	<th class="col-2">ID</th>
          	<th><?php echo $ventaja['id'] ?></th>
          </tr>
          <tr>
          	<th class="col-2">TITULO</th>
          	<th class="fs-2"><?php echo $ventaja['titulo'] ?></th>
          </tr>
          <tr>
          	<th class="col-2">EXTRACTO</th>
          	<th><?php echo $ventaja['extracto'] ?></th>
          </tr>
          <tr>
          	<th class="col-2">DESCRIPCIÓN</th>
          	<th><?php echo $ventaja['descripcion'] ?></th>
          </tr>
          <tr>
          	<th class="col-2">TEXTO DESTACADO</th>
          	<th><?php echo $ventaja['enfasis'] ?></th>
          </tr>
          <tr>
          	<th class="col-2">TEXTO DEL BOTÓN</th>
          	<th><?php echo $ventaja['boton'] ?></th>
          </tr>
          <tr>
          	<th class="col-2">URL DEL BOTÓN</th>
          	<th><?php echo $ventaja['url'] ?></th>
          </tr>
          <tr>
          	
          </tr>
        </tbody>
      </table><!-- final de la tabla 'Ventaja' -->
      <table class="text-center table tableAdmin mt-5">
      	<thead>
      		<tr>
      			<th>IMAGEN</th>
      		</tr>
      	</thead>
      	<tbody>
      		<tr>
          	<th><img src="<?php echo $admin_config['carpetaImgVentajas'].$ventaja['imagen'] ?>" alt="<?php echo $ventaja['titulo'] ?>"></th>
          </tr>
      	</tbody>
      </table>
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>