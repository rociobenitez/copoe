<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');  // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';
$subido=false;
$categorias=$recogerArticulos($admin_config['numCategorias'],'categorias');

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['crear'])){
  $nombre=$sanear($_POST['nombre']);
  $descripcion=$sanear($_POST['descripcion']);
  $precio=$sanear($_POST['precio']);
  $categoria=$sanear($_POST['categoria']);
  $cantidad=$sanear($_POST['cantidad']); 
  $imagen=$_FILES['imagen'];

  // Validar datos:
  if(empty($nombre)){
    $errores.='<li>Debes escribir el nombre</li>';
  };
  if(empty($descripcion)){
    $errores.='<li>Debes escribir la descripción</li>';
  };
  if(empty($precio)){
    $errores.='<li>Debes escribir el precio</li>';
  };
  if(empty($categoria)){
    $errores.='<li>Debes seleccionar la categoría</li>';
  };
  if(empty($cantidad)){
    $errores.='<li>Debes escribir la cantidad</li>';
  };

  // Validar que la imagen no esté vacía (que se ha subido correctamente):
  if(empty($imagen['tmp_name'])){    // imagen almacenada en 'tmp_name'
    $errores.='<li>La imagen no se ha subido correctamente</li>';
  }else{
    // Comprobar que el archivo subido es una imagen:
    $comprobar=getimagesize($imagen['tmp_name']);
    if($comprobar==false){
      $errores.='<li>El archivo debe ser una imagen</li>';
    }
  };

  /* Comprobar que no hay errores; si no los hay, subimos la imagen
  a la carpeta img y los datos del formulario a la base de datos */
  if(empty($errores)){
    $subirProductos($nombre,$descripcion,$precio,$imagen['name'],$categoria,$cantidad);  // Utilizamos la función 'subir productos'
    $subido=true;       // $subido pasa de false a true
  };

  // Muevo la foto de la carpeta temporal a nuestra carpeta img
  if($subido){
    $rutaDestino=$admin_config['carpetaImgTienda'].$imagen['name'];
    move_uploaded_file($imagen['tmp_name'], $rutaDestino);
    header('Location:productos.php');
  };
};

require_once 'views/nuevoProducto.view.php';

?>