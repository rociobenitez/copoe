'use strict'

/* ////// CAPTURAR ELEMENTOS DEL DOM ////// */

// Elementos para asignar la clase active a los enlaces del menú:
const paginaActiva=window.location.pathname;
const navLinks=document.querySelectorAll('nav a');

/* ////// EVENTOS ////// */

document.addEventListener('DOMContentLoaded',()=>{
	aniadirActive();
});

/* ////// FUNCIONES ////// */

// Añade la clase 'active' a los enlaces del menú 
const aniadirActive=()=>{
  navLinks.forEach(link=>{
	if(link.href.includes(`${paginaActiva}`)){
	  link.classList.add('active','turquesa');
	}
  });
};
