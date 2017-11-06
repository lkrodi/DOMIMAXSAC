<?php

require 'header.php';
include_once '../Modelos/VehiculosData.php';
require '../files/errores.php';

$OBfechabusqueda = new VehiculosData();
$listadoTotal = $OBfechabusqueda->listaRegistros();

if (isset($_POST['btnBuscarfecha'])) {
  
  $id_fdesde = $_POST['txtfdesde'];
  $id_fhasta = $_POST['txtfhasta'];
  
  $resultadoFecha = $OBfechabusqueda->buscarRangoFechas($id_fdesde, $id_fhasta);
  
  if ($OBfechabusqueda -> codigo_retorno = '00') {
    $listadoTotal = $resultadoFecha;
  } 
  else {
    print $error_busqueda_fecha;
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
                                <label style="font-size: 25px;">BÚSQUEDA POR FECHAS</label>
                                </div>
                                <div class="col-md-4"></div>
                              </div>
                            </div>
                         <div class="form-group">
                            <div class="row">
                              <div class="col-md-4">
                                  <input type="date" name="txtfdesde" class="form-control">
                              </div>
                              <div class="col-md-4">
                                  <input type="date" name="txtfhasta" class="form-control">
                              </div>
                              <div class="col-md-4">
                                  <input  type="submit" class="btn btn-danger" name="btnBuscarfecha" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUSCAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
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
                                         <th  style="text-align: center;">O.T - N°.</th>
                                         <th  style="text-align: center;">PLACA</th>
                                         <th  style="text-align: center;">MARCA</th>
                                         <th  style="text-align: center;">Fecha</th>
                                         <th  style="text-align: center;">OPCION</th>
                                       </tr>
                                       <?php
                                        foreach ( $listadoTotal as $registro)
                                        {
                                       ?>
                                      <tr>
                                          <td><?php echo $registro['otn'];?></td>
                                          <td><?php echo $registro['placa_dv'];?></td>
                                          <td><?php echo $registro['marca_dv'];?></td>
                                          <td><?php echo $registro['fecha_dv'];?></td>
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
