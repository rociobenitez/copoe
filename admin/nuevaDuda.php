<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones
$subido=false;    // variable para comprobar más tarde que la imagen se ha subido correctamente

$dudas=$recogerArticulos($admin_config['numEntradas'],'dudas');

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
  $pregunta=$sanear($_POST['pregunta']);
  $respuesta=$sanear($_POST['respuesta']);

  // Validar datos:
  if(empty($pregunta)){
    $errores.='<li>Debes escribir la pregunta</li>';
  };
  if(empty($respuesta)){
    $errores.='<li>Debes escribir la respuesta</li>';
  };

  /* Comprobar que no hay errores; si no los hay,
  subimos datos del formulario a la base de datos */
  if(empty($errores)){
    $subirDudas($pregunta,$respuesta);  // Utilizamos la función 'subir archivos'
    $subido=true;  // $subido pasa de false a true
  };

  // Una vez subido el nuevo registro, redirigir a la tabla de dudas
  if($subido){
    header('Location:dudas.php');
  };
};

require_once 'views/nuevaDuda.view.php';

 ?>