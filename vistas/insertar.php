<?php

require 'header.php';
include_once '../Modelos/VehiculosData.php';
require '../files/errores.php';
include '../files/fechaBD.php';
include '../files/fechaWeb.php';
include_once '../files/calculaFecha.php';

//Obtiene el nuevo otn automatico
$OBinsertado = new VehiculosData();
$conteoRegistros = $OBinsertado ->contarRegistrosOTN();
$otnautomatico = $conteoRegistros[0]['COUNT(otn)'] + 1;

if (isset($_POST['btnAgregar'])) {
  $otn = $_POST['txtOTN'];

  //Valida si el otn agregado es igual al automatico
  if(is_numeric($otn) && $otn == $otnautomatico) {
    $km = $_POST['txtKilometraje'];

	//Valida el kilemtraje
    if(strlen($km) > 0 && strlen($km) <= 8) {
      $dnir = $_POST['txtDNIRecepcion'];
      $dnie = $_POST['txtDNIEntrega'];

	  //Valida los DNI´s
      if(is_numeric($dnir) && is_numeric($dnie) && (strlen($dnir) == 8 && strlen($dnie) == 8)) {
				
        $_POST['txtFechaActual'] = convierteaFechaBD($_POST['txtFechaActual']);
				
		//Al dejar en blanco la hora, el sistema lo pone automaticamente
		if($_POST['txtHoraTermino'] == '') {
          $_POST['txtHoraTermino']  = $hora_actual;
        }

		//Prepara data para el nuevo registro otn
        $datos = array(
          $_POST['txtOTN'],
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

        $OBinsertado->agregaRegistro($datos);

		if ($OBinsertado -> codigo_retorno = '00') {
		  //OTN registrado exitosamente, regresa al listado principal
          print $regresar_inicio;
        } 
        else {
          print $errores_agregar_adicional;
          print $regresar;
        }
      } 
      else {
        $errores_agregar['err_dni_s'];
        print $regresar;
      }
    } 
    else {
      $errores_agregar['err_kilometraje'];
      print $regresar;
    }
  } 
  else {
    print $errores_agregar['err_otn_diferentes'];
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
          <form role="form" name="form-agregar" action="" method="post">
                        <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #1aaabc; color: #fff; text-align:center;">
					    			<p style="text-align:center; "><H1>-ORDEN DE TRABAJO-</H1></p>
					    		</div>
					    	</div>
					    </div>

					    <div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="form-control">OT.N°</label>
											<input type="text" name="txtOTN" class="form-control" maxlength="10" value="<?php print $otnautomatico; ?>">
									</div>
									<div class="col-md-4">
										<label for="form-control">Hora de Inicio</label>
											<input name="txtHoraInicio" type="text" class="form-control" maxlength="13" placeholder="El formato es Hora:Minuto(00:00) a.m. o p.m.">
									</div>
									<div class="col-md-4">
										<label for="form-control">Hora de Término</label>
											<input name="txtHoraTermino" type="text" class="form-control" maxlength="13" placeholder="El formato es Hora:Minuto(00:00) a.m. o p.m." >
									</div>
								</div>
					    </div>

					    <div class="form-group">
								<div class="row">
									<div class="col-md-4">
										<label for="form-control">Fecha Actual</label>
											<input name="txtFechaActual" type="text" class="form-control" value="<?php print $fecha_actual;?>" maxlength="10" placeholder="El formato es Dia/Mes/Año(DD/MM/AAAA)">
									</div>
									<div class="col-md-8">
										<label for="form-control">Tipo de Mantenimiento</label>
											<input name="txtTipoMantenimiento" type="text" class="form-control">
									</div>
								</div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #1aaabc; color: #fff; text-align: center;">
					    			<p><H2>DATOS DE VEHÍCULO</H2></p>
					    		</div>
					    	</div>
					    </div>

					    <div class="form-group">
								<div class="row">
									<div class="col-md-3">
										<label for="form-control">Marca</label>
											<input type="text" name="txtMarca" class="form-control" maxlength="40">
									</div>
									<div class="col-md-3">
										<label for="form-control">Placa</label>
											<input type="text" name="txtPlaca" class="form-control" maxlength="7" placeholder="Ejemplo: B3Y-433">
									</div>
									<div class="col-md-3">
										<label for="form-control">Modelo  de vehículo</label>
											<input type="text" name="txtModeloVehiculo" class="form-control" maxlength="30">
									</div>
									<div class="col-md-3">
										<label for="form-control">Modelo de carrocería</label>
											<input type="text" name="txtModeloCarroceria" class="form-control" maxlength="30">
									</div>
								</div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-4">
										<label for="form-control">Color de Vehículo</label>
										<input type="text" name="txtColorVehiculo" class="form-control" maxlength="20">
					    		</div>
					    		<div class="col-md-4">
										<label for="form-control">Kilometraje</label>
										<input type="text" name="txtKilometraje" class="form-control" maxlength="8" placeholder="Solo ponga números">
					    		</div>
					    		<div class="col-md-4">
					    			<label for="form-control">Sede</label><br>
					    			<select class="selectpicker" class="form-control" name="txtSede">
											<option value="Lima Norte">Lima Norte</option>
											<option value="SJL">SJL</option>
											<option value="ATE">Ate</option>
											<option value="Callao">Callao</option>
										</select>
					    		</div>
					    	</div>
					    </div>

					    <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="form-control">DESCRIPCIÓN DE TRABAJOS REALIZADOS</label><!--esta descripcion pertenece a del titulo "DATOS DEL VEHICULO"-->
										<textarea name="txtDescripcionTRDV" class="form-control" rows="3" placeholder="Describe aquí los trabajos realizados en general"></textarea>
									</div>
								</div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #1aaabc; color: #fff; text-align: center;">
					    			<p><H2>TRABAJOS REALIZADOS</H2></p>
					    		</div>
					    	</div>
					    </div>

					    <div class="form-group">
						    <div class="row">
						    	<div class="col-md-12">
						    		<label for="form-control">DESCRIPCIÓN </label><!--esta descripcion pertenece a del titulo "TRABAJOS REALIZADOS"-->
						      	<textarea name="txtDescripcionTR" class="form-control" rows="3" placeholder="Describe aquí los trabajos realizados"></textarea>
						    	</div>
						    </div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #1aaabc; color: #fff; text-align: center;">
					    			<p><H2>REPUESTOS Y ACCESORIOS UTILIZADOS</H2></p>
					    		</div>
					    	</div>
					    </div>

					    <div class="form-group">
						    <div class="row">
						    	<div class="col-md-12">
						    		<label for="form-control">DESCRIPCIÓN </label><!--esta descripcion pertenece a del titulo "REPUESTOS Y ACCESORIOS UTILIZADOS"-->
						      	<textarea name="txtDescripcionRAU" class="form-control" rows="3" placeholder="Solo utiliza el punto (.) para finalizar una linea de descripción de cada repuesto utilizado"></textarea>
						    	</div>
						    </div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #1aaabc; color: #fff; text-align: center;">
					    			<p><H2>SERVICIOS DE TERCEROS</H2></p>
					    		</div>
					    	</div>
					    </div>

					    <div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<label for="form-control">DESCRIPCIÓN </label><!--esta descripcion pertenece a del titulo "SERVICIOS DE TERCEROS"-->
										<textarea name="txtDescripcionST" class="form-control" rows="3" placeholder="Describe aquí la descripción de los servicios de terceros, de lo contrario dejar en blanco."></textarea>
									</div>
								</div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #1aaabc; color: #fff; text-align: center;">
					    			<p><H2>OBSERVACIONES</H2></p>
					    		</div>
					    	</div>
					    </div>

					    <div class="form-group">
								<div class="row">
									<div class="col-md-12">
											<textarea class="form-control" rows="3" name="txtObservacionesGenerales" placeholder="Describe aquí las observaciones generales"></textarea>
									</div>
								</div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #1aaabc; color: #fff; text-align: center;">
					    			<p><H2>RECEPCIÓN DE VEHÍCULO</H2></p>
					    		</div>
					    	</div>
					    </div>

					    <div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="form-control">NOMBRE</label>
											<input type="text" name="txtNombreRecepcion" class="form-control" maxlength="40">
									</div>
									<div class="col-md-3">
										<label for="form-control">DNI</label>
											<input type="text" name="txtDNIRecepcion" class="form-control" maxlength="8">
									</div>
									<div class="col-md-3">
										<label for="form-control">FIRMA</label>
											<textarea name="txtFirmaRecepcion" class="form-control" rows="2" placeholder="Dejar en blanco"></textarea>
									</div>
								</div>
					    </div>

					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #1aaabc; color: #fff; text-align: center;">
					    			<p><H2>ENTREGA DE VEHÍCULO</H2></p>
					    		</div>
					    	</div>
					    </div>
							
					    <div class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label for="form-control">NOMBRE</label>
											<input type="text" name="txtNombreEntrega" class="form-control" maxlength="40">
									</div>
									<div class="col-md-3">
										<label for="form-control">DNI</label>
											<input type="text" name="txtDNIEntrega" class="form-control" maxlength="8">
									</div>
									<div class="col-md-3">
										<label for="form-control">FIRMA</label>
											<textarea name="txtFirmaEntrega" class="form-control" rows="2" placeholder="Dejar en blanco"></textarea>
									</div>
								</div>
					    </div>

							<br><br>

					    <button type="submit" class="btn-lg btn-primary" name="btnAgregar">&nbsp;&nbsp;&nbsp;REGISTRAR&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
							<button type="reset" class="btn-lg btn-success">&nbsp;&nbsp;&nbsp;LIMPIAR&nbsp;&nbsp;&nbsp;</button>&nbsp;&nbsp;&nbsp;
							<a href="listado.php" class="btn-lg btn-danger">&nbsp;&nbsp;&nbsp;CANCELAR&nbsp;&nbsp;&nbsp;</a>
					    
							<hr>
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