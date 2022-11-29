<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- ///// CATEGORIAS //// -->
    <div class="table-responsive">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Categorías'</h2>
      <p>Aquí puedes administrar las <em>categorías</em> para clasificar el contenido de la web</p>
      <!-- ////// BOTÓN 'AÑADIR NUEVO' ////// -->
      <div class="mb-4 text-end">
        <a href="nuevaCategoria.php?id=<?php echo $categoria['id'] ?>" class="btn btn-1 btn-sm">Añadir nueva</a>
      </div>
      <!-- ////// TABLA DE CATEGORIAS ////// -->
      <table class="table table-striped tableAdmin pb-5">
        <thead class="text-white fw-bold">
          <tr>
            <th>ID</th>
            <th>TITULO</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($categorias as $categoria): ?>
            <tr>
              <th><?php echo $categoria['id'] ?></th>
              <th><?php echo $categoria['categoria'] ?></th>
              <th><a href="editarCategoria.php?id=<?php echo $categoria['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarCategoria.php?id=<?php echo $categoria['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>    
    </div>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>