
/* --- ////// CAPTURAR ELEMENTOS DEL DOM ////// --- */

const liCarrito=document.querySelector('#liCarrito');
const cuerpoTablaComprar=document.querySelector('#cuerpoTablaComprar');
const cajaTotal=document.querySelector('#cajaTotal');
const btnFinalizarCompra=document.querySelector('btnFinalizarCompra');


/* --- ////// EVENTOS ////// --- */

document.addEventListener('DOMContentLoaded',()=>{
  // Hacer desaparecer el icono del carrito:
	liCarrito.style.display='none'; 
    
  document.addEventListener('click',(ev)=>{
    // Quita un producto al clicar el icono '-' de la tabla carrito:
    if(ev.target.classList.contains('btnRestar')){   
      const id=ev.target.dataset.id;
      restarProductoCarrito(id);
      aniadirAlLocalStorage();
      mostrarProductosCarrito(cuerpoTablaComprar);
    };

    // Añade un producto al clicar el icono '+' de la tabla carrito:
    if(ev.target.classList.contains('btnSumar')){  
      const id=ev.target.dataset.id;
      sumarProductoCarrito(id);
      aniadirAlLocalStorage();
      mostrarProductosCarrito(cuerpoTablaComprar);
    };

    // Elimina el producto de la tabla carrito:
    if(ev.target.classList.contains('btnEliminar')){
  	  const id=ev.target.dataset.id;
  	  eliminarProductoCarrito(id);
  	  pintarTotal();
    };
  });

  mostrarProductosCarrito(cuerpoTablaComprar);
  pintarTotal();

}); // LOAD