<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- ///// ARTÍCULOS DEL BLOG //// -->
    <div class="table-responsive">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Artículos'</h2>
      <p>Aquí puedes administrar los <em>artículos</em> que aparecen en el <em>blog</em></p>
      <div class="mb-4 text-end">
        <a href="nuevoArticulo.php" class="btn btn-1 btn-sm">Añadir nuevo</a>
      </div>
      <!-- TABLA DE ARTÍCULOS -->
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
          <?php foreach ($articulos as $articulo): ?>
            <tr>
              <th><?php echo $articulo['id'] ?></th>
              <th><?php echo $articulo['titulo'] ?></th>
              <th><a href="editarArticulo.php?id=<?php echo $articulo['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarArticulo.php?id=<?php echo $articulo['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
              <th><a href="../singleArticulo.php?id=<?php echo $articulo['id'] ?>" class="btn btn-4 btn-sm">Ver</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table> 
      <div class="text-end pt-3 pb-5">
        <?php include_once'paginacion.php' ?>
      </div>   
    </div>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>