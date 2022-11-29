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
  $nombreCat=$sanear($_POST['categoria']);

  // Validar datos:
  if(empty($nombreCat)){
    $errores.='<li>Debes escribir la categoría</li>';
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarCategorias($id,$nombreCat);
    header('Location:categorias.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:categorias.php'); // salimos de esa página
  };

  $categoria=$obtenerPorId($id,'categorias');

  if(!$categoria){
    header('Location:categorias.php');
  };

require_once 'views/editarCategoria.view.php';
};