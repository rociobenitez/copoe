<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $dudas=$recogerArticulos($admin_config['numRegistros'],'dudas');

  require_once 'views/dudas.view.php';

?>