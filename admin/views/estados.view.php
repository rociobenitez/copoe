<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- ///// ESTADOS //// -->
    <div class="table-responsive">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Estados'</h2>
      <p>Aquí puedes administrar los <em>estados</em> de los cursos</p>
      <!-- ////// BOTÓN 'AÑADIR NUEVO' ////// -->
      <div class="mb-4 text-end">
        <a href="nuevoEstado.php?id=<?php echo $estado['id'] ?>" class="btn btn-1 btn-sm">Añadir nuevo</a>
      </div>
      <!-- ////// TABLA DE ESTADOS ////// -->
      <table class="table table-striped tableAdmin pb-5">
        <thead class="text-white fw-bold">
          <tr>
            <th class="col-1">ID</th>
            <th>TITULO</th>
            <th class="col-1">&nbsp;</th>
            <th class="col-1">&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($estados as $estado): ?>
            <tr>
              <th><?php echo $estado['id'] ?></th>
              <th><?php echo $estado['estado'] ?></th>
              <th><a href="editarEstado.php?id=<?php echo $estado['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarEstado.php?id=<?php echo $estado['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>  
    </div>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>