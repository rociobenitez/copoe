<?php session_start();  /* comprobar si la sesión está abierta */

  // Importar las funciones:
  require_once 'admin/functions.php';

  // Si el usuario no ha iniciado sesión, ir a la página de inicio:
  if(!isset($_SESSION['usuario'])){
    header('Location:index.php');
  };

  // Si no hay conexión, aparece 'Error':
  if(!$conexion()){
        die('ERROR EN LA CONEXIÓN');  // interrumpe la ejecución del programa
  };  // se suele utilizar die cuando trabajamos con datos sensibles


  //$asociados=$recogerArticulos($front_config['numAsociados'],'usuarios_asociados');
  $productos=$recogerArticulos($front_config['numProductos'],'productos');

  $usuario=$_SESSION['usuario'];
  $datosUsuario=$obtenerPorUsuario($usuario,'usuarios_asociados');
  $mensaje='';

  // Comprobar que se envía el formulario - Se recogen los datos y se valida:
  if(isset($POST['proceder'])){
    $id=$sanear($POST['id']);
    $total=$sanear($POST['total']);
    $subirCompra($id,$total);
    $mensaje='Tu solicitud ha sido enviada. Te responderemos en la mayor brevedad posible.';
  };

  require_once 'views/carrito.view.php';

 ?>
