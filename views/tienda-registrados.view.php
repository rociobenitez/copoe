<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 bg-white">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container mb-5 pb-3">
  <!-- ////// MENÚ 'MI CUENTA' ////// -->
  <?php include_once 'templates/nav-registrados.php' ?>
  <!-- ////// TIENDA ////// -->
  <div class="py-5 row g-3" id="listaProductos">

    <!-- Aquí se muestran los productos de la tienda,
    usando las función getDatos() (recoge los datos de la 
    BBDD a través de la API) y pintarProductos() --> 

  </div>
</main>

<?php include_once 'templates/footerRegistrados.php' ?>