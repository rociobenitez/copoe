<?php session_start();  /* comprobar si la sesión está abierta */

  // Importar las funciones:
  require_once 'admin/functions.php';

  // Si el usuario no ha iniciado sesión, ir a la página de inicio:
  if(!isset($_SESSION['usuario'])){
    header('Location:index.php');
  };

  $servicios=$recogerArticulos($front_config['numVentajas'],'servicios');

  if(!$servicios){
    header('Location:pagina-registrados.php');
  };

  $usuario=$_SESSION['usuario'];
  $datosUsuario=$obtenerPorUsuario($usuario,'usuarios_asociados');
  $errores='';
  $mensaje='';

  // Comprobar que se envía el formulario - Se recogen los datos y se valida:
  if(isset($_POST['submit'])){
    $id=$sanear($_POST['id']);
    $servicio=$sanear($_POST['servicio']);

    // Validar datos:
    if(empty($servicio)){
      $errores.='<li>Debes releccionar el servicio para poder enviar la solicitud</li>';
    };

    // si todo ha ido bien:
    if(empty($errores)){
      $subirSolicitudServicio($servicio,$id);
      $mensaje='Tu solicitud ha sido enviada. Te responderemos en la mayor brevedad posible.';
    };
  };

  require_once 'views/servicios.view.php';

 ?>