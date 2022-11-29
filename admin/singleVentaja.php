<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;
$ventajas=$recogerArticulos($admin_config['numRegistros'],'ventajas');
$id=$obtenerId();

if(!$id){  // si id no existe
  header('Location:ventajas.php'); // salimos de esa página
};

$ventaja=$obtenerPorId($id,'ventajas');

if(!$ventaja){
  header('Location:ventajas.php');
};

require_once 'views/singleVentaja.view.php';

?>


