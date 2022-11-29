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
    $errores.='<li>Debes escribir la descripción</li>';
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarCuentas($id,$titulo,$precio,$descripcion);
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:cuentas.php'); // salimos de esa página
  };

  $cuenta=$obtenerPorId($id,'cuentas');
  if(!$cuenta){
    header('Location:cuentas.php');
  };

require_once 'views/editarCuenta.view.php';
};