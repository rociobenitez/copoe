<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones
$subido=false;    // variable para comprobar más tarde que la imagen se ha subido correctamente

$cuentas=$recogerArticulos($admin_config['numEntradas'],'cuentas');

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
  $titulo=$sanear($_POST['titulo']);
  $precio=$sanear($_POST['precio']);
  $descripcion=$sanear($_POST['descripcion']);

  // Validar datos:
  if(empty($titulo)){
    $errores.='<li>Debes escribir el título</li>';
  };
  if(empty($precio)){
    $errores.='<li>Debes escribir el precio</li>';
  };
  if(empty($descripcion)){
    $errores.='<li>Debes escribir el descripción</li>';
  };

  /* Comprobar que no hay errores; si no los hay,
  subimos los datos a la base de datos */
  if(empty($errores)){
    $subirCuentas($titulo,$precio,$descripcion);  
    $subido=true;  // $subido pasa de false a true
  };

  // Una vez subido el nuevo registro, redirigir a la tabla de cuentas
  if($subido){
    header('Location:cuentas.php');
  };
};

require_once 'views/nuevaCuenta.view.php';

 ?>