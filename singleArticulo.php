<?php session_start();

  require_once 'admin/functions.php';

  $id=$obtenerId();

  if(!$id){
    header('Location:blog.php');
  };

  $cursos=$recogerArticulos($front_config['numProximos'],'cursos');
  $articulo=$obtenerPorId($id,'articulos');

  if(!$articulo){
    header('Location:blog.php');
  };

  require_once 'views/singleArticulo.view.php';

 ?>