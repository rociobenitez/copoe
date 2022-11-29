<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$contactos=$recogerArticulos($admin_config['numRegistros'],'usuarios_contact');
$errores='';

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['submit'])){
  $id=$sanear($_POST['id']);
  $email=$sanear($_POST['email']);
  $nombre=$sanear($_POST['nombre']);
  $telefono=$sanear($_POST['telefono']);
  $descripcion=$sanear($_POST['descripcion']);

  // Validar datos:
  if(empty($email)){
    $errores.='<li>Debes escribir el email</li>';
  };
  if(empty($nombre)){
    $errores.='<li>Debes escribir el nombre del contacto</li>';
  };
  if(empty($telefono)){
    $errores.='<li>Debes escribir el telefono</li>';
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarContactos($id,$nombre,$email,$telefono,$descripcion);
    header('Location:contactos.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:contactos.php'); // salimos de esa página
  };

  $contacto=$obtenerPorId($id,'usuarios_contact');
  if(!$contacto){
    header('Location:contactos.php');
  };
};

  require_once 'views/editarContacto.view.php';

?>