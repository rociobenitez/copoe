<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;

$articulos=$recogerArticulos($admin_config['numEntradas'],'articulos');
$categorias=$recogerArticulos($admin_config['numCategorias'],'categorias');

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['editar'])){
  $id=$sanear($_POST['id']);
  $titulo=$sanear($_POST['titulo']);
  $extracto=$sanear($_POST['extracto']);
  $descripcion=$sanear($_POST['descripcion']);
  $categoria=$sanear($_POST['categoria']);
  $imagenGuardada=$sanear($_POST['imagenGuardada']);
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
    $errores.='<li>Debes seleccionar la categoría del artículo</li>';
  };

  if(empty($imagen['tmp_name'])){
    $imagen=$imagenGuardada;
  }else{
    $comprobar=getimagesize($imagen['tmp_name']);
    if($comprobar===false){
      $errores.='<li>El archivo debe ser de tipo imagen</li>';
    }else{
      $rutaDestino=$admin_config['carpetaImgBlog'].$imagen['name'];
      move_uploaded_file($imagen['tmp_name'],$rutaDestino);
      $imagen=$imagen['name'];
    };
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarArticulos($id,$titulo,$extracto,$descripcion,$imagen,$categoria);
    header('Location:articulos.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:articulos.php'); // salimos de esa página
  };

  $articulo=$obtenerPorId($id,'articulos');
  if(!$articulo){
    header('Location:articulos.php');
  };
};

require_once 'views/editarArticulo.view.php';

?>