<?php

ob_start();

include_once '../Modelos/VehiculosData.php';
include '../files/fechaBD.php';
include '../files/fechaWeb.php';

$datoOTN = $_GET['txtId'];
$OBtraerDatos = new VehiculosData();
$datosAct = $OBtraerDatos -> listaRegistroIndividual($datoOTN);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporte de Proforma PDF</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../public/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../public/css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="../public/img/apple-touch-icon.png">
    <link rel="shortcut icon" href="../public/img/favicon.ico">

    <!-- DATATABLES -->
    <link rel="stylesheet" type="text/css" href="../public/datatables/jquery.dataTables.min.css">
    <link href="../public/datatables/buttons.dataTables.min.css" rel="stylesheet"/>
    <link href="../public/datatables/responsive.dataTables.min.css" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/personalizado.css">
    
    <style media="screen">
      h3{
        font-weight: bold;
        font-family: sans-serif;
      }
    </style>
</head>
<body>
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
                  <label for="form-control">OT.N°</label>
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
              </div>
          </form>
                    </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
</body>
</html>

<?php

use Dompdf\Dompdf;
require_once '../modelos/dompdf/autoload.inc.php' ;

$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($nomreport);

?>
