<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['submit'])){
  $id=$sanear($_POST['id']);
  $pregunta=$sanear($_POST['pregunta']);
  $respuesta=$sanear($_POST['respuesta']);

  // Validar datos:
  if(empty($pregunta)){
    $errores.='<li>Debes escribir el título</li>';
  };
  if(empty($respuesta)){
    $errores.='<li>Debes escribir el respuesta</li>';
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarDudas($id,$pregunta,$respuesta);
    header('Location:dudas.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:dudas.php'); // salimos de esa página
  };

  $duda=$obtenerPorId($id,'dudas');
  if(!$duda){
    header('Location:dudas.php');
  };


  require_once 'views/editarDuda.view.php';
};