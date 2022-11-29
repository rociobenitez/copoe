<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 bg-white">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container mb-5 pb-3">
  <!-- ////// MENÚ 'MI CUENTA' ////// -->
  <?php include_once 'templates/nav-registrados.php' ?>

  <div class="p-5">
    <h2>¡Hola, <?php echo $datosUsuario['nombre']; ?>!</h2>
    <p>Aquí puedes editar los datos de tu <em>cuenta de usuario.</em></p>
    <div class="p-4 my-5 bg-light">
      <form method="POST" action=" <?php echo htmlspecialchars($_SERVER['PHP_SELF'])  ?> " >
        <!-- ////// DATOS DEL USUARIO ////// -->
        <h6 class="pb-2">Mis datos</h6>
        <div>
          <input type="hidden" name="id" id="id" class="form-control mb-2"
                    value="<?php echo $datosUsuario['id'] ?>">
          <input type="hidden" name="password" id="password" class="form-control mb-2"
                    value="<?php echo $datosUsuario['password'] ?>">
          <input type="hidden" name="cuenta" id="cuenta" class="form-control mb-2"
                    value="<?php echo $datosUsuario['id_cuenta'] ?>">
          <input type="hidden" name="usuario" class="form-control mb-2" 
                    value="<?php echo $datosUsuario['usuario']; ?>">
        </div>
        <div class="row g-2 mb-2">
          <div class="col">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control mb-2" 
                    value="<?php echo $datosUsuario['nombre']; ?>">
          </div>
          <div class="col">
            <label for="apellidos" class="form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control mb-2"
                    value="<?php echo $datosUsuario['apellidos']; ?>">
          </div>
        </div>
        <div class="row g-2 mb-2">
          <div class="col">
            <label for="email" class="form-label">Email</label>
            <input type="text" name="email" class="form-control mb-2" 
                    value="<?php echo $datosUsuario['email']; ?>">
          </div>
        </div>
        <!-- ////// MOSTRAR LOS ERRORES ////// -->
        <h6 class="pb-2 mt-5">Datos de facturación</h6>
        <div class="row g-2 pb-4">
          <div class="col">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" name="direccion" placeholder="Dirección (calle, avenida...) *" class="form-control mb-2"
                    value="<?php echo $datosUsuario['direccion']; ?>">
          </div>
          <div class="col">
            <label for="provincia" class="form-label">Provincia</label>
            <input type="text" name="provincia" placeholder="Provincia *" class="form-control mb-2"
                    value="<?php echo $datosUsuario['provincia']; ?>">
          </div>
        </div>
        <!-- ////// MOSTRAR LOS ERRORES ////// -->
        <?php if(!empty($errores)): ?>
          <div>
            <ul>
              <?php echo $errores ?>
            </ul>
          </div>
        <?php endif ?>
        <!-- ////// BOTÓN DE 'EDITAR' ////// -->
        <div class="d-grid justify-content-md-end">
          <input type="submit" class="btn btn-1 btn-s form-control mt-2" name="submit" value="Guardar">
        </div>
      </form>
    </div>
    <div class="pt-5">
      <h2>Historial de pedidos</h2>
      <p>Estos son los <em>pedidos</em> que has realizado desde que creó su cuenta</p>
      <table class="table table-striped table-hover my-5">
        <thead>
          <tr>
            <th>Referencia del pedido</th>
            <th class="text-center">Fecha</th>
            <th class="text-center">Precio total</th>
            <th class="text-center">Estado</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th>PREMIUM mensual </th>
            <th class="text-center">01/04/2022</th>
            <th class="text-center">18,15€</th>
            <th class="text-center">Cobrado</th>
          </tr>
          <tr>
            <th>KGNJFVNMT</th>
            <th class="text-center">24/03/2022</th>
            <th class="text-center">253,44€</th>
            <th class="text-center">Enviado</th>
          </tr>
          <tr>
            <th>PREMIUM mensual </th>
            <th class="text-center">01/03/2022</th>
            <th class="text-center">18,15€</th>
            <th class="text-center">Cobrado</th>
          </tr>
          <tr>
            <th>PREMIUM mensual </th>
            <th class="text-center">01/02/2022</th>
            <th class="text-center">18,15€</th>
            <th class="text-center">Cobrado</th>
          </tr>
          <tr>
            <th>Referencia del pedido</th>
            <th class="text-center">06/01/2022</th>
            <th class="text-center">371,10€</th>
            <th class="text-center">Enviado</th>
          </tr>
          <tr>
            <th>PREMIUM mensual </th>
            <th class="text-center">01/01/2022</th>
            <th class="text-center">18,15€</th>
            <th class="text-center">Cobrado</th>
          </tr>
          <tr>
            <th>PREMIUM mensual </th>
            <th class="text-center">01/12/2021</th>
            <th class="text-center">18,15€</th>
            <th class="text-center">Cobrado</th>
          </tr>
          <tr>
            <th>Referencia del pedido</th>
            <th class="text-center">14/11/2021</th>
            <th class="text-center">624,98€</th>
            <th class="text-center">Enviado</th>
          </tr>
          <tr>
            <th>PREMIUM mensual </th>
            <th class="text-center">01/11/2022</th>
            <th class="text-center">18,15€</th>
            <th class="text-center">Cobrado</th>
          </tr>
        </tbody>
      </table>
    </div>
    
  </div>
</main>

<?php include_once 'templates/footerRegistrados.php' ?>
