<div class="container-fluid py-5" id="cajaContacto">
  <div class="container py-5">
    <h2 class="my-5 text-light">¿Quieres contactar con nosotros?</h2>
    <p class="text-light">Te responderemos en la mayor brevedad posible</p>

    <!-- /// FORMULARIO DE CONTACTO /// -->
    <div>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" name="formulario" class="form py-2" id="contactForm">
        <div class="form-group">
          <!-- /// CAMPOS FORMULARIO /// -->
          <div class="row g-3">
            <div class="col-sm-6">
              <input type="text" id="nombre" name="nombre" placeholder="Nombre" class="form-control" 
                      value="<?php if (!empty($errores) && isset($_POST['enviar'])) echo $nombre?>">
              <input type="email" id="email" name="email" placeholder="Email" class="form-control my-2" 
                      value="<?php if (!empty($errores) && isset($_POST['enviar'])) echo $email?>">
              <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" class="form-control" 
                      value="<?php if (!empty($errores) && isset($_POST['enviar'])) echo $telefono?>">
            </div>
            <div class="col-sm-6">
              <textarea name="descripcion" id="descripcion" class="form-control h-100" placeholder="¿En qué podemos ayudarte?"><?php if (!empty($errores) && isset($_POST['enviar'])) echo $descripcion?></textarea>
              <label for="floatingTextarea"></label>
            </div>
          </div>
          <!-- /// POLÍTICA PRIVACIDAD /// -->
          <div class="col-12 my-4">
            <input type="checkbox" id="gridCheck" class="form-check-input">
            <label for="gridCheck" class="form-check-label text-light">He leido y acepto las políticas de privacidad</label>
          </div>

          <!-- /// MOSTRAR ERRORES /// -->
          <?php if(!empty($errores)): ?>
            <ul>
              <?php echo $errores ?>
            </ul>
          <?php endif ?>

          <!-- /// COMPROBAR EL ENVÍO DEL FORMULARIO /// -->
          <?php if (isset($enviado) && $enviado==true): ?>
            <div class="mb-3">
              <p>El formulario se envió correctamente</p>
            </div>
          <?php elseif (isset($enviado) && $enviado==false): ?>
            <div class="mb-3">
              <p>Lo sentimos ocurrió un error al enviar el formulario</p>
            </div>
          <?php endif ?>

          <!-- /// BOTÓN ENVIAR FORMULARIO /// -->
          <div class="d-grid d-md-flex justify-content-md-end">
            <input type="submit" class="btn btn-3 btn-s" name="enviar">
          </div>
        </div><!-- final del div form-group -->
      </form><!-- final del formulario -->
    </div><!-- final div formulario -->
  </div><!-- final container -->
</div><!-- final container-fluid padre -->
