<?php session_start();

  // Importar las funciones:
  require_once 'admin/functions.php';

  $productos=$recogerArticulos($front_config['numProductos'],'productos');
  
  require_once 'views/inscripcion.view.php';

?>