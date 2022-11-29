<section class="container-fluid bg-light py-5" id="bannerPremium">
  <div class="container mt-5 col-10 justify-content-start">
    <h3 class="text-light">¿Aún no eres PREMIUM?</h3>
    <p class="text-light my-3 fs-6">Recuerda que si te suscribes a la <b>Cuenta PREMIUM</b> tendrás acceso a todos los cursos online y además podrás disfrutar de todo el contenido premium de COPOE, especialmente nuestra tienda online con descuentos especiales.</p>
    <div class="d-grid gap-3 d-md-flex justify-content-md-start">
      <!-- Si el usuario está logueado, no visualizar el botón que redirecciona a la página de registro -->
      <?php if(!isset($_SESSION['usuario'])): ?> 
        <a href="registro.php" class="btn btn-1 btn-s my-2">Quiero ser PREMIUM</a>
      <?php endif ?>
      <a href="login.php" class="btn btn-2 btn-s my-2">Acceder al Área Privada</a>      
    </div>
  </div>
</section>