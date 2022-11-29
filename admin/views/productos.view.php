<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- //// PRODUCTOS DE LA TIENDA //// -->
    <div class="table-responsive bg-light">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Productos'</h2>
      <p>Aquí puedes administrar los <em>productos</em> que aparecen en la <em>tienda online</em> del Área Privada</p>
      <div class="mb-4 text-end">
        <a href="nuevoProducto.php" class="btn btn-1 btn-sm">Añadir nuevo</a>
      </div>
      <!-- ////// TABLA DE VENTAJAS ////// -->
      <table class="table table-striped tableAdmin mb-3">
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
          <?php foreach ($productos as $producto): ?>
            <tr>
              <th><?php echo $producto['id'] ?></th>
              <th><?php echo $producto['nombre'] ?></th>
              <th><a href="editarProducto.php?id=<?php echo $producto['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarProducto.php?id=<?php echo $producto['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
              <th><a href="../singleProducto.php?id=<?php echo $producto['id'] ?>" class="btn btn-4 btn-sm">Ver</a></th>
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