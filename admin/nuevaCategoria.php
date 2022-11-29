<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones
$subido=false;    // variable para comprobar más tarde que la imagen se ha subido correctamente

$categorias=$recogerArticulos($admin_config['numCategorias'],'categorias');

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
  $nombre=$sanear($_POST['categoria']);

  // Validar datos:
  if(empty($nombre)){
    $errores.='<li>Debes escribir el nombre de la categoría</li>';
  };

  /* Comprobar que no hay errores; si no los hay, subimos
  los datos del formulario a la base de datos */
  if(empty($errores)){
    $subirCategorias($nombre);  // Utilizamos la función 'subir archivos'
    $subido=true;  // $subido pasa de false a true
  };

  // Una vez subido el nuevo registro, redirigir a la tabla de categorias
  if($subido){
    header('Location:categorias.php');
  };
};

require_once 'views/nuevaCategoria.view.php';

?>