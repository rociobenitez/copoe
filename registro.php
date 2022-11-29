<?php session_start(); // Iniciar la sesión
        /* trabajamos con sesiones, vamos a comprobar si la sesión está abierta */

  // Importar las funciones:
  require_once 'admin/functions.php';

  // Si el usuario ya ha iniciado sesión, ir a la página de 'registrados':
  if(isset($_SESSION['usuario'])){
  	header('Location:pagina-registrados.php');
  };
     /* si el usuario ya se ha logueado, no le
     voy a permitir que se vuelva a registrar */

  // Si no hay conexión, aparece 'Error':
  if(!$conexion()){
  	die('ERROR EN LA CONEXIÓN');  // interrumpe la ejecución del programa
  };  // se suele utilizar die cuando trabajamos con datos sensibles

  $cuentas=$recogerArticulos($front_config['numCuentas'],'cuentas');
  $errores='';

  // REGISTRO NUEVO USUARIO - Capturar los datos del 'Nuevo Asociado'
  if(isset($_POST['submit'])){       // si se ha pulsado el botón de registro ('Asociarme')
    $nombre=$sanear($_POST['nombre']);
    $apellidos=$sanear($_POST['apellidos']);
    $user=$sanear($_POST['user']);   // saneamos para que no pueda inyectarse código
    $email=$sanear($_POST['email']);
    $pass=$_POST['pass'];   // las contraseñas no se sanean porque luego se van a hashear
    $pass2=$_POST['pass2']; // si le digo repite 
    $direccion=$sanear($_POST['direccion']);
    $provincia=$sanear($_POST['provincia']);
    $cuenta=$sanear($_POST['cuenta']);

    if(empty($nombre) || empty($apellidos) || empty($user) || empty($email) || empty($pass) || empty($pass2) || empty($direccion) || empty($provincia) || empty($cuenta)){ 
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
        $pass=hash('sha256',$pass);    // encriptación contraseña ('sha256' -> 95 caracteres)
        $pass2=hash('sha256',$pass2);  // encriptación contraseña
        if($pass!=$pass2){
          $errores.='<li>Las contraseñas no coinciden</li>';
        };
      };

      /* si no hay errores y el valor de cuenta es igual al id de la cuenta,
      añade el nuevo usuario a la Base de Datos: */
      if(empty($errores)){
        $subirAsociados($user,$pass,$email,$nombre,$apellidos,$direccion,$provincia,$cuenta);
        header('Location:pagina-registrados.php');  // una vez registrado, redirigir a la página 'login' / inicio de sesión
      };
    }; 
  };

  require_once 'views/registro.view.php';


 ?>