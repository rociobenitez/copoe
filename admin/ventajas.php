<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $ventajas=$recogerArticulos($admin_config['numRegistros'],'ventajas');

  require_once 'views/ventajas.view.php';

?>