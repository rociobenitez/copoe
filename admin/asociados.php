<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $cuentas=$recogerArticulos($admin_config['numEntradas'],'cuentas');

  $estudiantes=$recogerAsociados('1','usuarios_asociados');
  $basica=$recogerAsociados('2','usuarios_asociados');
  $premium=$recogerAsociados('3','usuarios_asociados');
  $mensaje='';

  $asociados=$recogerArticulos($admin_config['numUsuarios'],'usuarios_asociados');
  $totalAsociados=count($asociados);
  $totalEstudiantes=count($estudiantes);
  $totalBasica=count($basica);
  $totalPremium=count($premium); 

  // si está seteada 'busqueda', si se ha clicado en el botón 'buscar':
  if(isset($_GET['busqueda'])){
    $busqueda=$sanear($_GET['busqueda']);
    if(!empty($busqueda)){
      $asociados=$buscarRegistros('usuarios_asociados',$busqueda);
      $totalEncontrados=count($asociados);  // nº de asociados encontrados con el término búsqueda
      if(!$asociados){
        $mensaje="No hay asociados con el nombre $busqueda";
      }else{
        $mensaje="Hay $totalEncontrados resultados con el nombre <em>$busqueda</em>";
      };
    };
  };

  require_once 'views/asociados.view.php';

?>