
/* --- ////// CAPTURAR ELEMENTOS DEL DOM ////// --- */

const cuerpoCarrito=document.querySelector('#tablaCarrito tbody');
const listaProductos=document.querySelector('#listaProductos');

/* --- ////// EVENTOS ////// --- */

document.addEventListener('DOMContentLoaded',()=>{

  document.addEventListener('click',(ev)=>{
    // Añade el producto al clicar el icono del carrito:
    if(ev.target.closest('.btnAniadir')){  
      const producto=ev.target.dataset.id;
      getInfoProducto(producto);
      mostrarProductosCarrito();
    };

    // Quita un producto al clicar el icono '-' de la tabla carrito:
    if(ev.target.classList.contains('btnRestar')){   
      const id=ev.target.dataset.id;
      restarProductoCarrito(id);
      aniadirAlLocalStorage();
      mostrarProductosCarrito();

    };
    // Añade un producto al clicar el icono '+' de la tabla carrito:
    if(ev.target.classList.contains('btnSumar')){  
      const id=ev.target.dataset.id;
      sumarProductoCarrito(id);
      aniadirAlLocalStorage();
      mostrarProductosCarrito();
    };

    // Elimina el producto de la tabla carrito:
    if(ev.target.classList.contains('btnEliminar')){
      const id=ev.target.dataset.id;
      eliminarProductoCarrito(id);
    };
    
    // Vacía el carrito:
    if(ev.target.matches('#btnVaciarCarrito')) vaciarCarrito();

  });

  aniadirActive();
  mostrarProductosCarrito(cuerpoCarrito);
	
}); //LOAD

