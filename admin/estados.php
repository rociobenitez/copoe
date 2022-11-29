<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $estados=$recogerArticulos($admin_config['numRegistros'],'estados');

  require_once 'views/estados.view.php';
?>