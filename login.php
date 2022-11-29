
<?php session_start(); // Iniciar la sesión

  // Importar las funciones:
  require_once 'admin/functions.php';

  /* Si el usuario ya ha iniciado sesión, ir a la página de 'registrados';
  si el usuario ya se ha logueado, no le voy a permitir que se vuelva a loguear */
  if(isset($_SESSION['usuario'])){
    header('Location:pagina-registrados.php');
  };

  $errores='';

  // INICIAR SESIÓN - Comprobación del envío del formulario
  if(isset($_POST['submit'])){
    $user=$sanear($_POST['user']);
    $pass=$sanear(hash('sha256',$_POST['pass']));

    if(empty($user) || empty($pass)){  
      $errores.='<li>Debes rellenar todos los campos</li>';
    }else{   // hacemos la consulta de lectura. Si no hubiera usuarios (si no hay coincidencia, si no hay registro), devuelve false
      $stmt=$conexion()->prepare("SELECT * FROM usuarios_asociados WHERE usuario=:user && password=:pass LIMIT 1");
            // placeholder para que sea más seguro. LIMIT 1 --> cuando encuentra uno deja de buscar
      $stmt->execute([   // array asociativo con el placeholder (inicialización)
        ':user'=>$user,
        ':pass'=>$pass
      ]);
      $resultado=$stmt->fetch();  // devuelve el primer valor (solo habrá un resultado)

      if($resultado!==false){  // significa que hay un registro (hay coincidencia, existe el usuario)
        //$_SESSION['usuario']=hash('md5',$user);   // se manda hasheado
        $_SESSION['usuario']=$user;  // no se envia hasheado para que pueda recogerse el nombre de usuario;
        header('Location:pagina-registrados.php');
      }else{
        $errores.='<li>Usuario o contraseña incorrectos</li>';
      };
    };
  };

  require_once 'views/login.view.php';

 ?>