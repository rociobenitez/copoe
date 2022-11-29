 <header class="container-fluid bg-light" id="navbarSecondary"> 
  <div class="container mt-2">
    <div class="d-flex mt-4 justify-content-between">
      <div class="d-flex">
        <!-- LOGOTIPO COPOE -->
        <a href="index.php" class="navbar-brand"><img src="../img/favicon.png" alt="logo COPOE" id="logoAdmin"></a>
      </div>
      <div>
        <h1 class="fs-2 text-end">PANEL DE ADMINISTRACIÓN</h1>
      </div>
    </div>
    <!-- MENÚ DE NAVEGACIÓN -->
    <nav class="navbar navbar-expand-xl navbar-light rounded bg-transparent">
      <div class="container-fluid px-0">
        <!-- CERRAR SESIÓN -->
        <a href="cerrarSesion.php" class="btn btn-sm btn-5"><i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión</a>
        <!-- ICONO NAVBAR-TOGGLER // COLLAPSE -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="productos.php">Productos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="articulos.php">Artículos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="categorias.php">Categorías</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="cursos.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Cursos</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="cursos.php">Cursos</a></li>
                <li><a class="dropdown-item" href="alumnos.php">Alumnos</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="estados.php">Estados</a></li>
                <li><a class="dropdown-item" href="modalidades.php">Modalidades</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cuentas.php">Cuentas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ventajas.php">Ventajas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dudas.php">Dudas</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="asociados.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Usuarios</a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="administradores.php">Administradores</a></li>
                <li><a class="dropdown-item" href="asociados.php">Asociados</a></li>
                <li><a class="dropdown-item" href="contactos.php">Contactos</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- final div -->
    </nav><!-- final nav -->
  </div> <!-- final del div container padre -->

</header>