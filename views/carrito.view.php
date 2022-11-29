<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 bg-white">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

  <main class="container pb-3 mb-5">
    <!-- ////// MENÚ 'MI CUENTA' ////// -->
    <?php include_once 'templates/nav-registrados.php' ?>

		<!-- ////// TABLA CARRITO ////// -->
		<div class="py-5 mb-5">
			<table class="table bg-white table-borderless align-middle text-center tableAdmin" id="tablaCarrito">
        <thead>
          <tr>
          	<th>IMAGEN</th>
          	<th>NOMBRE</th>
          	<th>PRECIO</th>
          	<th>CANTIDAD</th>
            <th>SUBTOTAL</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody id="cuerpoTablaComprar">
          	<!-- PRODUCTOS DEL CARRITO -->
        </tbody>
      </table><!-- final de la tabla -->
      <form method="POST" action="carrito.php" >
        <!-- se manda el id del usuario -->
        <input type="hidden" name="id" id="id" class="form-control mb-2" value="<?php echo $datosUsuario['id'] ?>">
        <div class="text-end mx-5">
          <div>TOTAL: <span id="cajaTotal"></span></div>
        </div>
        <div class="text-end">
          <button type="submit" class="btn btn-s btn-1 my-4" name="proceder">Finalizar compra</button>
        </div>
      </form>
      <!-- ////// MOSTRAR MENSAJE ////// -->
      <p><em><?php echo $mensaje ?></em></p>
		</div>
	</main>

<?php include_once 'templates/footerCarrito.php' ?>