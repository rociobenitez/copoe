<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };
  
  $mensaje='';

  if(!isset($_GET['submit'])){
    $alumnos=$recogerArticulos($admin_config['numUsuarios'],'alumnos');
    $totalAlumnos=count($alumnos);
  };

  if(isset($_GET['busqueda'])){
    $busqueda=$sanear($_GET['busqueda']);
    if(!empty($busqueda)){
      $alumnos=$buscarRegistros('alumnos',$busqueda);
      $totalAlumnos=count($alumnos);
      if(!$alumnos){
        $mensaje="No hay alumnos con el nombre $busqueda";
      }else{
        $mensaje="Hay $totalAlumnos resultados con el nombre $busqueda";
      };
    };
  };

  require_once 'views/alumnos.view.php';
?>