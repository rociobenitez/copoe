<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones
$subido=false;    // variable para comprobar más tarde que se ha subido correctamente

$articulos=$recogerArticulos($admin_config['numEntradas'],'articulos');
$categorias=$recogerArticulos($admin_config['numCategorias'],'categorias');

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['crear'])){
  $titulo=$sanear($_POST['titulo']);
  $extracto=$sanear($_POST['extracto']);
  $descripcion=$sanear($_POST['descripcion']);
  $categoria=$sanear($_POST['categoria']);
  $imagen=$_FILES['imagen'];

  // Validar datos:
  if(empty($titulo)){
    $errores.='<li>Debes escribir el título</li>';
  };
  if(empty($extracto)){
    $errores.='<li>Debes escribir el extracto</li>';
  };
  if(empty($descripcion)){
    $errores.='<li>Debes escribir el descripción</li>';
  };
  if(empty($categoria)){
    $errores.='<li>Debes seleccionar la categoria</li>';
  };

  // Validamos que la imagen no esté vacía (que se ha subido correctamente):
  if(empty($imagen['tmp_name'])){
    $errores.='<li>La imagen no se ha subido correctamente</li>';
  }else{
    // Comprobamos que el archivo subido sea una imagen:
    $comprobar=getimagesize($imagen['tmp_name']);
    if($comprobar==false){
      $errores.='<li>El archivo debe ser una imagen</li>';
    }
  };

  /* Comprobar que no hay errores; si no los hay, subimos la imagen
  a la carpeta img y los datos del formulario a la base de datos */
  if(empty($errores)){
    $subirArticulos($titulo,$extracto,$descripcion,$categoria,$imagen['name']);  // Utilizamos la función 'subir archivos'
    $subido=true;   // $subido pasa de false a true
  }

  // Muevo la foto de la carpeta temporal a nuestra carpeta img
  if($subido){
    $rutaDestino=$admin_config['carpetaImg'].$imagen['name'];
    move_uploaded_file($imagen['tmp_name'], $rutaDestino);
    header('Location:articulos.php'); // Una vez subido el registro, redirigir al index
  };

};

require_once 'views/nuevoArticulo.view.php';

?>