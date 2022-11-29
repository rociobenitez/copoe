<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $modalidades=$recogerArticulos($admin_config['numEntradas'],'modalidades');
  $totalPaginas=$cantidadPaginas($admin_config['numEntradas'],'modalidades');

  require_once 'views/modalidades.view.php';
?>