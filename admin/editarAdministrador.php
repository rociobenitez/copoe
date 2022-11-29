<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['submit'])){
  $id=$sanear($_POST['id']);
  $usuario=$sanear($_POST['usuario']);
  $password=$sanear($_POST['password']);

  // Validar datos:
  if(empty($usuario)){
    $errores.='<li>Debes escribir el nombre de usuario</li>';
  };
  if(empty($password)){
    $errores.='<li>Debes escribir la contraseña</li>';
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarAdministradores($id,$usuario,$password);
    header('Location:administradores.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:administradores.php'); // salimos de esa página
  };

  $administrador=$obtenerPorId($id,'usuarios_admin');
  if(!$administrador){
    header('Location:administradores.php');
  };
};

require_once 'views/editarAdministrador.view.php';

?>