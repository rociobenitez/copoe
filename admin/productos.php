<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $productos=$recogerArticulos($admin_config['numEntradas'],'productos');
  $totalPaginas=$cantidadPaginas($admin_config['numEntradas'],'productos');

  require_once 'views/productos.view.php';

?>



