<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- //// ADMINISTRADORES //// -->
    <div class="table-responsive">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Administradores'</h2>
      <p>Aquí puedes administrar los usuarios con el <em>rol administrador</em></p>
      <!-- ////// BOTÓN 'AÑADIR NUEVO' ////// -->
      <div class="mb-4 text-end">
        <a href="nuevoAdministrador.php?id=<?php echo $administrador['id'] ?>" class="btn btn-1 btn-sm">Añadir nuevo</a>
      </div>
      <!-- TABLA ADMINISTRADORES -->
      <table class="table table-striped tableAdmin mb-3">
        <thead class="text-white fw-bold">
          <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>CONTRASEÑA</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($administradores as $administrador): ?>
            <tr>
              <th><?php echo $administrador['id'] ?></th>
              <th><?php echo $administrador['usuario'] ?></th>
              <th><?php echo $administrador['password'] ?></th>
              <th><a href="editarAdministrador.php?id=<?php echo $administrador['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarAdministrador.php?id=<?php echo $administrador['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>   
    </div>

  </div>
</main>

<?php include_once 'templates/footer.php' ?>