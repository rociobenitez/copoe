<?php session_start();

// Importar las funciones
require_once 'admin/functions.php';

$mensaje='';

if(isset($_GET['busqueda'])){
  $busqueda=$sanear($_GET['busqueda']);
  if(!empty($busqueda)){
  	$articulos=$buscarArticulos($front_config['numEntradas'],'articulos',$busqueda);
  	$total=count($articulos);
  	if(!$articulos){
  	  $mensaje="No hay coincidencia con el término $busqueda";
  	}else{
      if($total==1){
        $mensaje="Hay <span class='fs-5 mx-2 turquesa'>$total</span> coincidencia con el término <em>$busqueda</em>";
      }else{
        $mensaje="Hay <span class='fs-5 mx-2 turquesa'>$total</span> coincidencias con el término <em>$busqueda</em>";
      }; 
  	};
  };
};

require_once 'views/buscar.view.php';

 ?>