<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;
$dudas=$recogerArticulos($admin_config['numRegistros'],'dudas');

$id=$obtenerId();
if(!$id){  // si id no existe
  header('Location:dudas.php'); // salimos de esa página
};

$duda=$obtenerPorId($id,'dudas');
if(!$duda){
  header('Location:dudas.php');
};

require_once 'views/singleDuda.view.php';

?>


