<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $categorias=$recogerArticulos($admin_config['numCategorias'],'categorias');
  $totalPaginas=$cantidadPaginas($admin_config['numCategorias'],'categorias');

  require_once 'views/categorias.view.php';
?>