<?php

require 'header.php';
include_once '../Modelos/VehiculosData.php';
require '../files/errores.php';
include '../files/fechaWeb.php';

$OBlistadoTotal = new VehiculosData();
$listadoTotal = $OBlistadoTotal -> listaRegistros();
$conteoRegistros = $OBlistadoTotal ->contarRegistrosOTN();
$conteoTotal = $conteoRegistros[0]['COUNT(otn)'];

if(isset($_POST['btnBuscar_listado']))
{
  $busqueda = $_POST['txtBuscar'];
  #si es numérico significa que es una busqueda de OTN
  if(is_numeric($busqueda)){
    $registroTotal = $OBlistadoTotal->contarRegistrosOTN();
    if($OBlistadoTotal->codigo_retorno = '00')
    {
      $totalReg = (int)$registroTotal[0]['COUNT(otn)'];
      $busqueda = (int)$busqueda;
      if($busqueda > 0)
      {
        $resultadoOtn = $OBlistadoTotal->listaRegistroIndividual($busqueda);
        $listadoTotal = $resultadoOtn;
      }
      else
      {
        print $errores_listado['err_otn'];
      }
    }
    else
    {
      print $errores_listado['err_server'];
    }
  }
  else
  {
    //Sino es una busqueda por N° de placa
    $id_placa = $_POST['txtBuscar'];
    //El formato para una placa es: A5Y-778(ejemplo)
    if(strlen($id_placa) == 7)
    {
      $resultadoPlaca = $OBlistadoTotal -> buscarPlaca($id_placa);
      if($OBlistadoTotal ->codigo_retorno == '00')
      {
        $listadoTotal = $resultadoPlaca;
      }else
      {
        print $errores_listado['err_buscar_placa'];
      }
    }
    else
    {
      print $errores_listado['err_placa_incorrecta'];
    }
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
                            <div class="col-lg-3 col-xs-6">
                              <div class="small-box bg-aqua">
                                <div class="inner">
                                  <h3><?php print $conteoTotal; ?></h3>
                                  <p>VEHÍCULOS INGRESADOS</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-bag"></i>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                              <div class="small-box bg-green">
                                <div class="inner">
                                  <h3>6<sup style="font-size: 20px"></sup></h3>
                                  <p>VEHÍCULOS EN MANTENIMIENTO</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-stats-bars"></i>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-3 col-xs-6">
                              <!-- small box -->
                              <div class="small-box bg-yellow">
                                <div class="inner">
                                  <h3>15</h3>

                                  <p>REPUESTOS UTILIZADOS</p>
                                </div>
                                <div class="icon">
                                  <i class="ion ion-person-add"></i>
                                </div>
                              </div>
                            </div>
                            <!-- ./col -->
                          </div>

                          <form action="" method="post" name="frm_listado">
                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-8">
                                  <label style="font-size: 25px;">LISTA TOTAL DE REGISTROS</label>
                                </div>
                                <div class="col-md-4"></div>
                              </div>
                            </div>

                       <div class="form-group">
                          <div class="row">
                            <div class="col-md-4">
                                <input type="text" id="txtBuscarPlacaOtn" name="txtBuscar" class="form-control"  placeholder="Escribe aqui el OTN o Placa a buscar" maxlength="8">
                            </div>
                            <div class="col-md-4">
                                <input  type="submit" class="btn btn-danger" id="btnBuscar_listado" name="btnBuscar_listado" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BUSCAR&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">
                            </div>
                            <div class="col-md-4"></div>
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
                                             <th  style="text-align: center;">FECHA DE INGRESO</th>
                                             <th  style="text-align: center;">OPCIÓN</th>
                                       </tr>
                                       <?php
                                        foreach ( $listadoTotal as $registro)
                                        {
                                       ?>
                                      <tr>
                                        <td><?php echo $registro['otn'];?></td>
                                        <td><?php echo $registro['placa_dv'];?></td>
                                        <td><?php echo $registro['marca_dv'];?></td>
                                        <td><?php echo convierteaFechaWeb($registro['fecha_dv']);?></td>
                                        <td>
                                          <a href="editar.php?txtId=<?php echo $registro['otn']; ?>" class="btn btn-info">
                                            &nbsp;&nbsp;&nbsp;VER DETALEE&nbsp;&nbsp;&nbsp;
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
