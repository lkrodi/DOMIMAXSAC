<?php
#Establece la zona horaria de Lima
date_default_timezone_set('America/Lima');

#Obtiene en un array asociativo el tiempo actual
$fecha = getDate();

#Configuración de la fecha y tiempo actual
$dia = (int)$fecha['mday'];
$mes = (string)$fecha['mon'];
$anio = (int)$fecha['year'];
$hora = (int)$fecha['hours'];
$minuto = (int)$fecha['minutes'];
$segundo = (int)$fecha['seconds'];

#Obteniendo las longitudes del tiempo actual
$long_hora = strlen($hora);
$long_minuto = strlen($minuto);
$long_segundo = strlen($segundo);

#Obteniendo la longitudes de la fecha
$long_mes = strlen($mes);
$long_dia = strlen($dia);

#Validaciones solo porque no coloca el "0" adelante en el mes ni dia.
if($long_mes == 1):
	$mes = '0' . $mes;
endif;
if($long_dia == 1):
	$dia = '0' . $dia;
endif;

#Validaciones solo porque el array no nos devuelve sin los "0"
if($long_hora == 1):
	$hora = '0' . $hora;
endif;
if($long_minuto == 1):
	$minuto = '0' . $minuto;
endif;
if($long_segundo == 1):
	$segundo = '0' . $segundo;
endif;

#Validación para colocar si está en en tiempo de mañana o noche.
if($hora >= 1 && $hora <= 11) {
	$hora_actual_v = $hora . ':' . $minuto . ":" . $segundo . " a.m.";
}
else if(($hora == 0 || $hora >= 12) && $hora <= 23) {
	$hora_actual_v = $hora . ':' . $minuto . ":" . $segundo . " p.m.";
}

#Esta es las variables globales de fecha actual y la hora.
$fecha_actual = (string) $dia . '/' . $mes . '/' . $anio;
$hora_actual = (string) $hora_actual_v;

 ?>
