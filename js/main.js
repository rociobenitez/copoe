'use strict'

/* ///////// CAPTURAR ELEMENTOS DEL DOM Y 'OBJETOS PARA PINTAR' ///////// */

	const header=document.querySelector('header');

	// Elementos para asignar la clase active a los enlaces del menú
	const paginaActiva=window.location.pathname;
	const navLinks=document.querySelectorAll('nav a');
		
	// Elementos carrito:
	const carrito=document.querySelector('#carrito');  // capturar el elemento del DOM
  let arrayCarrito=JSON.parse(localStorage.getItem('productos')) || [] ;
  let arrayProductos=[];
  const divisa='€';


/* ///////// EVENTOS ///////// */

// Cambia el fondo del menú principal al hacer scroll:
document.addEventListener('scroll',()=>{
  header.classList.toggle('down',window.scrollY>0);
});

// Muestra la tabla del carrito al clicar el botón de la cesta de la compra:
document.addEventListener('click',(ev)=>{
  if(ev.target.matches('#carritoIcon')) mostrarTablaCarrito();
});

  
/* ///////// FUNCIONES ///////// */  

// Añade la clase 'active' a los enlaces del menú 
const aniadirActive=()=>{
	navLinks.forEach(link=>{
		if(link.href.includes(`${paginaActiva}`)){
			link.classList.add('active','turquesa');
			if(link.href.includes('registro.php')){   // desaparece el botón de 'Asociarme' al entrar en la página de registro
				link.classList.add('visually-hidden');  // el botón se oculta visualmente
			}
			if(link.href.includes('login.php')){   // desaparece el botón de 'Iniciar sesión' al entrar en la página de registro
				link.classList.add('visually-hidden');  // el botón se oculta visualmente
			}
			if(link.href.includes('singleProducto.php')){
				$paginaActive=='tienda-registrados.php';
			};
		}
	});
};

// Muestra y oculta la tabla del carrito
const mostrarTablaCarrito=()=>{
  carrito.classList.toggle('d-none');
};

// Recoge los datos de la BBDD a través de la API
const getDatos=async()=>{ 
  try{
		const respuesta=await fetch('http://localhost:8888/copoe/api/');
		// Comprobar que la petición es correcta
		if(respuesta.ok){                            // si la respuesta es 'true' devuelve la respuesta json
		  let respuestaJson=await respuesta.json();  // para extraer el contenido en el cuerpo del JSON desde la respuesta
		  arrayProductos=respuestaJson;              // recoge la respuesta json
		  if(listaProductos!=null){
		  	listaProductos.append(pintarProductos(arrayProductos));
		  };
		}else{
		  throw{
		  	status:respuesta.status,
		  	mensaje: 'No hay productos'  // se envía al catch
		  } 
		};
  }catch(error){
		const mensajeError=error.estatus + ' - ' + error.mensaje;
  };
};

// Crear un fragmento con los productos para después 'pintarlos' en la invocación
const pintarProductos=(array)=>{  // array=arrayProductos
	const fragment=document.createDocumentFragment();
	array.forEach((item,index)=>{
		const {id,nombre,descripcion,precio,imagen}=item;
		const card=document.createElement('DIV');
			card.classList.add('card','col-xxl-2','col-lg-3','col-md-4','col-sm-6','p-2');
		const img=document.createElement('IMG');
			img.classList.add('imgProducto','mx-auto','mt-3','mb-1');
			img.src=`img/tienda/${imagen}`;
			img.alt=nombre;
		const body=document.createElement('DIV');
			body.classList.add('card-body','d-grid');
		const title=document.createElement('H2');
			title.classList.add('card-title','nombreProducto','fs-6');
			title.textContent=nombre;
		const price=document.createElement('P');
			price.classList.add('card-text');
			price.innerHTML=`Precio: <span class="precio turquesa">${precio} ${divisa}</span></p>`;
		const boton=document.createElement('BUTTON');
			boton.type='button';
			boton.setAttribute('data-id',index);
			boton.textContent='Comprar';
			boton.classList.add('btn','btn-1','btn-sm','btnAniadir','ms-auto','mt-auto');

		body.append(title,price,boton);
		card.append(img,body);
		fragment.append(card);
	});
	return fragment;
};

