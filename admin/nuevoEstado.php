<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones
$subido=false;    // variable para comprobar más tarde que la imagen se ha subido correctamente

// ESTADO
$estados=$recogerArticulos($admin_config['numEntradas'],'estados');

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
  $estados=$sanear($_POST['estados']);

  // Validar datos:
  if(empty($estados)){
    $errores.='<li>Debes escribir el nombre del estado</li>';
  };

  /* Comprobar que no hay errores; si no los hay, subimos
  los datos del formulario a la base de datos */
  if(empty($errores)){
    $subirEstados($estados);  // Utilizamos la función 'subir archivos'
    $subido=true;  // $subido pasa de false a true
  };

  // Una vez subido el nuevo registro, redirigir al index
  if($subido){
    header('Location:index.php');
  };
};

require_once 'views/nuevoEstado.view.php';

?>