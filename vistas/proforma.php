<?php

require 'header.php';
include_once '../Modelos/VehiculosData.php';
require '../files/errores.php';
include '../files/fechaWeb.php';
include '../files/fechaBD.php';

$datoOTN_P = $_GET['txtId'];
$OBtraerDatos_P = new VehiculosData();

$datosAct_P = $OBtraerDatos_P->listaRegistroIndividual($datoOTN_P);
$registrosProformas = $OBtraerDatos_P->contarRegistrosProforma();

$otnactual = $datosAct_P[0]['otn'];
$conteo = $registrosProformas[0]['COUNT(numero_proforma)'];
$texto = explode(".", $datosAct_P[0]['descripcion_rau']);

array_pop($texto);

if (isset($_POST['btnregistrarProforma'])) {

  $otn = $_POST['txtOTN'];

  if(is_numeric($otn) && $otn == $otnactual) {

    $km = $_POST['txtKilometraje'];

    if(strlen($km) > 0 && strlen($km) <= 8) {

        $_POST['txtFechaActual'] = convierteaFechaBD($_POST['txtFechaActual']);
        $numeroproforma = (int) $conteo + 1;

        $datos = array(
          $_POST['txtOTN'],
          $numeroproforma,
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
          print $regresar_inicio;
        } 
        else {
          print $errores_agregar_adicional;
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
<script type="text/javascript">

  var campos = 0;
  function agregarCampo(){
    campos = Number(campos);
    campos = campos + 1;
    var NvoCampo = document.createElement("div");
    NvoCampo.id = "divcampo_" + (campos);
    NvoCampo.innerHTML =
    "<input type='text' class='form-control' name='campoDinamicoDesc_" + (campos) + "' id='campoDinamicoDesc_" + campos + "'>" +
      " <a class='btn-xs btn-danger' href='JavaScript:quitarCampo(" + campos +");'>eliminar campo</a>";
      var contenedor = document.getElementById("contenedorcampos");
      contenedor.appendChild(NvoCampo);
  }


  function quitarCampo(iddiv){
    var eliminar = document.getElementById("divcampo_" + iddiv);
    var contenedor =  document.getElementById("contenedorcampos");
    contenedor.removeChild(eliminar);
  }


  var campos = 0;
  function agregarCampo2(){
    campos = Number(campos);
    campos = campos + 1;
    var NvoCampo = document.createElement("div");
    NvoCampo.id = "divcampo_" + (campos);
    NvoCampo.innerHTML =
    "<input type='text' class='form-control' value='' name='campoDinamicoCant_" + (campos) + "' id='campoDinamicoCant_" + campos + "'>" +
      " <a class='btn-xs btn-danger' href='JavaScript:quitarCampo2(" + campos +");'>eliminar campo</a>";
      var contenedor = document.getElementById("contenedorcampos2");
      contenedor.appendChild(NvoCampo);
  }


  var campos = 0;
  function agregarCampo3(){
    campos = Number(campos);
    campos = campos + 1;
    var NvoCampo = document.createElement("div");
    NvoCampo.id = "divcampo_" + (campos);
    NvoCampo.innerHTML =
    "<input type='text' class='form-control' value='S./' name='campoDinamicoPrecio_" + (campos) + "' id='campoDinamicoPrecio_" + campos + "'>" +
      " <a class='btn-xs btn-danger' href='JavaScript:quitarCampo3(" + campos +");'>eliminar campo</a>";
      var contenedor = document.getElementById("contenedorcampos3");
      contenedor.appendChild(NvoCampo);
  }


  function quitarCampo2(iddiv){
    var eliminar = document.getElementById("divcampo_" + iddiv);
    var contenedor =  document.getElementById("contenedorcampos2");
    contenedor.removeChild(eliminar);
  }


  function quitarCampo3(iddiv){
    var eliminar = document.getElementById("divcampo_" + iddiv);
    var contenedor =  document.getElementById("contenedorcampos3");
    contenedor.removeChild(eliminar);
  }


</script>
<div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <form action="../files/reporteProforma.php" method="post" role="form">
                        <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #E24D39; color: #fff; text-align:center;">
					    			<p style="text-align:center; "><H1>PROFORMA</H1></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-4">
					    		<label for="form-control">OT.N°</label>
					      		<input name="txtOTN" type="text" class="form-control" maxlength="10" value="<?php print $datosAct_P[0]['otn']; ?>">
					    	</div>
					    	<div class="col-md-4">
					    		<label for="form-control">Hora de Inicio</label>
					      		<input name="txtHoraInicio" type="text" class="form-control" maxlength="10" value="<?php print $datosAct_P[0]['hora_inicio']; ?>">
					    	</div>
					    	<div class="col-md-4">
					    		<label for="form-control">Hora de Término</label>
					      		<input name="txtHoraTermino" type="text" class="form-control" value="<?php print $datosAct_P[0]['hora_termino']; ?>">
					    	</div>
					    </div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-4">
					    		<label for="form-control">Fecha de registro</label>
					      		<input name="Prim8" type="text" class="form-control" value="<?php print convierteaFechaWeb($datosAct_P[0]['fecha_dv']); ?>">
					    	</div>
					    	<div class="col-md-8">
					    		<label for="form-control">Tipo de Mantenimiento</label>
					      		<input name="txtTipoMantenimiento" type="text" class="form-control" value="<?php print $datosAct_P[0]['tipomantenimiento_dv']; ?>">
					    	</div>
					    </div>
					    </div>
					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-12" style="background: #E24D39; color: #fff; text-align: center;">
					    			<p><H2>DATOS DE VEHÍCULO</H2></p>
					    		</div>
					    	</div>
					    </div>
					    <div class="form-group">
					    <div class="row">
					    	<div class="col-md-3">
					    		<label for="form-control">Marca</label>
					      		<input name="Prim2" type="text" class="form-control" maxlength="45" value="<?php print $datosAct_P[0]['marca_dv']; ?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">Placa</label>
					      		<input name="Prim5" type="text" class="form-control" maxlength="10" value="<?php print $datosAct_P[0]['placa_dv']; ?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">Modelo  de vehículo</label>
					      		<input type="text" name="Prim3" class="form-control" maxlength="10" value="<?php print $datosAct_P[0]['modelovehiculo_dv']; ?>">
					    	</div>
					    	<div class="col-md-3">
					    		<label for="form-control">Modelo de carrocería</label>
					      		<input type="text" name="Prim4" class="form-control" maxlength="8" value="<?php print $datosAct_P[0]['modelocarroceria_dv']; ?>">
					    	</div>
					    </div>
					    </div>
					    <div class="form-group">
					    	<div class="row">
					    		<div class="col-md-4">
									<label for="form-control">Color de Vehículo</label>
									<input type="text" name="Prim7" class="form-control" maxlength="20" value="<?php print $datosAct_P[0]['color_dv']; ?>">
					    		</div>
					    		<div class="col-md-4">
									<label for="form-control">Kilometraje</label>
									<input type="text" name="Prim6" class="form-control" maxlength="8" value="<?php print $datosAct_P[0]['kilometraje_dv']; ?>">
					    		</div>
					    		<div class="col-md-4">
					    			<label for="form-control">Sede</label>
					    			<br>
					    			<select class="selectpicker" class="form-control" name="Prim1">
									  <option value="<?php print $datosAct_P[0]['sede_dv']; ?>"><?php print $datosAct_P[0]['sede_dv']; ?></option>
									</select>
					    		</div>
					    	</div>
					    </div>

						    <div class="form-group">
						    	<div class="row">
						    		<div class="col-md-12" style="background: #E24D39; color: #fff; text-align: center;">
						    			<p><H2>COSTOS DE REPUESTOS</H2></p>
						    		</div>
						    	</div>
						    </div>

                <div class="form-group">
  						    <div class="row">

  						    	<div class="col-md-6">
                      <label for="form-control">DESCRIPCIÓN</label>
                      <?php
                       for ($i=0; $i < count($texto); $i++) {
                      ?>
                        <input type="text" name="campoDesc_<?php echo $i; ?>" value="<?php print $texto[$i];?>" class="form-control"><br>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="col-md-3">
                      <label for="form-control">CANTIDAD</label>
                      <?php
                       for ($i=0; $i < count($texto); $i++) {
                      ?>
                        <input type="text" name="campoCant_<?php echo $i; ?>" class="form-control" value=""><br>
                      <?php
                      }
                      ?>
                    </div>
                    <div class="col-md-3">
                      <label for="form-control">PRECIO</label>
                      <?php
                       for ($i=0; $i < count($texto); $i++) {
                      ?>
                        <input type="text" name="campoPrecio_<?php echo $i; ?>" class="form-control" value="S./"><br>
                      <?php
                      }
                      ?>
                    </div>
  						    </div>
  					    </div>

                <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <a href='JavaScript:agregarCampo();' class="btn btn-success">Agregar nuevo campo</a>
                      <div class="" id="contenedorcampos">
                        <br>
                        <!--Aqui se genera automaticamente los campos dinamicos(no hacer nada)-->
                      </div>
                  </div>
                  <div class="col-md-3">
                    <a href='JavaScript:agregarCampo2();' class="btn btn-success">Agregar nuevo campo</a>
                      <div class="" id="contenedorcampos2">
                        <br>
                        <!--Aqui se genera automaticamente los campos dinamicos(no hacer nada)-->
                      </div>
                  </div>
                  <div class="col-md-3">
                    <a href='JavaScript:agregarCampo3();' class="btn btn-success">Agregar nuevo campo</a>
                      <div class="" id="contenedorcampos3">
                        <br>
                        <!--Aqui se genera automaticamente los campos dinamicos(no hacer nada)-->
                      </div>
                  </div>
                </div>
                </div>

					    </div>
					    <br><br>
              <button type="submit" class="btn-lg negro_boton" style="background: #010101; color:white">&nbsp;&nbsp; <i class="fa fa-file-pdf-o" style="color:white, border=red"></i>&nbsp;GENERAR PROFORMA PDF&nbsp;&nbsp;&nbsp;</button>
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
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<?php
require 'footer.php';
?>
