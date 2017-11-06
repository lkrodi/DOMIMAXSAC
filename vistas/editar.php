<?php

require 'header.php';
include_once '../Modelos/VehiculosData.php';
require '../files/errores.php';
include '../files/fechaBD.php';
include '../files/fechaWeb.php';

//Guarda en un arreglo temporal la lista del registro otn a editar
$datoOTN = $_GET['txtId'];
$OBtraerDatos = new VehiculosData();
$datosAct = $OBtraerDatos -> listaRegistroIndividual($datoOTN);

if(isset($_POST['btnActualizar']))
{
  //Agrupa el otn a editar y comprueba si es igual al recogido de la BD
  $otn_editar = $_POST['txtOTN'];
  $otn_actual = $datosAct[0]['otn'];
  $conteoRegistros = $OBtraerDatos ->contarRegistrosOTN();
  $conteoTotal = $conteoRegistros[0]['COUNT(otn)'];

  //Valida si son iguales el otn del get y de la BD
  if(is_numeric($otn_editar) && $otn_editar == $otn_actual)
  {
	//Valida el kilemtraje 
  	$txtKilometraje = $_POST['txtKilometraje'];
  	if(strlen($txtKilometraje) > 0 && strlen($txtKilometraje) <= 8){
		
		//Valida los DNI´s
  		$txtDNIRecepcion = $_POST['txtDNIRecepcion'];
		$txtDNIEntrega = $_POST['txtDNIEntrega'];

  		if(is_numeric($txtDNIRecepcion) && is_numeric($txtDNIRecepcion) && (strlen($txtDNIRecepcion) == 8 && strlen($txtDNIEntrega) == 8))
  		{
			//Prepara la data a actualizar
			$_POST['txtFechaActual'] = convierteaFechaBD($_POST['txtFechaActual']);
			$datos = array(
			$_POST['txtHoraInicio'],
			$_POST['txtHoraTermino'],
			$_POST['txtFechaActual'],
			$_POST['txtTipoMantenimiento'],
			$_POST['txtMarca'],
			$_POST['txtPlaca'],
			$_POST['txtModeloVehiculo'],
			$_POST['txtModeloCarroceria'],
			$_POST['txtColorVehiculo'],
			$_POST['txtKilometraje'],
			$_POST['txtSede'],
			$_POST['txtDescripcionTRDV'],
			$_POST['txtDescripcionTR'],
			$_POST['txtDescripcionRAU'],
			$_POST['txtDescripcionST'],
			$_POST['txtObservacionesGenerales'],
			$_POST['txtNombreRecepcion'],
			$_POST['txtDNIRecepcion'],
			$_POST['txtNombreEntrega'],
			$_POST['txtDNIEntrega']
			);

			$actualizacion = $OBtraerDatos -> actualizaRegistro($datos, $otn_editar);

			if ($OBtraerDatos -> codigo_retorno = '00') {
				print $editar_ok;
				print $regresar_inicio;
			}
			else {
				print $errores_editar['err_actualizar'];
				print $regresar;
			}
  		}
  		else {
  			print $errores_editar['err_dni_s'];
        	print $regresar;
  		}
  	}
  	else {
  		print $errores_editar['err_kilometraje'];
  		print $regresar;
  	}
  }
  else {
  	print $errores_editar['err_otn_diferentes'];
  	print $regresar;
  }
}
?>
<div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <form role="form" action="" method="post">
                        <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #D9B82F; color: #fff; text-align:center;">
					    			<p style="text-align:center; "><H1>-DETALLE DE REGISTRO-</H1></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-4">
					    		<label for="form-control">OT-N°</label>
					      		<input type="text" name="txtOTN" class="form-control" maxlength="8" value="<?php echo $datosAct[0]['otn'];?>">
					    	</div>
					    	<div class="col-md-4">
					    		<label for="form-control">Hora de Inicio</label>
					      		<input name="txtHoraInicio" type="text" class="form-control" maxlength="13" value="<?php print $datosAct[0]['hora_inicio'];?>">
					    	</div>
					    	<div class="col-md-4">
					    		<label for="form-control">Hora de Término</label>
					      		<input name="txtHoraTermino" type="text" class="form-control" maxlength="13" value="<?php print $datosAct[0]['hora_termino'];?>">
					    	</div>
					    </div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-4">
					    		<label for="form-control">Fecha del ingreso</label>
					      		<input name="txtFechaActual" type="text" id="txtFechaActual" class="form-control" maxlength="10" value="<?php print convierteaFechaWeb($datosAct[0]['fecha_dv']);?>">
					    	</div>
					    	<div class="col-md-8">
					    		<label for="form-control">Tipo de Mantenimiento</label>
					      		<input name="txtTipoMantenimiento" type="text" id="txtTipoMantenimiento" class="form-control" maxlength="30" value="<?php print $datosAct[0]['tipomantenimiento_dv'];?>">
					    	</div>
					    </div>
					    </div>
					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #D9B82F; color: #fff; text-align: center;">
					    			<p><H2>DATOS DE VEHÍCULO</H2></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-3">
					    		<label for="form-control">Marca</label>
					      		<input type="text" name="txtMarca" class="form-control" maxlength="40" value="<?php print $datosAct[0]['marca_dv'];?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">Placa</label>
					      		<input type="text" name="txtPlaca" class="form-control" maxlength="7" value="<?php print $datosAct[0]['placa_dv'];?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">Modelo  de vehículo</label>
					      		<input type="text" name="txtModeloVehiculo" class="form-control" maxlength="30" value="<?php print $datosAct[0]['modelovehiculo_dv'];?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">Modelo de carrocería</label>
					      		<input type="text" name="txtModeloCarroceria" class="form-control" maxlength="30" value="<?php print $datosAct[0]['modelocarroceria_dv'];?>">
					    	</div>
					    </div>
					    </div>
					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-4">
									<label for="form-control">Color de Vehículo</label>
									<input type="text" name="txtColorVehiculo" class="form-control" maxlength="30" value="<?php print $datosAct[0]['color_dv'];?>">
					    		</div>
					    		<div class="col-md-4">
									<label for="form-control">Kilometraje</label>
									<input type="text" name="txtKilometraje" class="form-control" maxlength="8" value="<?php print $datosAct[0]['kilometraje_dv'];?>">
					    		</div>
					    		<div class="col-md-4">
					    			<label for="form-control">Sede</label>
					    			<br>
					    			<select class="selectpicker" class="form-control" name="txtSede">
					    			<!--Aqui va el value de la sede abajo-->
									  <option value="<?php print $datosAct[0]['sede_dv'];?>"><?php print $datosAct[0]['sede_dv'];?></option>
									</select>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-12">
					    		<label for="form-control">DESCRIPCIÓN DE TRABAJOS REALIZADOS</label><!--esta descripcion pertenece a del titulo "DATOS DEL VEHICULO"-->
					      		<textarea class="form-control" rows="3" name="txtDescripcionTRDV"><?php print $datosAct[0]['descripcion_dv']; ?></textarea>
					    	</div>
					    </div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #D9B82F; color: #fff; text-align: center;">
					    			<p><H2>TRABAJOS REALIZADOS</H2></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
						    <div class="row">
						    	<div class="col-md-12">
						    		<label for="form-control">DESCRIPCIÓN </label><!--esta descripcion pertenece a del titulo "TRABAJOS REALIZADOS"-->
						      		<textarea class="form-control" rows="3" name="txtDescripcionTR"><?php print $datosAct[0]['descripcion_tr']; ?></textarea>
						    	</div>
						    </div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #D9B82F; color: #fff; text-align: center;">
					    			<p><H2>REPUESTOS Y ACCESORIOS UTILIZADOS</H2></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
						    <div class="row">
						    	<div class="col-md-12">
						    		<label for="form-control">DESCRIPCIÓN </label><!--esta descripcion pertenece a del titulo "REPUESTOS Y ACCESORIOS UTILIZADOS"-->
						      		<textarea class="form-control" rows="3" name="txtDescripcionRAU"> <?php print $datosAct[0]['descripcion_rau']; ?></textarea>
						    	</div>
						    </div>
					    </div>

					     <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #D9B82F; color: #fff; text-align: center;">
					    			<p><H2>SERVICIOS DE TERCEROS</H2></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-12">
					    		<label for="form-control">DESCRIPCIÓN </label><!--esta descripcion pertenece a del titulo "SERVICIOS DE TERCEROS"-->
					      		<textarea class="form-control" rows="3" name="txtDescripcionST"> <?php print $datosAct[0]['descripcion_st']; ?></textarea>
					    	</div>
					    </div>
					    </div>
					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #D9B82F; color: #fff; text-align: center;">
					    			<p><H2>OBSERVACIONES</H2></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-12">
					      		<textarea class="form-control" rows="3" name="txtObservacionesGenerales"><?php print $datosAct[0]['observacionesgenerales']; ?></textarea>
					    	</div>
					    </div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #D9B82F; color: #fff; text-align: center;">
					    			<p><H2>RECEPCIÓN DE VEHÍCULO</H2></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-6">
					    		<label for="form-control">NOMBRE</label>
					      		<input type="text" name="txtNombreRecepcion" class="form-control" maxlength="40" value="<?php print $datosAct[0]['nombre_rv']; ?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">DNI</label>
					      		<input type="text" name="txtDNIRecepcion" class="form-control" maxlength="8"  value="<?php print $datosAct[0]['dni_rv']; ?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">FIRMA</label>
					      		<textarea class="form-control" rows="2" name="txtFirmaRecepcion" ></textarea>
					    	</div>

					    </div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #D9B82F; color: #fff; text-align: center;">
					    			<p><H2>ENTREGA DE VEHÍCULO</H2></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-6">
					    		<label for="form-control">NOMBRE</label>
					      		<input type="text" name="txtNombreEntrega" class="form-control" maxlength="40"  value="<?php print $datosAct[0]['nombre_ev']; ?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">DNI</label>
					      		<input type="text" name="txtDNIEntrega" class="form-control" maxlength="8"  value="<?php print $datosAct[0]['dni_ev']; ?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">FIRMA</label>
					      		<textarea class="form-control" rows="2" name="txtFirmaEntrega"></textarea>
					    	</div>

					    </div>
					    </div> <br><br>
					    <button type="submit" class="btn-lg btn-primary" name="btnActualizar">&nbsp;&nbsp;&nbsp;ACTUALIZAR&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
              <a href="listado.php" class="btn-lg btn-danger">&nbsp;&nbsp;&nbsp;CANCELAR&nbsp;&nbsp;&nbsp;</a>
					    <hr>
					    <a href="proforma.php?txtId=<?php echo $datosAct[0]['otn']; ?>" class="btn-lg btn-info">&nbsp;&nbsp;&nbsp;GENERAR PROFORMA&nbsp;&nbsp;&nbsp;</a>
					</form>
                    </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
<?php
require 'footer.php';
?>