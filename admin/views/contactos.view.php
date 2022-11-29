<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- //// CONTACTOS //// -->
    <div class="table-responsive bg-light">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Contactos'</h2>
      <p>Aquí puedes administrar los usuarios que han rellenado el <em>formulario de contacto</em></p>
      <div class="mb-4 text-end">
        <a href="nuevoContacto.php" class="btn btn-1 btn-sm">Añadir nuevo</a>
      </div>
      <!-- ////// BUSCADOR ////// -->
      <form action="contactos.php" method="GET" class="row g-3 mt-3">
        <div class="col-auto ms-auto">
          <input type="search" name="busqueda" placeholder="Busca por nombre o apellidos" class="form-control form-control-sm">
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-4 btn-sm"><i class="bi bi-search"></i></button>
        <a href="contactos.php" class="btn btn-4 btn-sm">Ver todos</a>
        </div>
      </form><!-- final del buscador -->

      <!-- ////// TABLA CONTACTOS ////// -->
      <p class="text-end mt-2"><?php echo $mensaje;?></p>
      <table class="table table-striped tableAdmin mb-3">
        <thead class="text-white fw-bold">
          <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>EMAIL</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($contactos as $contacto): ?>
            <tr>
              <th><?php echo $contacto['id'] ?></th>
              <th><?php echo ucfirst($contacto['nombre']) ?></th>  <!-- Primera letra mayúscula -->
              <th><?php echo $contacto['email'] ?></th>
              <th><a href="singleContacto.php?id=<?php echo $contacto['id'] ?>" class="btn btn-4 btn-sm">Ver</a></th>
              <th><a href="editarContacto.php?id=<?php echo $contacto['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarContacto.php?id=<?php echo $contacto['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table><!-- final de la tabla contactos -->   
    </div>

  </div>
</main>

<?php include_once 'templates/footer.php' ?>