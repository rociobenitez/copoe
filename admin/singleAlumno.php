<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;

$cursos=$recogerArticulos($admin_config['numRegistros'],'cursos');
$estados=$recogerArticulos($admin_config['numRegistros'],'estados');

$id=$obtenerId();

if(!$id){  // si id no existe
  header('Location:alumnos.php'); // salimos de esa página
};

$alumno=$obtenerPorId($id,'alumnos');

if(!$alumno){
  header('Location:alumnos.php');
};

require_once 'views/singleAlumno.view.php';

?>


