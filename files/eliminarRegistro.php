<?php

require_once '../modelos/VehiculosData.php';
include_once 'errores.php';

$id = $_GET['txtId'];

$OBeliminar = new VehiculosData();
$OBeliminar -> eliminarRegistro($id);

if($OBeliminar->codigo_retorno == '00') {
  print $eliminado_ok;
  print $eliminado_oksi;
}
else {
  print $eliminado_error;
  print $regresar;
}

 ?>
