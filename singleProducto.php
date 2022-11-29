<?php session_start();

  require_once 'admin/functions.php';

  $id=$obtenerId();

  if(!$id){
    header('Location:blog.php');
  };

  $producto=$obtenerPorId($id,'productos');

  if(!$producto){
    header('Location:blog.php');
  };

  require_once 'views/singleProducto.view.php';

 ?>