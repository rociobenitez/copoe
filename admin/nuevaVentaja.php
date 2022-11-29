<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones
$subido=false;    // variable para comprobar más tarde que la imagen se ha subido correctamente

$ventajas=$recogerArticulos($admin_config['numEntradas'],'ventajas');

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
  $titulo=$sanear($_POST['titulo']);
  $descripcion=$sanear($_POST['descripcion']);
  $extracto=$sanear($_POST['extracto']);
  $boton=$sanear($_POST['boton']);
  $enfasis=$sanear($_POST['enfasis']);
  $url=$sanear($_POST['url']);
  $icono=$_FILES['icono'];
  $imagen=$_FILES['imagen'];

  // Validar datos:
  if(empty($titulo)){
    $errores.='<li>Debes escribir el título</li>';
  };
  if(empty($descripcion)){
    $errores.='<li>Debes escribir la descripción</li>';
  };
  if(empty($extracto)){
    $errores.='<li>Debes escribir el extracto</li>';
  };
  if(empty($boton)){
    $errores.='<li>Debes escribir el texto que aparecerá en el botón</li>';
  };
  if(empty($enfasis)){
    $errores.='<li>Debes escribir el texto destacado</li>';
  };
  if(empty($url)){
    $errores.='<li>Debes escribir la url del botón</li>';
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

  // Validamos que la imagen del icono no esté vacía (que se ha subido correctamente):
  if(empty($icono['tmp_name'])){
    $errores.='<li>El icono no se ha subido correctamente</li>';
  }else{
    // Comprobamos que el archivo subido sea una imagen:
    $comprobar=getimagesize($icono['tmp_name']);
    if($comprobar==false){
      $errores.='<li>El archivo debe ser una imagen</li>';
    }
  };

  /* Comprobar que no hay errores; si no los hay, subimos la imagen
  a la carpeta img y los datos del formulario a la base de datos */
  if(empty($errores)){
    $subirVentajas($titulo,$descripcion,$icono['name'],$imagen['name'],$extracto,$boton,$enfasis,$url);  // Utilizamos la función 'subir archivos'
    $subido=true;       // $subido pasa de false a true
  }

  // Muevo la foto de la carpeta temporal a nuestra carpeta img
  if($subido){
    $rutaDestino=$admin_config['carpetaImgVentajas'].$imagen['name'];
    move_uploaded_file($imagen['tmp_name'], $rutaDestino);
    header('Location:ventajas.php');
  };
};

require_once 'views/nuevaVentaja.view.php';

?>