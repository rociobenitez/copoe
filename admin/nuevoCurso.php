<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');  // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';
$subido=false;

$cursos=$recogerArticulos($admin_config['numEntradas'],'cursos');
$categorias=$recogerArticulos($admin_config['numCategorias'],'categorias');
$modalidades=$recogerArticulos($admin_config['numEntradas'],'modalidades');
$estados=$recogerArticulos($admin_config['numEntradas'],'estados');

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['submit'])){
  $titulo=$sanear($_POST['titulo']);
  $fecha=$sanear($_POST['fecha']);
  $lugar=$sanear($_POST['lugar']);
  $extracto=$sanear($_POST['extracto']);
  $duracion=$sanear($_POST['duracion']);
  $direccion=$sanear($_POST['direccion']);
  $precio=$sanear($_POST['precio']);
  $precio_asociado=$sanear($_POST['precio_asociado']);
  $modalidad=$sanear($_POST['modalidad']);
  $categoria=$sanear($_POST['categoria']);
  $plazas=$sanear($_POST['plazas']);
  $docentes=$sanear($_POST['docentes']);
  $estado=$sanear($_POST['estado']);
  $descripcion=$sanear($_POST['descripcion']);
  $imagen=$_FILES['imagen'];

  // Validar datos:
  if(empty($titulo)){
    $errores.='<li>Debes escribir el título</li>';
  };
  if(empty($fecha)){
    $errores.='<li>Debes escribir la fecha</li>';
  };
  if(empty($lugar)){
    $errores.='<li>Debes escribir el lugar o dirección del curso</li>';
  };
  if(empty($duracion)){
    $errores.='<li>Debes escribir la duración del curso (horas)</li>';
  };
  if(empty($direccion)){
    $errores.='<li>Debes escribir la dirección del curso</li>';
  };
  if(empty($precio)){
    $errores.='<li>Debes escribir el precio</li>';
  };
  if(empty($precio_asociado)){
    $errores.='<li>Debes escribir el precio de asociado</li>';
  };
  if(empty($modalidad)){
    $errores.='<li>Debes seleccionar la modalidad</li>';
  };
  if(empty($categoria)){
    $errores.='<li>Debes seleccionar la categoría</li>';
  };
  if(empty($plazas)){
    $errores.='<li>Debes escribir el número de plazas</li>';
  };
  if(empty($docentes)){
    $errores.='<li>Debes escribir los docentes del curso</li>';
  };
  if(empty($estado)){
    $errores.='<li>Debes seleccionar el estado del curso</li>';
  };
  if(empty($descripcion)){
    $errores.='<li>Debes escribir la descripción</li>';
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
    $subirCursos($titulo,$fecha,$lugar,$extracto,$descripcion,$modalidad,$categoria,$estado,$precio,$precio_asociado,$duracion,$direccion,$docentes,$plazas,$imagen['name']);  // Utilizamos la función 'subir cursos'
    $subido=true;       // $subido pasa de false a true
  };

  // Muevo la foto de la carpeta temporal a nuestra carpeta img
  if($subido){
    $rutaDestino=$admin_config['carpetaImgCursos'].$imagen['name'];
    move_uploaded_file($imagen['tmp_name'], $rutaDestino);
    header('Location:cursos.php');
  };
};

require_once 'views/nuevoCurso.view.php';

?>