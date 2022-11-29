<?php include_once 'templates/header.php' ?>
<?php include_once 'templates/cabecera.php' ?>

<!-- //// PANEL DE ADMINISTRACIÓN //// -->
<main class="container pb-5 admin">
  <div class="pb-5 mb-5">
    <!-- ///// CURSOS //// -->
    <div class="table-responsive">
      <h2 class="fs-4 mt-5 mb-3">Administrar 'Cursos'</h2>
      <p>Aquí puedes administrar toda la <em>formación</em> de COPOE</p>
      <!-- ////// BOTÓN 'AÑADIR NUEVO' ////// -->
      <div class="mb-4 text-end">
        <a href="nuevoCurso.php?id=<?php echo $curso['id'] ?>" class="btn btn-1 btn-sm">Añadir nuevo</a>
      </div>
      <!-- ////// TABLA DE CURSOS ////// -->
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
          <?php foreach ($cursos as $curso): ?>
            <tr>
              <th><?php echo $curso['id'] ?></th>
              <th><?php echo $curso['titulo'] ?></th>
              <th><a href="editarCurso.php?id=<?php echo $curso['id'] ?>" class="btn btn-4 btn-sm">Editar</a></th>
              <th><a href="eliminarCurso.php?id=<?php echo $curso['id'] ?>" class="btn btn-4 btn-sm">Eliminar</a></th>
              <th><a href="../singleCurso.php?id=<?php echo $curso['id'] ?>" class="btn btn-4 btn-sm">Ver</a></th>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table> 
      <div class="text-end pt-3 pb-5">
        <?php include_once'paginacion.php' ?>
      </div>   
    </div>  
    </div>
  </div>
</main>

<?php include_once 'templates/footer.php' ?>