<?php session_start();

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$id=$obtenerId();

if(!$id){
  header('Location:cuentas.php');
};

$eliminarArticulo($id,'cuentas');
header('Location:cuentas.php');


 ?>