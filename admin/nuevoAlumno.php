<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones
$subido=false;    // variable para comprobar más tarde que la imagen se ha subido correctamente

$alumnos=$recogerArticulos($admin_config['numEntradas'],'alumnos');
$cursos=$recogerArticulos($admin_config['numCursos'],'cursos');
$estados=$recogerArticulos($admin_config['numEntradas'],'estados');

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
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
    $errores.='<li>Debes especificar el curso</li>';
  };
  if(empty($estado)){
    $errores.='<li>Debes especificar el estado</li>';
  };

  /* Comprobar que no hay errores; si no los hay, subimos la imagen
  a la carpeta img y los datos del formulario a la base de datos */
  if(empty($errores)){
    $subirAlumnos($nombre,$apellidos,$colegiado,$email,$direccion,$cuenta,$curso,$estado);  // Utilizamos la función 'subir archivos'
    $subido=true;  // $subido pasa de false a true
  };

  // Una vez subido el nuevo registro, redirigir al index
  if($subido){
    header('Location:alumnos.php');
  };
};

require_once 'views/nuevoAlumno.view.php';

 ?>