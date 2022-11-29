<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- ////// PANEL DE ADMINISTRACIÓN ////// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- ////// DUDAS ////// -->
    <div class="table-responsive bg-light">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Dudas'</h2>
      <p>Aquí puedes administrar las <em>dudas frecuentes</em> de los usuarios</p>
      <!-- ////// BOTÓN 'AÑADIR NUEVO' ////// -->
      <div class="mb-4 text-end">
        <a href="nuevaDuda.php?id=<?php echo $duda['id'] ?>" class="btn btn-1 btn-sm">Añadir nueva</a>
      </div>
      <!-- ////// TABLA DE ARTÍCULOS ////// -->
      <table class="table table-striped tableAdmin pb-5">
        <thead class="text-white fw-bold">
          <tr>
            <th>ID</th>
            <th>TITULO</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dudas as $duda): ?>
            <tr>
              <th><?php echo $duda['id'] ?></th>
              <th><?php echo $duda['pregunta'] ?></th>
              <th><a href="editarDuda.php?id=<?php echo $duda['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarDuda.php?id=<?php echo $duda['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
              <th><a href="singleDuda.php?id=<?php echo $duda['id'] ?>" class="btn btn-4 btn-sm">Ver</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table> 
    </div>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>