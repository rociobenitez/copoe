<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- ///// MODALIDADES //// -->
    <div class="table-responsive" id="articulos">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Modalidades'</h2>
      <p>Aquí puedes administrar las <em>modalidades</em> de los cursos</p>
      <!-- ////// BOTÓN 'AÑADIR NUEVO' ////// -->
      <div class="mb-4 text-end">
        <a href="nuevaModalidad.php?id=<?php echo $modalidad['id'] ?>" class="btn btn-1 btn-sm">Añadir nueva</a>
      </div>
      <!-- ////// TABLA DE MODALIDADES ////// -->
      <table class="table table-striped tableAdmin pb-5">
        <thead class="text-white fw-bold">
          <tr>
            <th  class="col-1">ID</th>
            <th>TITULO</th>
            <th class="col-1">&nbsp;</th>
            <th class="col-1">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($modalidades as $modalidad): ?>
            <tr>
              <th><?php echo $modalidad['id'] ?></th>
              <th><?php echo $modalidad['modalidad'] ?></th>
              <th><a href="editarModalidad.php?id=<?php echo $modalidad['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarModalidad.php?id=<?php echo $modalidad['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table> 
    </div>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>