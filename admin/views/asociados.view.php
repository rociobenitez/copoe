<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- //// ASOCIADOS //// -->
    <div class="table-responsive bg-light">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Asociados'</h2>
      <p>Aquí puedes administrar los usuarios que se han <em>asociado a COPOE</em></p>
      <div class="mb-4 text-end">
        <a href="nuevoAsociado.php" class="btn btn-1 btn-sm">Añadir nuevo</a>
      </div>
      <!-- ////// TABLA Nº ASOCIADOS ////// -->
      <table class="table table-small mb-3 text-center ms-auto" id="tablaAsociados">
        <thead class="fw-bold">
          <tr>
            <th>&nbsp;</th>
            <th>TOTAL</th>
            <th>ESTUDIANTES</th>
            <th>BASICA</th>
            <th>PREMIUM</th>
          </tr>
        </thead>
        <tbody class="bg-white">
          <tr>
            <th>Asociados</th>
            <th><?php echo $totalAsociados ?></th>
            <th><?php echo $totalEstudiantes ?></th>
            <th><?php echo $totalBasica ?></th>
            <th><?php echo $totalPremium ?></th>
          </tr>  
        </tbody>
      </table> <!-- FINAL RECUENTO TABLA ASOCIADOS -->       
    </div>
    <!-- ////// BUSCADOR ////// -->
    <form action="asociados.php" method="GET" class="row g-3 mt-3">
      <div class="col-auto ms-auto">
        <input type="search" name="busqueda" placeholder="Busca por nombre o apellidos" class="form-control form-control-sm">
      </div>
      <div class="col-auto">
        <button type="submit" class="btn btn-4 btn-sm"><i class="bi bi-search"></i></button>
        <a href="asociados.php" class="btn btn-4 btn-sm">Ver todos</a>
      </div>
    </form><!-- FINAL BUSCADOR -->
            
    <!-- ////// TABLA ASOCIADOS ////// -->
    <p class="text-end mt-2"><?php echo $mensaje;?></p>
    <table class="table table-striped tableAdmin mb-3">
      <thead class="text-white fw-bold">
        <tr>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>APELLIDOS</th>
          <th class="text-center">ID CUENTA</th>
          <th class="text-center">&nbsp;</th>
          <th class="text-center">&nbsp;</th>
          <th class="text-center">&nbsp;</th>
        </tr>
      </thead>
      <tbody id="cajaAsociados">
        <?php foreach ($asociados as $asociado) : ?>
          <tr>
            <th><?php echo $asociado['id'] ?></th>
            <th><?php echo $asociado['nombre'] ?></th>
            <th><?php echo $asociado['apellidos'] ?></th>
            <th class="text-center"><?php echo $asociado['id_cuenta'] ?></th>
            <th class="text-center"><a href="singleAsociado.php?id=<?php echo $asociado['id'] ?>" class="btn btn-4 btn-sm">Ver</a></th>
            <th class="text-center"><a href="editarAsociado.php?id=<?php echo $asociado['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
            <th class="text-center"><a href="eliminarAsociado.php?id=<?php echo $asociado['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
          </tr>  
        <?php endforeach; ?>
      </tbody>
    </table><!-- FINAL TABLA ASOCIADOS -->
  </div>
</main>

<?php include_once 'templates/footer.php' ?>