<?php session_start();

  // Importar las funciones:
  require_once 'admin/functions.php';

  // Se comprueba que hay conexión. Si no hay conexión, aparece 'Error':
  if(!$conexion()){
    die('ERROR EN LA CONEXIÓN');
  };

  $articulos=$recogerArticulos($front_config['numEntradas'],'articulos');

  if(!$articulos){
    header('Location:index.php');
  };

  $totalPaginas=$cantidadPaginas($admin_config['numEntradas'],'articulos');

  require_once 'views/blog.view.php';

?>