/* Añade un objeto a un nuevo array con los datos del producto
que se ha clicado para más tarde pintarlos en el carrito: */
const getInfoProducto=(producto)=>{   // recoge el id del producto
  console.log('entra getInfoProducto');
  let {nombre,precio,imagen,cantidad}=arrayProductos[producto];
  const objProducto={
		id:producto,
		nombre,          // equivale a nombre:nombre
		precio,          // equivale a precio:precio
		imagen,          // equivale a imagen:imagen
		cantidad,     	 // equivale a cantidad:cantidad
		subtotal:(precio*cantidad).toFixed(2)
  };

  const existe=arrayCarrito.some((producto)=>producto.id==objProducto.id);

  if(existe){
		arrayCarrito.map((producto)=>{
		  if(producto.id==objProducto.id){
			//producto.cantidad++;
			//producto.subtotal=producto.cantidad*producto.precio;
			sumarProductoCarrito(objProducto.id);
			return producto;
		  };
		});
  }else{
		arrayCarrito.push(objProducto);
  };

  aniadirAlLocalStorage();
};

const aniadirAlLocalStorage=()=>{
  localStorage.setItem('productos',JSON.stringify(arrayCarrito));  // convertir en string
};

const recogerDelLocalStorage=()=>{
  const datos=JSON.parse(localStorage.getItem('productos')) || [] ;  // pasar a obj JSON
  return datos;
};

/* Muestra los productos de la cesta en la tabla carrito.
Se deberá invocar cada vez que cambie el array carrito: */
const mostrarProductosCarrito=(donde=cuerpoCarrito)=>{
  limpiarCarrito(donde);
  arrayCarrito=recogerDelLocalStorage();
  const fragment=document.createDocumentFragment();
  
  arrayCarrito.forEach((item)=>{
		const{id,nombre,precio,imagen,cantidad,subtotal}=item;
		const fila=document.createElement('TR');
		const col1=document.createElement('TD');
		  col1.innerHTML=`<img src="img/tienda/${imagen}" alt="${nombre}">`;
		const col2=document.createElement('TD');
		  col2.textContent=`${nombre}`;
		const col3=document.createElement('TD');
		  col3.textContent=`${precio}`;
		const col4=document.createElement('TD');
		  col4.innerHTML=`<i class="bi bi-dash-circle-fill btnRestar mx-1" data-id="${id}"></i>
		  ${cantidad}<i class="bi bi-plus-circle-fill btnSumar mx-1" data-id="${id}"></i>`;
		const col5=document.createElement('TD');
		  col5.textContent=`${subtotal}`;
		const col6=document.createElement('TD');
		  col6.innerHTML=`<i class="bi bi-x-circle-fill btnEliminar" data-id="${id}"></i>`;

		fila.append(col1,col2,col3,col4,col5,col6);
		fragment.append(fila);
  });

  donde.append(fragment);
};

// Limpia el carrito: 
const limpiarCarrito=(donde=cuerpoCarrito)=>{
  while(donde.firstChild){
		donde.removeChild(donde.firstChild);
  };	
};

// Sumar productos del carrito:
const sumarProductoCarrito=(id)=>{
	const posicionArray=arrayCarrito.findIndex((producto)=>producto.id===id);
	const producto=arrayCarrito[posicionArray];
	producto.cantidad++;
	producto.subtotal=producto.precio*producto.cantidad;
};

// Restar productos del carrito:
const restarProductoCarrito=(id)=>{
	const posicionArray=arrayCarrito.findIndex((producto)=>producto.id===id);
	const producto=arrayCarrito[posicionArray];
	producto.cantidad--;
	producto.subtotal=producto.precio*producto.cantidad;
	// si la cantidad es 0 (no hay producto), que desaparezca de la tabla:
	if(producto.cantidad===0){        
		eliminarProductoCarrito(id);
	};
};

// Elimina los productos del carrito:
const eliminarProductoCarrito=(id)=>{
  const posicionArray=arrayCarrito.findIndex((producto)=>producto.id===id);
  arrayCarrito.splice(posicionArray,1);
  aniadirAlLocalStorage();    // cada vez que se modifica un producto, se resetea el carrito
  mostrarProductosCarrito();
};

// Vacía el carrito:
const vaciarCarrito=()=>{
  limpiarCarrito();
  localStorage.removeItem('productos');
  mostrarProductosCarrito();
};

// Calcula el precio final:
const calcularTotal=()=>{
  let precioFinal=0;            // se inicializa a 0 para que pueda se pueda sumar
  arrayCarrito.forEach(item=>{
		precioFinal+=item.subtotal;
  });
  return precioFinal;
};

// Mostrar el total:
const pintarTotal=()=>{
  cajaTotal.innerHTML=`<input type="hidden" name="total" 
  			value="<?php echo ${calcularTotal()} ?>"> ${calcularTotal()}€`;
};


aniadirActive();
getDatos();
