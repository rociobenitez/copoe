 
 <header class="container-fluid bg-transparent" id="navbarSecondary"> 
  <div class="container-fluid pt-2">

    <!-- ////// MENÚ - FILA 1 - INFORMACIÓN DE CONTACTO Y BOTÓN CARRITO ////// -->
    <div id="contact-links" class="container-fluid d-flex flex-wrap justify-content-end">
      <ul class="nav align-items-center position-relative">

        <!-- Si no está iniciada la sesión solo se muestran
        los enlaces de contacto en la parte superior derecha: -->
        <?php if(!isset($_SESSION['usuario'])): ?> 

        <!-- ////// ENLACES CONTACTO ////// -->
        <!-- <li class="nav-item"><a href="tel:000000000" class="nav-link link-contact px-2">
            <i class="bi bi-telephone-fill mx-1"></i> 000 000 000</a></li>
        <li class="nav-item"><a href="mailto:info@copoe.es" class="nav-link link-contact ps-2 me-4">
            <i class="bi bi-envelope-fill mx-1"></i> info@copoe.es</a></li> -->
        <?php endif ?> 

        <!-- Se muestran los enlaces junto al icono
        del carrito si está iniciada la sesión --> 
        <?php if(isset($_SESSION['usuario'])): ?>

        <!-- ////// ENLACES CONTACTO ////// -->
        <li class="nav-item">
          <a href="tel:000000000"
             class="nav-link link-contact px-2">
            <i class="bi bi-telephone-fill mx-1"></i> 000 000 000</a>
        </li>
        <li class="nav-item me-5">
          <a href="mailto:info@copoe.es"
             class="nav-link link-contact ps-2 me-4">
            <i class="bi bi-envelope-fill mx-1"></i> info@copoe.es</a>
        </li>

        <!-- ////// CARRITO / CESTA DE LA COMPRA ////// -->       
        <li id="liCarrito"
            class="nav-item position-absolute end-0">
          <p>
            <i class="bi bi-bag-fill btn btn-5 px-3 mt-3 me-2 text-center" id="carritoIcon"></i>
          </p>
          <div id="carrito" class="d-none bg-light p-4 mt-5 position-absolute top-0 end-0">

            <!-- ////// TABLA CARRITO ////// -->
            <table id="tablaCarrito" class="table text-center">
              <thead>
                <tr>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody>
               <!-- // PRODUCTOS DEL CARRITO // -->
              </tbody>
              <a href='#'
                 id='btnVaciarCarrito'
                 class="btn btn-4 btn-s">
                Vaciar Carrito
              </a>
              <a href='carrito.php'
                 id='btnComprar'
                 class="btn btn-1 btn-s ms-2">
                Comprar
              </a>
            </table>
          </div>
        </li>
        <?php endif ?>

      </ul>
    </div>

    <!-- /// MENU - FILA 2 - MENÚ PRINCIPAL /// -->
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid">

        <!-- // LOGOTIPO COPOE // -->
        <a class="navbar-brand" href="index.php">
          <img
            src="img/logotipo-copoe-horizontal-min.png"
            alt="logotipo COPOE"
            id="logoHeader">
        </a>
        <button class="navbar-toggler btn-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

          <!-- // ENLACES DEL MENÚ // -->
          <ul class="navbar-nav ms-auto my-auto ">
            <li class="nav-item mx-1" id="tab-index">
              <a class="nav-link" href="index.php">
                Inicio
              </a>
            </li>
            <li class="nav-item mx-1" id="tab-ventajas">
              <a class="nav-link" href="ventajas.php">
                Ventajas
              </a>
            </li>
            <li class="nav-item mx-1" id="tab-cursos">
              <a class="nav-link" href="cursos.php">
                Cursos
              </a>
            </li>
            <li class="nav-item mx-1" id="tab-blog">
              <a class="nav-link" href="blog.php">
                Blog
              </a>
            </li>
            <li class="nav-item ms-1 me-3" id="tab-contacto">
              <a class="nav-link" href="contacto.php">
                Contacto
              </a>
            </li>


            <!-- /// BOTÓN MI CUENTA y CERRAR SESIÓN /// -->
            <!-- Se mostrarán si está iniciada la sesión -->

            <?php if(isset($_SESSION['usuario'])): ?>
            <div class="d-flex mt-lg-0 mt-2">
              <li class="nav-item my-lg-auto mt-sm-2">
                <a href="pagina-registrados.php"
                   role= "button"
                   class="btn btn-s btn-3 me-2 my-auto">
                  <i class="bi bi-person-fill"></i>
                </a>
              </li>
              <li class="nav-item my-lg-auto mt-sm-2">
                <a href="cerrarSesion.php"
                   role="button"
                   class="btn btn-s btn-1 my-auto">
                  <i class="bi bi-box-arrow-right me-2"></i>
                  Cerrar sesión
                </a>
              </li>
            </div>
            <?php endif ?>

            <!-- /// BOTÓN INICIAR SESIÓN y ASOCIARME /// -->
            <!-- Se mostrarán si NO está iniciada la sesión -->

            <?php if(!isset($_SESSION['usuario'])): ?>
            <div class="d-flex mt-lg-0 mt-2" >
              <li class="nav-item">
                <a href="login.php"
                   class="btn btn-s btn-3 me-2 my-auto"
                   role="button">
                  <i class="bi bi-person-fill"></i>
                  Iniciar sesión
                </a>
              </li>
              <li class="nav-item">
                <a href="registro.php"
                   class="btn btn-s btn-5">
                  Asociarme
                </a>
              </li>
            </div>
            <?php endif ?>

          </ul>
        </div>
      </nav>  
    </div>
  </div> 
</header>


