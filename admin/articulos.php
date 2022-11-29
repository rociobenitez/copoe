<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $articulos=$recogerArticulos($admin_config['numEntradas'],'articulos');
  $categorias=$recogerArticulos($admin_config['numEntradas'],'categorias');
  $totalPaginas=$cantidadPaginas($admin_config['numEntradas'],'articulos');

  require_once 'views/articulos.view.php';
?>