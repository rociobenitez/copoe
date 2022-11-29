<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $administradores=$recogerArticulos($admin_config['numEntradas'],'usuarios_admin');
  $totalPaginas=$cantidadPaginas($admin_config['numEntradas'],'usuarios_admin');

  if(!$administradores){
    header('Location:index.php');
  };

  require_once 'views/administradores.view.php';
?>