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
  $titulo=$sanear($_POST['modalidad']);

  // Validar datos:
  if(empty($titulo)){
    $errores.='<li>Debes escribir la modalidad</li>';
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarModalidades($id,$titulo);
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:modalidades.php'); // salimos de esa página
  };

  $modalidad=$obtenerPorId($id,'modalidades');

  if(!$modalidad){
    header('Location:modalidades.php');
  };

require_once 'views/editarModalidad.view.php';
};