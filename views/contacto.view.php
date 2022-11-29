<?php include_once 'templates/header.php' ?>
<body class="container-fluid px-0 bg-light">
<?php include_once 'templates/cabeceraSecundaria.php' ?>

<main class="container-fluid p-0">
  <div class="container-fluid py-5">
    <div class="container pb-5">
      <h2 class="mt-5">¿Quieres contactar con nosotros?</h2>
      <p class="text-light">Te responderemos en la mayor brevedad posible</p>

      <!-- ////// FORMULARIO DE CONTACTO ////// -->
      <div>
        <form
          action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>"
          method="POST"
          class="form pb-2"
          id="contactForm">

          <div class="form-group">

            <!-- ////// CAMPOS FORMULARIO ////// -->
            <div class="row g-3">
              <div class="col-sm-6">
                <input
                  type="text"
                  name="nombre"
                  placeholder="Nombre"
                  class="form-control"  
                  value="<?php if(isset($_POST['enviar']) && !empty($nombre)) echo $nombre ?>">
                <input
                  type="email"
                  name="email"
                  class="form-control my-2"
                  placeholder="Email"  
                  value="<?php if(isset($_POST['enviar']) && !empty($email))echo $email ?>">
                <input
                  type="tel"
                  name="telefono"
                  class="form-control"
                  placeholder="Teléfono" 
                  value="<?php if(isset($_POST['enviar']) && !empty($telefono))echo $telefono ?>">
              </div>
              <div class="col-sm-6">
                <textarea
                  name="descripcion"
                  class="form-control h-100"
                  placeholder="¿En qué podemos ayudarte?">
                  <?php if(isset($_POST['enviar']) && !empty($descripcion))echo $descripcion ?>
                </textarea>
                <label for="floatingTextarea"></label>
              </div>
            </div>

            <!-- ////// POLÍTICA PRIVACIDAD ////// -->

            <div class="col-12 my-4">
              <input
                type="checkbox"
                id="gridCheck"
                class="form-check-input">
              <label
                for="gridCheck"
                class="form-check-label">
                He leido y acepto las políticas de privacidad
              </label>
            </div>
            
            <!-- ////// MOSTRAR ERRORES ////// -->

            <?php if(!empty($errores)): ?>
              <div>
                <ul>
                  <?php echo $errores ?>
                </ul>
              </div>
            <?php endif ?>

            <!-- ////// COMPROBAR EL ENVÍO DEL FORMULARIO ////// -->

            <?php if (isset($enviado) && $enviado==true): ?>
              <div class="mb-3">
                <p>El formulario se envió correctamente</p>
              </div>
            <?php elseif (isset($enviado) && $enviado==false): ?>
              <div class="mb-3">
                <p>Lo sentimos ocurrió un error al enviar el formulario</p>
              </div>
            <?php endif ?>

            <!-- ////// BOTÓN ENVIAR FORMULARIO ////// -->

            <div class="d-grid d-md-flex justify-content-md-end">
              <input
                type="submit"
                class="btn btn-3 btn-s"
                name="enviar">
            </div>
          </div>
        </form><!-- final del formulario -->

      </div>
    </div>
  </div>

  <?php include_once 'templates/bannerPremium.php' ?>

</main>

<?php include_once 'templates/footer.php' ?>