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

  // Obtener id del Asociado:
  $id=$obtenerId();

  $asociado=$obtenerPorId($id,'usuarios_asociados');
  $usuarios_asociados=$recogerArticulos($front_config['numAsociados'],'usuarios_asociados');
  $productos=$recogerArticulos($front_config['numProductos'],'productos');

  require_once 'views/tienda-registrados.view.php';

 ?>