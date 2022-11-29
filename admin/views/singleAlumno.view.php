<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

  <main class="container mt-5 pb-5">
  	<div class="d-flex justify-content-between align-items-center pb-4 border-bottom">
  		<a href="alumnos.php" class="btn btn-4 btn-sm"><i class="bi bi-caret-left-fill me-2"></i>Volver</a>
  		<h3 class="fs-3">Datos del alumno</h3>
  	</div>
		<!-- ////// CAMPOS A RELLENAR ////// -->
		<div class="pt-3 pb-5 mb-5">
			<table class="table bg-white table-borderless table-hover align-middle">
        <tbody>
          <tr>
          	<th>ID</th>
          	<th><?php echo $alumno['id'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>NOMBRE</th>
          	<th><?php echo $alumno['nombre'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>APELLIDOS</th>
          	<th><?php echo $alumno['apellidos'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>Nº COLEGIADO</th>
          	<th><?php echo $alumno['num_colegiado'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>EMAIL</th>
          	<th><?php echo $alumno['email'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>DIRECCIÓN</th>
          	<th><?php echo $alumno['direccion'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>Nº DE CUENTA</th>
          	<th><?php echo $alumno['cuentaBanco'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>FECHA DE REGISTRO</th>
          	<th><?php echo $alumno['fecha'] ?></th>
          	<th>&nbsp;</th>
          </tr>
          <tr>
          	<th>ID CURSO</th>
          	<th><?php echo $alumno['id_curso'] ?></th>
          	<th class="text-end"><a href="#tablaCursos" class="btn btn-sm btn-4 me-2">Ver id<i class="bi bi-caret-down-fill ms-2"></i></a></th>
          </tr>
          <tr>
          	<th>ID ESTADO</th>
          	<th><?php echo $alumno['id_estado'] ?></th>
          	<th class="text-end"><a href="#tablaEstados" class="btn btn-sm btn-4 me-2">Ver id<i class="bi bi-caret-down-fill ms-2"></i></a></th>
          </tr>
        </tbody>
      </table>
      <div class=" container py-5">
      	<!-- ////// TABLA ID CURSOS ////// -->
	      <table class="table table-small table-hover mb-5" id="tablaCursos">
	        <thead class="bg-white">
	          <tr>
	            <th class="col-1">ID</th>
	            <th>CURSO</th>
	          </tr>
	        </thead>
	        <tbody>
	          <?php foreach ($cursos as $curso): ?>
	            <tr>
	              <th class="col-1"><?php echo $curso['id'] ?></th>
	              <th><?php echo $curso['titulo'] ?></th>
	            </tr>
	          <?php endforeach ?>
	        </tbody>
	      </table>
	      <!-- ////// TABLA ID ESTADOS ////// -->
	      <table class="table table-small table-hover" id="tablaEstados">
	        <thead class="bg-white">
	          <tr>
	            <th class="col-1">ID</th>
	            <th>ESTADOS</th>
	          </tr>
	        </thead>
	        <tbody>
	          <?php foreach ($estados as $estado): ?>
	            <tr>
	              <th class="col-1"><?php echo $estado['id'] ?></th>
	              <th><?php echo $estado['estado'] ?></th>
	            </tr>
	          <?php endforeach ?>
	        </tbody>
	      </table>
      </div>
      
		</div>
	</main>

<?php include_once 'templates/footer.php' ?>