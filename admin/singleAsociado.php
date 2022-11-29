<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$cuentas=$recogerArticulos($admin_config['numRegistros'],'cuentas');
$errores='';
$subido=false;

$id=$obtenerId();

if(!$id){  // si id no existe
  header('Location:asociados.php'); // salimos de esa página
};

$asociado=$obtenerPorId($id,'usuarios_asociados');

if(!$asociado){
  header('Location:asociados.php');
};

require_once 'views/singleAsociado.view.php';

?>


