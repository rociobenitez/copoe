<?php 

  // Especificar el tipo de contenido (formato json):
  header('Content-type:application/json;charset=utf-8');
  // API pública que se puede consumir desde cualquier sitio
  header('Access-Control-Allow-Origin: *');

  // Recoger la conexión:
  require_once 'conexion.php';

  $stmt=$conexion()->prepare("SELECT * FROM productos");
  $stmt->execute();
  $datos=$stmt->fetchAll();  // Almacenar los datos

  echo json_encode($datos);

 ?>