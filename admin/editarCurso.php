<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$cursos=$recogerArticulos($admin_config['numEntradas'],'cursos');
$modalidades=$recogerArticulos($admin_config['numEntradas'],'modalidades');
$categorias=$recogerArticulos($admin_config['numEntradas'],'categorias');
$estados=$recogerArticulos($admin_config['numEntradas'],'estados');

$errores='';
$subido=false;

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
  $id=$sanear($_POST['id']);
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
  $imagenGuardada=$sanear($_POST['imagenGuardada']);
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

  // Imagen subida:
  if(empty($imagen['tmp_name'])){
    $imagen=$imagenGuardada;
  }else{
    $comprobar=getimagesize($imagen['tmp_name']);  //comprobar que el archivo es de tipo imagen:
    if($comprobar===false){
      $errores.='<li>El archivo debe ser de tipo imagen</li>';
    }else{
      $rutaDestino=$admin_config['carpetaImgCursos'].$imagen['name'];  // se especifica la ruta de destino
      move_uploaded_file($imagen['tmp_name'],$rutaDestino);  
      $imagen=$imagen['name'];  //valor que se le pasa al archivo (nombre de la imagen guardada)
    };
  };

  // si todo ha ido bien (si no hay errores):
  if(empty($errores)){
    $editarCursos($id,$titulo,$fecha,$lugar,$extracto,$descripcion,$modalidad,$categoria,$estado,$precio,$precio_asociado,$duracion,$direccion,$docentes,$plazas,$imagen);  //se edita el curso
    header('Location:cursos.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:cursos.php'); // salimos de esa página
  };

  $curso=$obtenerPorId($id,'cursos');
  if(!$curso){
    header('Location:cursos.php');
  };
};

require_once 'views/editarCurso.view.php';

?>