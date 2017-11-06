<?php
function convierteaFechaBD ($dato) {
	
	$anio_bd = substr($dato, 6);
    $mes_bd = substr($dato, 3, -5);
    $dia_bd = substr($dato, 0, -8);

    $fecha_BD = $anio_bd . '-' . $mes_bd . '-' . $dia_bd;

    return $fecha_BD;
}
?>