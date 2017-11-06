<?php

require 'header.php';
include_once '../Modelos/VehiculosData.php';
require '../files/errores.php';

$OBproforma = new VehiculosData();
$listadoTotal = $OBproforma -> listarProformas();

if(isset($_POST['btnBuscarProforma'])) {
  $nproforma = $_POST['txtProformaBuscar'];
  if($nproforma != '' && (is_numeric($nproforma) || strpos($nproforma, 'P') === 0)) {
    $resultadoProforma = $OBproforma -> obtenerProforma($nproforma);
    if($OBproforma -> codigo_retorno == '00') {
      $listadoTotal = $resultadoProforma;
    }
  }
  else {
    print $error_proforma;
  }
}
?>

      <div class="content-wrapper">
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body table-responsive" id="listado">
                        <div class="form-group">
                        <div class="row">
                            <!-- ./col -->
                          </div>
                          <div class="form-group">
                        <form action="" method="post" name="frm_listado">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-8">
                                <label style="font-size: 25px;">BÚSQUEDA DE PROFORMAS</label>
                                </div>
                                <div class="col-md-4"></div>
                              </div>
                            </div>
                         <div class="form-group">
                            <div class="row">
                              <div class="col-md-4">
                                  <input type="text" name="txtProformaBuscar" class="form-control" placeholder="'P-numero de proforma' o escribe el numero de OTN" maxlength="8">
                              </div>
                              <div class="col-md-4">
                                  <input  type="submit" class="btn btn-danger" name="btnBuscarProforma" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUSCAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                              </div>
                              <div class="col-md-4">
                                <input  type="submit" class="btn btn-danger" name="btngenerarProforma" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GENERAR PROFORMA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                              </div>
                        </form>
                          </div>
                        </div>
                        <style>
                          #tablehover:hover{
                            background: #DEE2E2;
                          }
                        </style>

                      <div class="form-group">
                          <div class="row">
                              <div class="col-md-12">
                                <table class="table table-hover text-center">
                                       <tr style="background: #0E66A7; color: #fff;">
                                         <th  style="text-align: center;">N° DE PROFORMA</th>
                                         <th  style="text-align: center;">O.T - N°.</th>
                                         <th  style="text-align: center;">PLACA</th>
                                         <th  style="text-align: center;">TOTAL(S./)</th>
                                         <th  style="text-align: center;">OPCION</th>
                                       </tr>
                                       <?php
                                        foreach ( $listadoTotal as $registro)
                                        {
                                       ?>
                                      <tr>
                                          <td><?php echo $registro['numero_proforma'];?></td>
                                          <td><?php echo $registro['otn'];?></td>
                                          <td><?php echo $registro['placa_dv'];?></td>
                                          <td><?php echo $registro['total_p'];?></td>
                                          <td>
                                            <a href="editar.php?txtId=<?php echo $registro['otn']; ?>" class="btn btn-info">
                                              &nbsp;&nbsp;&nbsp;VER DETALLE&nbsp;&nbsp;&nbsp;
                                            </a>&nbsp;&nbsp;&nbsp;
                                            <a href="../files/eliminarRegistro.php?txtId=<?php echo $registro['otn']; ?>" class="btn btn-danger">
                                              &nbsp;&nbsp;&nbsp;ELIMINAR&nbsp;&nbsp;&nbsp;
                                            </a>&nbsp;&nbsp;&nbsp;
                                        </td>
                                      </tr>
                                       <?php } ?>
                                </table>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
<?php
require 'footer.php';
?>
