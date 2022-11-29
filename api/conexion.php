<?php 

  /* Datos de la conexión a la Base de Datos phpMyAdmin: */
  $host='localhost';
  $dbName='copoe';
  $user='usuario_maniana';
  $pass='1234';

  $dsn="mysql:host=$host;dbname=$dbName;charset=utf8";

  $conexion=function() use($dsn,$user,$pass){
    try{
      return new PDO($dsn,$user,$pass);
    }catch(PDOException $e){
      echo $e->getMessage();
      return false;
    }
  };

 ?>