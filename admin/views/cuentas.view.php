<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- ////// PANEL DE ADMINISTRACIÓN ////// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- /////// CUENTAS ////// -->
    <div class="table-responsive bg-light">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Cuentas'</h2>
      <p>Aquí puedes administrar las diferentes <em>formas de asociarse</em> a COPOE</p>
      <!-- ////// BOTÓN 'AÑADIR NUEVO' ////// -->
      <div class="mb-4 text-end">
        <a href="nuevaCuenta.php?id=<?php echo $cuenta['id'] ?>" class="btn btn-1 btn-sm">Añadir nueva</a>
      </div>
      <!-- ////// TABLA DE CUENTAS ////// -->
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
          <?php foreach ($cuentas as $cuenta): ?>
            <tr>
              <th><?php echo $cuenta['id'] ?></th>
              <th><?php echo $cuenta['titulo'] ?></th>
              <th><a href="editarCuenta.php?id=<?php echo $cuenta['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarCuenta.php?id=<?php echo $cuenta['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
              <th><a href="singleCuenta.php?id=<?php echo $cuenta['id'] ?>" class="btn btn-4 btn-sm">Ver</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table> 
    </div>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>