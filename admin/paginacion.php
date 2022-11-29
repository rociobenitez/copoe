
<nav aria-label="...">
  <ul class="pagination justify-content-end">
    <li class="page-item <?php echo $paginaActual()<=1 ? 'disable' : false ?>">
      <a class="page-link azuloscuro" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$paginaActual()-1 ?>">Anterior</a>
    </li>

    <?php for ($i=1; $i <= $totalPaginas; $i++): // cantidad de vueltas concreta (numero de páginas) ?>   
 	  <li class="page-item <?php echo $paginaActual()==$i ? 'active' : false ?>" aria-current="page">
      <a class="page-link turquesa" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$i ?>"><?php echo $i ?></a>
	  </li>   	
    <?php endfor; ?>

    <li class="page-item <?php echo $paginaActual()>= $totalPaginas ? 'disable' : false ?>">
      <a class="page-link azuloscuro" href="<?php echo $_SERVER['PHP_SELF'].'?p='.$paginaActual()+1 ?>">Siguiente</a>
    </li>
  </ul>
</nav>