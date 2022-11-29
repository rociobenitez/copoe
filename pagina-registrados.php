<?php session_start();  /* comprobar si la sesión está abierta */

// Importar las funciones:
require_once 'admin/functions.php';

// Si el usuario no ha iniciado sesión, ir a la página de inicio:
if(!isset($_SESSION['usuario'])){
  header('Location:index.php');
};

// Si no hay conexión, aparece 'Error':
if(!$conexion()){
      die('ERROR EN LA CONEXIÓN');  // interrumpe la ejecución del programa
};  // se suele utilizar die cuando trabajamos con datos sensibles

$errores='';
$subido=false;
$usuario=$_SESSION['usuario'];
$datosUsuario=$obtenerPorUsuario($usuario,'usuarios_asociados');

/* Comprobar que se envía el formulario - Se recogen los datos y se validan.
Formulario por si el usuario quiere editar los datos de su cuenta */
if(isset($_POST['submit'])){
  $id=$sanear($_POST['id']);
  $password=$sanear($_POST['password']);
  $cuenta=$sanear($_POST['cuenta']);
  $nombre=$sanear($_POST['nombre']);
  $apellidos=$sanear($_POST['apellidos']);
  $usuario=$sanear($_POST['usuario']);
  $email=$sanear($_POST['email']);
  $direccion=$sanear($_POST['direccion']);
  $provincia=$sanear($_POST['provincia']);


  // Validar datos:
  if(empty($usuario)){
    $errores.='<li>Debes escribir el nombre de usuario</li>';
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

  // si todo ha ido bien:
  if(empty($errores)){
    $editarAsociados($id,$usuario,$password,$email,$nombre,$apellidos,$direccion,$provincia,$cuenta);
    header('Location:pagina-registrados.php');
  };
};

  require_once 'views/pagina-registrados.view.php';

 ?>