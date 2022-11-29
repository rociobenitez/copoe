<?php session_star();

// Importar las funciones:
require_once 'functions.php';

// Comprobar que hay sesión:
if(!isset($_SESSION['usuario'])){
  header('Location:../index.php');
};

$id=$obtenerId();

if(!$id){
  header('Location:index.php');
};

$eliminarArticulo($id,'estados');
header('Location:index.php');


 ?>