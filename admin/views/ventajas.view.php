<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- ///// VENTAJAS //// -->
    <div class="table-responsive bg-light">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Ventajas'</h2>
      <p>Aquí puedes administrar las <em>ventajas</em> de ser asociado de COPOE</p>
      <!-- ////// BOTÓN 'AÑADIR NUEVO' ////// -->
      <div class="mb-4 text-end">
        <a href="nuevaVentaja.php?id=<?php echo $ventaja['id'] ?>" class="btn btn-1 btn-sm">Añadir nueva</a>
      </div>
      <!-- ////// TABLA DE VENTAJAS ////// -->
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
          <?php foreach ($ventajas as $ventaja): ?>
            <tr>
              <th><?php echo $ventaja['id'] ?></th>
              <th><?php echo $ventaja['titulo'] ?></th>
              <th><a href="editarVentaja.php?id=<?php echo $ventaja['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarVentaja.php?id=<?php echo $ventaja['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
              <th><a href="singleVentaja.php?id=<?php echo $ventaja['id'] ?>" class="btn btn-4 btn-sm">Ver</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>