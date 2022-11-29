<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- ////// PANEL DE ADMINISTRACIÓN ////// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- ////// ALUMNOS ////// -->
    <div class="table-responsive">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Alumnos'</h2>
      <p >Aquí puedes administrar los <em>alumnos</em> que se inscriben a los cursos de COPOE</p>
      <p class="pb-3 fw-bold">Total: <?php echo $totalAlumnos ?> Alumnos</p>
      <div class="mb-4 text-end">
        <a href="nuevoAlumno.php" class="btn btn-1 btn-sm">Añadir nuevo</a>
      </div>
      <!-- ////// BUSCADOR ////// -->
      <form action="alumnos.php" method="GET" class="row g-3">
        <div class="col-auto ms-auto">
          <input type="search" name="busqueda" placeholder="Busca por nombre o apellidos" class="form-control form-control-sm">
        </div>
        
        <div class="col-auto">
          <button type="submit" class="btn btn-4 btn-sm"><i class="bi bi-search"></i></button>
        <a href="alumnos.php" class="btn btn-4 btn-sm">Ver todos</a>
        </div>
        
      </form>
      <!-- ////// TABLA ALUMNOS ////// -->
      <p><?php echo $mensaje;?></p>
      <table class="table table-striped tableAdmin mb-3">
        <thead class="text-white fw-bold">
          <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>APELLIDOS</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($alumnos as $alumno): ?>
            <tr>
              <th><?php echo $alumno['id'] ?></th>
              <th><?php echo $alumno['nombre'] ?></th>
              <th><?php echo $alumno['apellidos'] ?></th>
              <th><a href="editarAlumno.php?id=<?php echo $alumno['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarAlumno.php?id=<?php echo $alumno['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
              <th><a href="singleAlumno.php?id=<?php echo $alumno['id'] ?>" class="btn btn-4 btn-sm">Ver</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>