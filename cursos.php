<?php session_start();

  // Importar las funciones:
  require_once 'admin/functions.php';

  $proximos=$recogerArticulos($front_config['numProximos'],'cursos');
  $cursos=$recogerArticulos($front_config['numCursos'],'cursos');

  $errores='';
  $subido=false;

  if(!$cursos){
    header('Location:index.php');
  };

  if(isset($_POST['solicitar'])){
    $nombre=$sanear($_POST['nombre']);

    // Validar datos:
    if(empty($nombre)){
      $errores.='<li>Debes escribir el nombre</li>';
    };

    /* Comprobar que no hay errores; si no los hay, subimos 
    los datos del formulario de contacto a la base de datos */
    if(empty($errores)){
      $subirCursoSolicitado($nombre);           // Utilizamos la función 'subir contactos'
      $subido=true;                             // $subido pasa de false a true
      header('Location:mensajeSolicitado.php');
    };
  }; 

  require_once 'views/cursos.view.php';

 ?>