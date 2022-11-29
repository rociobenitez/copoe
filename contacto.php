
<?php session_start();

  // Importar las funciones:
  require_once 'admin/functions.php';

  // Si no hay conexión, aparece 'Error':
  if(!$conexion()){
    die('ERROR EN LA CONEXIÓN');  // interrumpe la ejecución del programa
  };  // se suele utilizar die cuando trabajamos con datos sensibles
  
  $errores='';

  // REGISTRO NUEVO CONTACTO - Capturar los datos del 'Nuevo Contacto'
  if(isset($_POST['enviar'])){       // si se ha pulsado el botón de 'Enviar consulta'
    $nombre=$sanear($_POST['nombre']);
    $email=$sanear($_POST['email']);
    $telefono=$sanear($_POST['telefono']);
    $descripcion=$sanear($_POST['descripcion']);

    // Validar datos:
    if(empty($nombre)){ 
      $errores.='<li>Debes escribir el nombre</li>';
    };
    if(empty($email)){
      $errores.='<li>Debes escribir el correo</li>';
    }else{
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){   //si el correo no es correcto
        $errores.='<li>El correo no es válido</li>';
      };
    };
    if(empty($telefono)){ 
      $errores.='<li>Debes escribir el teléfono</li>';
    };
    if(empty($descripcion)){ 
      $errores.='<li>Debes escribir la descripción</li>';
    };
    if(empty($errores)){
      $subirContactos($nombre,$email,$telefono,$descripcion);  // Utilizamos la función 'subir contactos'
      $subido=true;   

      // Enviar mensaje / email:
      $para='rocio_bg22@alumnos.cei.es';
      $asunto='Mensaje del formulario de contacto de COPOE';
      $mensaje="<h1>$asunto</h1>";
      $mensaje.="<h2>Correo: $email</h2>";
      $mensaje.="<p><strong>Mensaje:</strong> $descripcion</p>";

      // para que no sea texto plano:
      $cabecera='MIME-Version: 1.0'. "\r\n";
      $cabecera.='Content_type: text/html; charset=UTF-8'. "\r\n";

      if(mail($para,$asunto,$mensaje)){ // si el mail se ha enviado:
        $enviado=true;
      }else{
        $enviado=false;
      };

      header('Location:mensajeContactar.php');  // una vez enviado el mensaje, redirigir a la página 'gracias por contactar'
    }; 
  };

  require_once 'views/contacto.view.php';

?>

