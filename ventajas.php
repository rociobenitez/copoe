<?php session_start();

  require_once 'admin/functions.php';

  $ventajas=$recogerArticulos($front_config['numVentajas'],'ventajas');

  if(!$ventajas){
    header('Location:index.php');
  };

  require_once 'views/ventajas.view.php';

 ?>