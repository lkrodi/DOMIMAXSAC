<?php

function convierteaFechaWeb ($dato) {
	
  $dia_web = substr($dato, 8);
  $mes_web = substr($dato, 5, -3);
  $anio_web = substr($dato, 0, -6);

  $fecha_web= $dia_web. '/' .$mes_web. '/' .$anio_web;

  return $fecha_web; 
}

?>