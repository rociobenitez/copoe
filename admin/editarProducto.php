<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;

//$productos=$recogerArticulos($admin_config['numEntradas'],'productos');
$categorias=$recogerArticulos($admin_config['numCategorias'],'categorias');

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['editar'])){
  $id=$sanear($_POST['id']);
  $nombre=$sanear($_POST['nombre']);
  $descripcion=$sanear($_POST['descripcion']);
  $precio=$sanear($_POST['precio']);
  $id_categoria=$sanear($_POST['categoria']);
  $cantidad=$sanear($_POST['cantidad']); 
  $imagenGuardada=$sanear($_POST['imagenGuardada']);
  $imagen=$_FILES['imagen'];

  // Validar datos:
  if(empty($nombre)){
    $errores.='<li>Debes escribir el nombre</li>';
  };
  if(empty($descripcion)){
    $errores.='<li>Debes escribir el descripción</li>';
  };
  if(empty($precio)){
    $errores.='<li>Debes escribir el precio</li>';
  };
  if(empty($id_categoria)){
    $errores.='<li>Debes escribir el categoria</li>';
  };
  if(empty($cantidad)){
    $errores.='<li>Debes escribir el cantidad</li>';
  };

  // Imagen subida:
  if(empty($imagen['tmp_name'])){
    $imagen=$imagenGuardada;
  }else{
    $comprobar=getimagesize($imagen['tmp_name']);
    if($comprobar===false){
      $errores.='<li>El archivo debe ser de tipo imagen</li>';
    }else{
      $rutaDestino=$admin_config['carpetaImgTienda'].$imagen['name'];
      move_uploaded_file($imagen['tmp_name'],$rutaDestino);
      $imagen=$imagen['name'];
    };
  };

  // si todo ha ido bien (si no hay errores):
  if(empty($errores)){
    $editarProductos($id,$nombre,$descripcion,$precio,$imagen,$id_categoria,$cantidad);  // se edita el producto
    header('Location:productos.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:productos.php'); // salimos de esa página
  };

  $producto=$obtenerPorId($id,'productos');
  if(!$producto){
    header('Location:productos.php');
  };
};

require_once 'views/editarProducto.view.php';

?>