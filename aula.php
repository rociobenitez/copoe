<?php session_start();

  // Importar las funciones:
  require_once 'admin/functions.php';

  // Se comprueba que hay conexión. Si no hay conexión, aparece 'Error':
  if(!$conexion()){
    die('ERROR EN LA CONEXIÓN');
  };
  
  $productos=$recogerArticulos($front_config['numProductos'],'productos');

  require_once 'views/aula.view.php';

?>