<?php session_start();  // Iniciar la sesión

  // Importar las funciones:
  require_once 'functions.php';

  // Comprobar que hay sesión:
  if(isset($_SESSION['usuario'])){
    header('Location:index.php');
  };

  // INICIAR SESIÓN
  if(isset($_POST['submit'])){
    $user=$sanear($_POST['user']);
    $pass=$sanear($_POST['pass']);  // solo saneamos para evitar que introduzcan código 

    if(empty($user) || empty($pass)){ 
      $errores.='<li>Debes rellenar todos los campos</li>';
    }else{   // hacemos la consulta de lectura. Si no hubiera usuarios, devuelve false
      $stmt=$conexion()->prepare("SELECT * FROM usuarios_admin WHERE usuario=:user && password=:pass LIMIT 1"); // placeholder para que sea más seguro
      $stmt->execute([   // array asociativo con el placeholder
        ':user'=>$user,
        ':pass'=>$pass
      ]);
      $resultado=$stmt->fetch();

      if($resultado!==false){
        $_SESSION['usuario']=hash('md5',$user);   // guardar el usuario en una sesión; hashear para que no se visualice en el navegador
        header('Location:index.php');
      }else{
        $errores.='<li>Usuario o contraseña incorrectos</li>';
      };
    };
  };

require_once 'views/login.view.php'

?>