<?php 

	$contenido = $_REQUEST['contenido'];
	$conexion = new PDO("mysql:host=localhost;dbname=wysiwyg","root","");
	$stmt=$conexion->prepare("INSERT INTO prueba(contenido) VALUES (:contenido)");
	$stmt->execute([
		':contenido'=>$contenido
	]);




 ?>