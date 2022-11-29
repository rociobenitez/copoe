<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$id=$obtenerId();

if(!$id){  // si id no existe
  header('Location:contactos.php'); // salimos de esa página
};

$contacto=$obtenerPorId($id,'usuarios_contact');

if(!$contacto){
  header('Location:contactos.php');
};

require_once 'views/singleContacto.view.php';

?>


