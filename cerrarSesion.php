<?php session_start();  // comprobar si la sesión está abierta

session_destroy();  // 'matar' la sesión

header('Location:index.php');  // redirigir a la página de index (al cerrar la sesión)

 ?>