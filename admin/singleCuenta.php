<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;

$cuentas=$recogerArticulos($admin_config['numRegistros'],'cuentas');

$id=$obtenerId();

if(!$id){  // si id no existe
  header('Location:cuentas.php'); // salimos de esa página
};

$cuenta=$obtenerPorId($id,'cuentas');

if(!$cuenta){
  header('Location:cuentas.php');
};

require_once 'views/singleCuenta.view.php';

?>


