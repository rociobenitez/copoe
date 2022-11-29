<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones
$subido=false;    // variable para comprobar más tarde que la imagen se ha subido correctamente

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
  $usuario=$sanear($_POST['usuario']);
  $password=$sanear($_POST['password']);

  // Validar datos:
  if(empty($usuario)){
    $errores.='<li>Debes escribir el nombre de usuario</li>';
  };
  if(empty($password)){
    $errores.='<li>Debes escribir la contraseña</li>';
  };

  /* Comprobar que no hay errores; si no los hay, subimos
  los datos del formulario a la base de datos */
  if(empty($errores)){
    $subirAdministradores($usuario,$password);  // Utilizamos la función 'subir archivos'
    $subido=true;  // $subido pasa de false a true
  };

  // Una vez subido el nuevo registro, redirigir a la página con todos los administradores
  if($subido){
    header('Location:administradores.php');
  };
};


require_once 'views/nuevoAdministrador.view.php';

 ?>