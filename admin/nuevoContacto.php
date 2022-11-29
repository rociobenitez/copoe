<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones
$contactos=$recogerArticulos($admin_config['numEntradas'],'usuarios_contact');

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
  $nombre=$sanear($_POST['nombre']);
  $email=$sanear($_POST['email']);
  $telefono=$sanear($_POST['telefono']);
  $descripcion=$sanear($_POST['descripcion']);

  // Validar datos:
  if(empty($nombre) || empty($email) || empty($telefono) || empty($descripcion)){ 
      $errores.='<li>Debes rellenar todos los campos</li>';
    }else{   // hacemos la consulta de lectura. Si no hubiera usuarios con ese email, devuelve false
      $stmt=$conexion()->prepare("SELECT email FROM usuarios_contact WHERE email=:email");    // placeholder para que sea más seguro
      $stmt->execute([   // array asociativo con el placeholder
        ':email'=>$email
      ]);
      $resultado=$stmt->fetch();

      /* si resultado es distinto a false, significa que ya existe un usuario con ese nombre;
      en caso contrario vamos a comprobar que las contraseñas sean iguales: */
      if($resultado!==false){
        $errores.='<li class="fw-italic">Oh no! Ese email ya está registrado</li>';
      };

      /* Comprobar que no hay errores; si no los hay, subimos la imagen
      a la carpeta img y los datos del formulario a la base de datos */
      if(empty($errores)){
        $subirContactos($nombre,$email,$telefono,$descripcion);  // Utilizamos la función 'subir contactos'
        header('Location:contactos.php');
      };
    };
  };

require_once 'views/nuevoContacto.view.php';

 ?>