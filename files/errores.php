<?php

$errores_listado = array
(
	'err_otn' => '<script>alert("Error, el OTN es incorrecto.");</script>',
	'err_server' => '<script>alert("Lo sentimos, tenemos problemas con el servidor.");</script>',
	'err_buscar_placa' => '<script>alert("Lo sentimos, no existen registros de dicha Placa.");</script>',
	'err_placa_incorrecta' => '<script>alert("Error, La placa ingresada es incorrecta.");</script>'

);

$errores_editar = array
(
'err_otn_diferentes' => '<script>alert("Error, no puedes modificar el OTN.");</script>',
'err_kilometraje' => '<script>alert("Error, El kilometraje debe ser un número menor a 8 dígitos. No coloques letras.");</script>',
'err_dni_s' => '<script>alert("Error, El DNI solo puede contener números.");</script>',
'err_actualizar' => '<script>alert("Lo sentimos, no se puede actualizar");</script>'
);

$errores_agregar = $errores_editar;
$errores_agregar_adicional = '<script>alert("Lo sentimos, no se puede agregar el registro .Tenemos problemas con el servidor.");</script>';
$ok_agregar = '<script>alert("Se agrego el registro exitosamente!");</script>';
$regresar = '<script>window.history.back();</script>';
$editar_ok = '<script>alert("Se actualizó el registro exitosamente!");</script>';
$regresar_inicio = '<script>window.location.href="listado.php";</script>';
$error_busqueda_fecha = '<script>alert("No se encontraron registros de dichas fechas");</script>';
$eliminado_ok = '<script>alert("Se elimino correctamente el registro.");</script>';
$eliminado_error = '<script>alert("No se puede eliminar el registro porque tiene asociada una factura. Error.");</script>';
$eliminado_oksi = '<script>window.location.href="../vistas/listado.php";</script>';
$error_proforma = '<script>alert("Búsqueda errónea. Recuerda colocar al comienzo la letra P si es por número de proforma")</script>';
$error_limite = '<script>alert("Error, el limite es incorrecto");</script>';

?>
