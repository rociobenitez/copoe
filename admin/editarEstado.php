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
  $titulo=$sanear($_POST['estado']);

  // Validar datos:
  if(empty($titulo)){
    $errores.='<li>Debes escribir el nombre del estado</li>';
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarEstados($id,$titulo);
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:index.php'); // salimos de esa página
  };

  $estado=$obtenerPorId($id,'estados');

  if(!$estado){
    header('Location:index.php');
  };

require_once 'views/editarEstado.view.php';
};