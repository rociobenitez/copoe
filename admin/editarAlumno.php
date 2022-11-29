<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;

$alumnos=$recogerArticulos($admin_config['numRegistros'],'alumnos');
$cuentas=$recogerArticulos($admin_config['numRegistros'],'cuentas');
$cursos=$recogerArticulos($admin_config['numRegistros'],'cursos');
$estados=$recogerArticulos($admin_config['numRegistros'],'estados');

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['submit'])){
  $id=$sanear($_POST['id']);
  $nombre=$sanear($_POST['nombre']);
  $apellidos=$sanear($_POST['apellidos']);
  $colegiado=$sanear($_POST['colegiado']);
  $email=$sanear($_POST['email']);
  $direccion=$sanear($_POST['direccion']);
  $cuenta=$sanear($_POST['cuenta']);
  $curso=$sanear($_POST['curso']);
  $estado=$sanear($_POST['estado']);

  // Validar datos:
  if(empty($nombre)){
    $errores.='<li>Debes escribir el nombre del alumno</li>';
  };
  if(empty($apellidos)){
    $errores.='<li>Debes escribir los apellidos</li>';
  };
  if(empty($colegiado)){
    $errores.='<li>Debes escribir el número de colegiado</li>';
  };
  if(empty($email)){
    $errores.='<li>Debes escribir el email</li>';
  };
  if(empty($direccion)){
    $errores.='<li>Debes escribir la dirección</li>';
  };
  if(empty($cuenta)){
    $errores.='<li>Debes escribir el número de cuenta</li>';
  };
  if(empty($curso)){
    $errores.='<li>Debes escribir el nombre del curso</li>';
  };
  if(empty($estado)){
    $errores.='<li>Debes escribir el estado del curso</li>';
  };

  // si todo ha ido bien (si no hay errores):
  if(empty($errores)){
    $editarAlumnos($id,$nombre,$apellidos,$colegiado,$email,$direccion,$cuenta,$curso,$estado);
    header('Location:alumnos.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:alumnos.php'); // salimos de esa página
  };

  $alumno=$obtenerPorId($id,'alumnos');
  if(!$alumno){
    header('Location:alumnos.php');
  };
};

require_once 'views/editarAlumno.view.php';

?>


