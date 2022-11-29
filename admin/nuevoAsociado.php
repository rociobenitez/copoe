<?php session_start();  //Inicio sesión - Proteger

// Importar las funciones:
require_once 'functions.php';

// Comprobar si hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php'); // si no hay sesión, no dejar entrar al usuario; redirigir al index (front - 'Home')
};

$errores='';      // variable para hacer validaciones

$asociados=$recogerArticulos($admin_config['numEntradas'],'usuarios_asociados');
$cuentas=$recogerArticulos($admin_config['numEntradas'],'cuentas');

// Comprobar que se envía el formulario - Se recogen los datos y se validan:
if(isset($_POST['submit'])){
  $usuario=$sanear($_POST['usuario']);
  $password=$_POST['password']; // las contraseñas no se sanean porque luego se van a hashear
  $password2=$_POST['password2'];
  $nombre=$sanear($_POST['nombre']);
  $apellidos=$sanear($_POST['apellidos']);
  $cuenta=$sanear($_POST['cuenta']);
  $email=$sanear($_POST['email']);
  $direccion=$sanear($_POST['direccion']);
  $provincia=$sanear($_POST['provincia']);

  // Validar datos:
  if(empty($nombre) || empty($apellidos) || empty($usuario) || empty($email) || empty($password) || empty($password2) || empty($direccion) || empty($provincia) || empty($direccion)){ 
      $errores.='<li>Debes rellenar todos los campos</li>';
    }else{   // hacemos la consulta de lectura. Si no hubiera usuarios, devuelve false
      $stmt=$conexion()->prepare("SELECT usuario FROM usuarios_asociados WHERE usuario=:user");    // placeholder para que sea más seguro
      $stmt->execute([   // array asociativo con el placeholder
        ':user'=>$user
      ]);
      $resultado=$stmt->fetch();

      /* si resultado es distinto a false, significa que ya existe un usuario con ese nombre;
      en caso contrario vamos a comprobar que las contraseñas sean iguales: */
      if($resultado!==false){
        $errores.='<li class="fw-italic">Oh no! Ya hay un usuario con ese nombre</li>';
      }else{
        $password=hash('sha256',$password);    // encriptación contraseña ('sha256' -> 95 caracteres)
        $password2=hash('sha256',$password2);  // encriptación contraseña

        if($password!=$password2){
          $errores.='<li>Las contraseñas no coinciden</li>';
        };
      };

      /* Comprobar que no hay errores; si no los hay, subimos la imagen
      a la carpeta img y los datos del formulario a la base de datos */
      if(empty($errores)){
        $subirAsociados($usuario,$password,$email,$nombre,$apellidos,$direccion,$provincia,$cuenta);  // Utilizamos la función 'subir asociados'
        header('Location:asociados.php');
      };
    };
  };


require_once 'views/nuevoAsociado.view.php';

 ?>