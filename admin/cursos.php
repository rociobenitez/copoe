<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $cursos=$recogerArticulos($admin_config['numEntradas'],'cursos');
  $categorias=$recogerArticulos($admin_config['numEntradas'],'categorias');
  $modalidades=$recogerArticulos($admin_config['numEntradas'],'modalidades');
  $totalPaginas=$cantidadPaginas($admin_config['numEntradas'],'cursos');

  require_once 'views/cursos.view.php';
?>