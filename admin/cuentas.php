<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $cuentas=$recogerArticulos($admin_config['numEntradas'],'cuentas');

  require_once 'views/cuentas.view.php';
?>