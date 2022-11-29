<?php session_start();  //Inicio sesión

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$errores='';
$subido=false;

$asociados=$recogerArticulos($admin_config['numRegistros'],'usuarios_asociados');
$cuentas=$recogerArticulos($admin_config['numRegistros'],'cuentas');

// Comprobar que se envía el formulario - Se recogen los datos y se valida:
if(isset($_POST['submit'])){
  $id=$sanear($_POST['id']);
  $usuario=$sanear($_POST['usuario']);
  $password=$sanear($_POST['password']);
  $email=$sanear($_POST['email']);
  $nombre=$sanear($_POST['nombre']);
  $apellidos=$sanear($_POST['apellidos']);
  $direccion=$sanear($_POST['direccion']);
  $provincia=$sanear($_POST['provincia']);
  $cuenta=$sanear($_POST['cuenta']);

  // Validar datos:
  if(empty($usuario)){
    $errores.='<li>Debes escribir el nombre de usuario</li>';
  };
  if(empty($password)){
    $errores.='<li>Debes escribir la contraseña</li>';
  };
  if(empty($email)){
    $errores.='<li>Debes escribir el email</li>';
  };
  if(empty($nombre)){
    $errores.='<li>Debes escribir el nombre del alumno</li>';
  };
  if(empty($apellidos)){
    $errores.='<li>Debes escribir los apellidos</li>';
  };
  if(empty($direccion)){
    $errores.='<li>Debes escribir la dirección</li>';
  };
  if(empty($provincia)){
    $errores.='<li>Debes escribir la provincia</li>';
  };
  if(empty($cuenta)){
    $errores.='<li>Debes escribir el número de cuenta</li>';
  };

  // si todo ha ido bien:
  if(empty($errores)){
    $editarAsociados($id,$usuario,$password,$email,$nombre,$apellidos,$direccion,$provincia,$cuenta);
    header('Location:asociados.php');
  };

}else{
  $id=$obtenerId();
  if(!$id){  // si id no existe
    header('Location:asociados.php'); // salimos de esa página
  };

  $asociado=$obtenerPorId($id,'usuarios_asociados');
  if(!$asociado){
    header('Location:asociados.php');
  };
};

  require_once 'views/editarAsociado.view.php';

?>