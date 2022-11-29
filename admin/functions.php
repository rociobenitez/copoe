<?php // Se requieren los dos archivos de 'config':
  require_once 'configDB.php';
  require_once 'config.php';

  // Heredar la conexión:
  $conexion=function($config='admin') use($dsn,$user,$pass,$url){  
  	try{                                 // si todo va bien:
  	  return new PDO($dsn,$user,$pass);
  	}catch(PDOException $e){             // si algo va mal (recoge el error); la variable error va a ser de tipo PDOException:
      if($config=='front'){
        header("Location:$url/".$front_config['rutaErrores'].'?error='.$e->getCode());
        //'http://localhost/proyecto/error.php?error=1045'
      }elseif($config=='admin'){
        header("Location:$url/".$admin_config['rutaErrores'].'?error='.$e->getCode());
        //'http://localhost/proyecto/error.php?error=1045'
      };
  	};
  };

  // Sanear los datos que se pasen por parámetro:
  $sanear=function($dato){
    $dato=trim($dato);
    $dato=htmlspecialchars($dato);
    $dato=stripslashes($dato);
    return $dato;   // devuelve el dato saneado
  };

  // Quitar o eliminar acentos/tildes:
  $eliminarTildes=function($cadena){
    // Codificamos la cadena en formato utf8 en caso de que nos de errores
    $cadena = utf8_encode($cadena);
    // Ahora reemplazamos las letras
    $cadena = str_replace(array('á','à','ä','â','ª','Á','À','Â','Ä','Ã'),array('a','a','a','a','a','A','A','A','A','A'),$cadena);
    $cadena = str_replace(array('é','è','ë','ê','É','È','Ê','Ë'),array('e','e','e','e','E','E','E','E'),$cadena);
    $cadena = str_replace(array('í','ì','ï','î','Í','Ì','Ï','Î'),array('i','i','i','i','I','I','I','I'),$cadena);
    $cadena = str_replace(array('ó','ò','ö','ô','Ó','Ò','Ö','Ô'),array('o','o','o','o','O','O','O','O'),$cadena);
    $cadena = str_replace(array('ú','ù','ü','û','Ú','Ù','Û','Ü'),array('u','u','u','u','U','U','U','U'),$cadena);
    $cadena = str_replace(array('ñ','Ñ','ç','Ç'),array('n','N','c','C'),$cadena);
    $cadena = str_replace(array('¡','!'),array('',''),$cadena);  // eliminamos también símbolos de exclamación
    return $cadena;
  };

  // Saber la página actual:
  $paginaActual=function() use($sanear){
    return isset($_GET['p']) ? $sanear((int)$_GET['p']) : 1;  // sanear para que no se pueda inyectar código; variable 'p' de 'página'
  };  // se declara antes para que pueda utilizarse en la siguiente función

  // Recoger los registros de la base de datos:
  $recogerArticulos=function($numEntradas,$tabla) use($conexion,$paginaActual){
    $articuloInicial=$paginaActual()>1 ? $paginaActual()*$numEntradas-$numEntradas : 0; // si la página es 1 quiero que sea 0
    $stmt=$conexion()->prepare("SELECT * FROM $tabla LIMIT $articuloInicial,$numEntradas");  // preparar la consulta
    $stmt->execute();          // ejecutar la consulta
    return $stmt->fetchAll();  // recoge todos los registros
  };

  $recogerAsociados=function($cuenta,$tabla) use($conexion){          // Se utiliza la variable 'tabla' por si luego se reutilizara la función
    $stmt=$conexion()->prepare("SELECT * FROM $tabla WHERE id_cuenta=:id_cuenta");  // preparar la consulta
    $stmt->execute([
      ':id_cuenta'=>$cuenta
    ]);          // ejecutar la consulta
    return $stmt->fetchAll();  // recoge todos los registros
  };

  // Obtener artículos por su id:
  $obtenerId=function() use($sanear){
    return isset($_GET['id']) ? $sanear((int)$_GET['id']) : false;  // si está seteada, sanea y verifica que sea un entero; en caso contrario devuelve false
  };

  $obtenerPorId=function($id,$tabla) use($conexion){
    $stmt=$conexion()->prepare("SELECT * FROM $tabla WHERE id=:id LIMIT 1");  // preparar la consulta
    $stmt->execute([        // ejecutar la consulta
      ':id'=>$id
    ]);
    return $stmt->fetch();  // recoge solo el primer registro
  };

  $obtenerPorUsuario=function($usuario,$tabla) use($conexion){
    $stmt=$conexion()->prepare("SELECT * FROM $tabla WHERE usuario=:usuario LIMIT 1");  // preparar la consulta
    $stmt->execute([        // ejecutar la consulta
      ':usuario'=>$usuario
    ]);
    return $stmt->fetch();  // recoge solo el primer registro
  };

  // Total de Asociados Estudiante:
  $sumarRegistros=function($tabla,$filtro) use($conexion){
    $stmt=$conexion()->prepare("SELECT COUNT(*) FROM $tabla");  // preparar la consulta
    $stmt->execute();
    return $stmt->fetchAll();  // recoge solo el primer registro
  };
  
  // Subir los productos de la tienda a la Base de Datos - Crear la consulta sql:
  $subirProductos=function($nombre,$descripcion,$precio,$imagen,$id_categoria,$cantidad) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO productos(nombre,descripcion,precio,imagen,id_categoria,cantidad) VALUES(:nombre,:descripcion,:precio,:imagen,:categoria,:cantidad)");  // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':nombre'=>$nombre,
      ':descripcion'=>$descripcion,
      ':precio'=>$precio,
      ':imagen'=>$imagen,
      ':categoria'=>$id_categoria,
      ':cantidad'=>$cantidad
    ]);
  };

  // Subir los artículos del blog a la Base de Datos - Crear la consulta sql:
  $subirArticulos=function($titulo,$extracto,$descripcion,$id_categoria,$imagen) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO articulos(titulo,extracto,descripcion,id_categoria,imagen) VALUES(:titulo,:extracto,:descripcion,:categoria,:imagen)");  // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':titulo'=>$titulo,
      ':extracto'=>$extracto,
      ':descripcion'=>$descripcion,
      ':categoria'=>$id_categoria,
      ':imagen'=>$imagen
    ]);
  };

  // Subir ventajas a la Base de Datos - Crear la consulta sql:
  $subirVentajas=function($titulo,$descripcion,$icono,$imagen,$extracto,$boton,$enfasis,$url) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO ventajas(titulo,descripcion,icono,imagen,extracto,boton,enfasis,url) VALUES(:titulo,:descripcion,:icono,:imagen,:extracto,:boton,:enfasis,:url)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':titulo'=>$titulo,
      ':descripcion'=>$descripcion,
      ':icono'=>$icono,
      ':imagen'=>$imagen,
      ':extracto'=>$extracto,
      ':boton'=>$boton,
      ':enfasis'=>$enfasis,
      ':url'=>$url
    ]);
  };

  // Subir cursos a la Base de Datos - Crear la consulta sql:
  $subirCursos=function($titulo,$fecha,$lugar,$extracto,$descripcion,$id_modalidad,$id_categoria,$id_estado,$precio,$precio_asociado,$duracion,$direccion,$docentes,$plazas,$imagen) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO cursos(titulo,fecha,lugar,extracto,descripcion,id_modalidad,id_categoria,id_estado,precio,precio_asociado,duracion,direccion,docentes,plazas,imagen) VALUES(:titulo,:fecha,:lugar,:extracto,:descripcion,:modalidad,:categoria,:estado,:precio,:precio_asociado,:duracion,:direccion,:docentes,:plazas,:imagen)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':titulo'=>$titulo,
      ':fecha'=>$fecha,
      ':lugar'=>$lugar,
      ':extracto'=>$extracto,
      ':descripcion'=>$descripcion,
      ':modalidad'=>$id_modalidad,
      ':categoria'=>$id_categoria,
      ':estado'=>$id_estado,
      ':precio'=>$precio,
      ':precio_asociado'=>$precio_asociado,
      ':duracion'=>$duracion,
      ':direccion'=>$direccion,
      ':docentes'=>$docentes,
      ':plazas'=>$plazas,
      ':imagen'=>$imagen
    ]);
  };

  // Subir temática del curso solicitado a la Base de Datos - Crear la consulta sql:
  $subirCursoSolicitado=function($contenido) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO cursos_solicitados(contenido) VALUES(:contenido)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':contenido'=>$contenido
    ]);
  };

  // Subir cuentas a la Base de Datos - Crear la consulta sql:
  $subirCuentas=function($titulo,$precio,$descripcion) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO cuentas(titulo,precio,descripcion) VALUES(:titulo,:precio,:descripcion)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':titulo'=>$titulo,
      ':precio'=>$precio,
      ':descripcion'=>$descripcion
    ]);
  };

  // Subir categorias a la Base de Datos - Crear la consulta sql:
  $subirCategorias=function($categoria) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO categorias(categoria) VALUES(:categoria)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':categoria'=>$categoria
    ]);
  };

  // Subir estados a la Base de Datos - Crear la consulta sql:
  $subirEstados=function($estado) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO estados(estado) VALUES(:estado)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':estado'=>$estado
    ]);
  };

  // Subir modalidad a la Base de Datos - Crear la consulta sql:
  $subirModalidades=function($modalidad) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO modalidades(modalidad) VALUES(:modalidad)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':modalidad'=>$modalidad
    ]);
  };

  // Subir dudas frecuentes a la Base de Datos - Crear la consulta sql:
  $subirDudas=function($pregunta,$respuesta,) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO dudas(pregunta,respuesta) VALUES(:pregunta,:respuesta)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':pregunta'=>$pregunta,
      ':respuesta'=>$respuesta
    ]);
  };

  // Subir alumnos a la Base de Datos - Crear la consulta sql:
  $subirAlumnos=function($nombre,$apellidos,$num_colegiado,$email,$direccion,$cuentaBanco,$id_curso,$id_estado) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO alumnos(nombre,apellidos,num_colegiado,email,direccion,cuentaBanco,id_curso,id_estado) VALUES(:nombre,:apellidos,:colegiado,:email,:direccion,:cuenta,:curso,:estado)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':nombre'=>$nombre,
      ':apellidos'=>$apellidos,
      ':colegiado'=>$num_colegiado,
      ':email'=>$email,
      ':direccion'=>$direccion,
      ':cuenta'=>$cuentaBanco,
      ':curso'=>$id_curso,
      ':estado'=>$id_estado
    ]);
  };

  // Subir administradores a la Base de Datos - Crear la consulta sql:
  $subirAdministradores=function($usuario,$password) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO usuarios_admin(usuario,password) VALUES(:usuario,:password)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':usuario'=>$usuario,
      ':password'=>$password
    ]);
  };

  // Subir contactos del formulario a la Base de Datos - Crear la consulta sql:
  $subirContactos=function($nombre,$email,$telefono,$descripcion) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO usuarios_contact(nombre,email,telefono,descripcion) VALUES(:nombre,:email,:telefono,:descripcion)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':nombre'=>$nombre,
      ':email'=>$email,
      ':telefono'=>$telefono,
      ':descripcion'=>$descripcion
    ]);
  };

  // Subir asociados a la Base de Datos - Crear la consulta sql:
  $subirAsociados=function($usuario,$password,$email,$nombre,$apellidos,$direccion,$provincia,$id_cuenta) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO usuarios_asociados(usuario,password,email,nombre,apellidos,direccion,provincia,id_cuenta) VALUES(:usuario,:password,:email,:nombre,:apellidos,:direccion,:provincia,:cuenta)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':usuario'=>$usuario,
      ':password'=>$password,
      ':email'=>$email,
      ':nombre'=>$nombre,
      ':apellidos'=>$apellidos,
      ':direccion'=>$direccion,
      ':provincia'=>$provincia,
      ':cuenta'=>$id_cuenta
    ]);
  };

  // Subir servicio solicitado a la Base de Datos - Crear la consulta sql:
  $subirSolicitudServicio=function($id_servicio,$id_asociado) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO servicios_solicitados(id_servicio,id_asociado) VALUES(:id_servicio,:id_asociado)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id_servicio'=>$id_servicio,
      ':id_asociado'=>$id_asociado
    ]);
  };

  // Subir compra carrito a la Base de Datos - Crear la consulta sql:
  $subirCompra=function($id_asociado,$total) use($conexion){
    $stmt=$conexion()->prepare("INSERT INTO pedidos(id_asociado,total) VALUES(:id_asociado,:total)"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id_asociado'=>$id_asociado,
      ':total'=>$total
    ]);
  };


  // Editar productos
  $editarProductos=function($id,$nombre,$descripcion,$precio,$imagen,$id_categoria,$cantidad) use($conexion){
    $stmt=$conexion()->prepare("UPDATE productos SET nombre=:nombre,descripcion=:descripcion,precio=:precio,imagen=:imagen,id_categoria=:categoria,cantidad=:cantidad WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':nombre'=>$nombre,
      ':descripcion'=>$descripcion,
      ':precio'=>$precio,
      ':imagen'=>$imagen,
      ':categoria'=>$id_categoria,
      ':cantidad'=>$cantidad
    ]);
  };

  // Editar artículos
  $editarArticulos=function($id,$titulo,$extracto,$descripcion,$imagen,$id_categoria) use($conexion){
    $stmt=$conexion()->prepare("UPDATE articulos SET titulo=:titulo,extracto=:extracto,descripcion=:descripcion,imagen=:imagen,id_categoria=:categoria WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':titulo'=>$titulo,
      ':extracto'=>$extracto,
      ':descripcion'=>$descripcion,
      ':imagen'=>$imagen,
      ':categoria'=>$id_categoria
    ]);
  };

  // Editar ventajas
  $editarVentajas=function($id,$titulo,$descripcion,$icono,$imagen,$extracto,$boton,$enfasis,$url) use($conexion){
    $stmt=$conexion()->prepare("UPDATE ventajas SET titulo=:titulo,descripcion=:descripcion,icono=:icono,imagen=:imagen,extracto=:extracto,boton=:boton,enfasis=:enfasis,url=:url WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':titulo'=>$titulo,
      ':descripcion'=>$descripcion,
      ':icono'=>$icono,
      ':imagen'=>$imagen,
      ':extracto'=>$extracto,
      ':boton'=>$boton,
      ':enfasis'=>$enfasis,
      ':url'=>$url
    ]);
  };

  // Editar cursos
  $editarCursos=function($id,$titulo,$fecha,$lugar,$extracto,$descripcion,$id_modalidad,$id_categoria,$id_estado,$precio,$precio_asociado,$duracion,$direccion,$docentes,$plazas,$imagen) use($conexion){
    $stmt=$conexion()->prepare("UPDATE cursos SET titulo=:titulo,fecha=:fecha,lugar=:lugar,extracto=:extracto,descripcion=:descripcion,id_modalidad=:modalidad,id_categoria=:categoria,id_estado=:estado,precio=:precio,precio_asociado=:precio_asociado,duracion=:duracion,direccion=:direccion,docentes=:docentes,plazas=:plazas,imagen=:imagen WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':titulo'=>$titulo,
      ':fecha'=>$fecha,
      ':lugar'=>$lugar,
      ':extracto'=>$extracto,
      ':descripcion'=>$descripcion,
      ':modalidad'=>$id_modalidad,
      ':categoria'=>$id_categoria,
      ':estado'=>$id_estado,
      ':precio'=>$precio,
      ':precio_asociado'=>$precio_asociado,
      ':duracion'=>$duracion,
      ':direccion'=>$direccion,
      ':docentes'=>$docentes,
      ':plazas'=>$plazas,
      ':imagen'=>$imagen
    ]);
  };

  // Editar cuentas
  $editarCuentas=function($id,$titulo,$precio,$descripcion) use($conexion){
    $stmt=$conexion()->prepare("UPDATE cuentas SET titulo=:titulo,precio=:precio,descripcion=:descripcion  WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':titulo'=>$titulo,
      ':precio'=>$precio,
      ':descripcion'=>$descripcion
    ]);
  };

  // Editar dudas
  $editarDudas=function($id,$pregunta,$respuesta) use($conexion){
    $stmt=$conexion()->prepare("UPDATE dudas SET pregunta=:pregunta, respuesta=:respuesta WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':pregunta'=>$pregunta,
      ':respuesta'=>$respuesta
    ]);
  };

  // Editar categorias
  $editarCategorias=function($id,$categoria) use($conexion){
    $stmt=$conexion()->prepare("UPDATE categorias SET categoria=:categoria WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':categoria'=>$categoria
    ]);
  };

  // Editar estados
  $editarEstados=function($id,$estado) use($conexion){
    $stmt=$conexion()->prepare("UPDATE estados SET estado=:estado WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':estado'=>$estado
    ]);
  };

  // Editar estados
  $editarModalidades=function($id,$modalidad) use($conexion){
    $stmt=$conexion()->prepare("UPDATE modalidades SET modalidad=:modalidad WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':modalidad'=>$modalidad
    ]);
  };

  // Editar administradores
  $editarAdministradores=function($id,$usuario,$password) use($conexion){
    $stmt=$conexion()->prepare("UPDATE usuarios_admin SET usuario=:usuario, password=:password WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':usuario'=>$usuario,
      ':password'=>$password
    ]);
  };

  // Editar asociados
  $editarAsociados=function($id,$usuario,$password,$email,$nombre,$apellidos,$direccion,$provincia,$id_cuenta) use($conexion){
    $stmt=$conexion()->prepare("UPDATE usuarios_asociados SET usuario=:usuario, password=:password,email=:email,nombre=:nombre,apellidos=:apellidos,direccion=:direccion,provincia=:provincia,id_cuenta=:cuenta WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':usuario'=>$usuario,
      ':password'=>$password,
      ':email'=>$email,
      ':nombre'=>$nombre,
      ':apellidos'=>$apellidos,
      ':direccion'=>$direccion,
      ':provincia'=>$provincia,
      ':cuenta'=>$id_cuenta
    ]);
  };

  // Editar alumnos
  $editarAlumnos=function($id,$nombre,$apellidos,$num_colegiado,$email,$direccion,$cuentaBanco,$id_curso,$id_estado) use($conexion){
    $stmt=$conexion()->prepare("UPDATE alumnos SET nombre=:nombre,apellidos=:apellidos,num_colegiado=:colegiado,email=:email,direccion=:direccion,cuentaBanco=:cuenta,id_curso=:curso,id_estado=:estado WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':nombre'=>$nombre,
      ':apellidos'=>$apellidos,
      ':colegiado'=>$num_colegiado,
      ':email'=>$email,
      ':direccion'=>$direccion,
      ':cuenta'=>$cuentaBanco,
      ':curso'=>$id_curso,
      ':estado'=>$id_estado
    ]);
  };

  // Editar contactos
  $editarContactos=function($id,$nombre,$email,$telefono,$descripcion) use($conexion){
    $stmt=$conexion()->prepare("UPDATE usuarios_contact SET nombre=:nombre,email=:email,telefono=:telefono,descripcion=:descripcion WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id,
      ':nombre'=>$nombre,
      ':email'=>$email,
      ':telefono'=>$telefono,
      ':descripcion'=>$descripcion
    ]);
  };

  // Eliminar artículos (para cualquier tabla)
  $eliminarArticulo=function($id,$tabla) use ($conexion){
    $stmt=$conexion()->prepare("DELETE FROM $tabla WHERE id=:id"); // preparar la consulta
    $stmt->execute([    // ejecutar la consulta
      ':id'=>$id
    ]);
  };

  //Buscador de Articulos:
  $buscarArticulos=function($numEntradas,$tabla,$busqueda) use($conexion){
    $stmt=$conexion()->prepare("SELECT * FROM $tabla WHERE titulo LIKE :busqueda OR descripcion LIKE :busqueda"); // preparar la consulta
    $stmt->execute([              // ejecutar la consulta
      ':busqueda'=>"%$busqueda%"  // % -> 'cualquier cosa que haya por delante y cualquier cosa que haya por detrás'
    ]);
    return $stmt->fetchAll();     // recoge todos los registros
  };

  //Buscador de Registros Tabla:
  $buscarRegistros=function($tabla,$busqueda) use($conexion){
    $stmt=$conexion()->prepare("SELECT * FROM $tabla WHERE nombre LIKE :busqueda OR apellidos LIKE :busqueda"); // preparar la consulta
    $stmt->execute([              // ejecutar la consulta
      ':busqueda'=>"%$busqueda%"  // % -> 'cualquier cosa que haya por delante y cualquier cosa que haya por detrás'
    ]);
    return $stmt->fetchAll();     // recoge todos los registros
  };

  //Buscador de Registros Tabla:
  $buscarContactos=function($busqueda) use($conexion){
    $stmt=$conexion()->prepare("SELECT * FROM usuarios_contact WHERE nombre LIKE :busqueda OR email LIKE :busqueda"); // preparar la consulta
    $stmt->execute([              // ejecutar la consulta
      ':busqueda'=>"%$busqueda%"  // % -> 'cualquier cosa que haya por delante y cualquier cosa que haya por detrás'
    ]);
    return $stmt->fetchAll();     // recoge todos los registros
  };

  // Saber el número de páginas para la paginación:
  $cantidadPaginas=function($numEntradas,$tabla) use($conexion){
    $stmt=$conexion()->prepare("SELECT COUNT(*) numFilas FROM $tabla"); // preparar la consulta
    $stmt->execute();                         // ejecutar la consulta
    $totalFilas=$stmt->fetch()['numFilas'];   // recoge solo el primero
    $totalPaginas=ceil($totalFilas/$numEntradas);
    return $totalPaginas;
  };




 ?>