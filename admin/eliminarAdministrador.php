<?php session_start();

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

$eliminarArticulo($id,'usuarios_admin');
header('Location:administradores.php');

 ?>