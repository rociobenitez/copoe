<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;

$ventajas=$recogerArticulos($admin_config['numEntradas'],'ventajas');

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['submit'])){
  $id=$sanear($_POST['id']);
  $titulo=$sanear($_POST['titulo']);
  $descripcion=$sanear($_POST['descripcion']);
  $extracto=$sanear($_POST['extracto']);
  $boton=$sanear($_POST['boton']);
  $enfasis=$sanear($_POST['enfasis']);
  $url=$sanear($_POST['url']);
  $icono=$_FILES['icono'];
  $imagen=$_FILES['imagen'];
  $imagenGuardada=$sanear($_POST['imagenGuardada']);
  $iconoGuardado=$sanear($_POST['iconoGuardado']);

// Validar datos:
  if(empty($descripcion)){
    $errores.='<li>Debes escribir el descripción</li>';
  };
  if(empty($extracto)){
    $errores.='<li>Debes escribir el extracto</li>';
  };
  if(empty($boton)){
    $errores.='<li>Debes escribir el texto del boton</li>';
  };
  if(empty($enfasis)){
    $errores.='<li>Debes escribir el texto de enfasis</li>';
  };
  if(empty($url)){
    $errores.='<li>Debes escribir la url del botón</li>';
  };

  if(empty($imagen['tmp_name'])){
    $imagen=$imagenGuardada;
  }else{
    $comprobar=getimagesize($imagen['tmp_name']);
    if($comprobar===false){
      $errores.='<li>El archivo debe ser de tipo imagen</li>';
    }else{
      $rutaDestino=$admin_config['carpetaImgVentajas'].$imagen['name'];
      move_uploaded_file($imagen['tmp_name'],$rutaDestino);
      $imagen=$imagen['name'];
    };
  };

  if(empty($icono['tmp_name'])){
    $icono=$iconoGuardado;
  }else{
    $comprobar=getimagesize($icono['tmp_name']);
    if($comprobar===false){
      $errores.='<li>El archivo debe ser de tipo imagen</li>';
    }else{
      $rutaDestino=$admin_config['carpetaImgVentajas'].$icono['name'];
      move_uploaded_file($icono['tmp_name'],$rutaDestino);
      $icono=$icono['name'];
    };
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarVentajas($id,$titulo,$descripcion,$icono,$imagen,$extracto,$boton,$enfasis,$url);
    header('Location:ventajas.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:ventajas.php'); // salimos de esa página
  };

  $ventaja=$obtenerPorId($id,'ventajas');
  if(!$ventaja){
    header('Location:ventajas.php');
  };
}

require_once 'views/editarVentaja.view.php';

?>