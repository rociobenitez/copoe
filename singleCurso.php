<?php session_start();

  // Importar las funciones:
  require_once 'admin/functions.php';

  $id=$obtenerId();
  $curso=$obtenerPorId($id,'cursos');
  $estado=2;

  /* Por seguridad hacemos redirección (si no hay id y si no hay curso),
  para que nadie meta algo en la URL */

  $productos=$recogerArticulos($front_config['numProductos'],'productos');
  $errores='';      // variable para hacer validaciones
  $subido=false;

  // Comprobar que se envía el formulario - Se recogen los datos y se validan:
  if(isset($_POST['enviar'])){
    $id_curso=$sanear($_POST['id']);
    $nombre=$sanear($_POST['nombre']);
    $apellidos=$sanear($_POST['apellidos']);
    $colegiado=$sanear($_POST['colegiado']);
    $email=$sanear($_POST['email']);
    $direccion=$sanear($_POST['direccion']);
    $cuenta=$sanear($_POST['cuenta']);

    // Validar datos:
    if(empty($nombre)){
      $errores.='<li>Debes escribir el nombre del alumno</li>';
    };
    if(empty($apellidos)){
      $errores.='<li>Debes escribir los apellidos</li>';
    };
    if(empty($colegiado)){
      $errores.='<li>Debes escribir el número de colegiado</li>';
    };
    if(empty($email)){
      $errores.='<li>Debes escribir el email</li>';
    }else{
      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ //si el correo no es correcto
        $errores.='<li>El correo no es válido</li>';
      };
    };
    if(empty($direccion)){
      $errores.='<li>Debes escribir la dirección</li>';
    };
    if(empty($cuenta)){
      $errores.='<li>Debes escribir el número de cuenta</li>';
    };

    /* Comprobar que no hay errores; si no los hay, subimos la imagen
    a la carpeta img y los datos del formulario a la base de datos */
    if(empty($errores)){
      $subirAlumnos($nombre,$apellidos,$colegiado,$email,$direccion,$cuenta,$id_curso,$estado);  // Utilizamos la función 'subir archivos'
      $subido=true; 
    };

    if($subido){
      header('Location:inscripcion.php'); 
    };
  };

  require_once 'views/singleCurso.view.php';

 ?>