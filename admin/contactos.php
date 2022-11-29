<?php session_start();

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(!isset($_SESSION['usuario'])){
    header('Location:../index.php');
  };

  $contactos=$recogerArticulos($admin_config['numRegistros'],'usuarios_contact');
  $totalContactos=count($contactos);
  $mensaje='';

  // si está seteada 'busqueda', si se ha clicado en el botón 'buscar':
  if(isset($_GET['busqueda'])){
    $busqueda=$sanear($_GET['busqueda']);
    if(!empty($busqueda)){
      $contactos=$buscarContactos($busqueda);
      $totalEncontrados=count($contactos);
      if(!$contactos){
        $mensaje="No hay contactos con el nombre $busqueda";
      }else{
        $mensaje="Hay $totalEncontrados resultados con el nombre <em>$busqueda</em>";
      };
    };
  };

  require_once 'views/contactos.view.php';
?>