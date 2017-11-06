<?php
require 'header.php';
?>
<div class="content-wrapper">
        <!-- Main content -->
        <div class="container">
        	<h3 class="text-center">¿QUÉ REPORTE FÍSICO DESEAS REALIZAR?</h3>
        </div>
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <h3>Reporte PDF del total de registros OTN</h3>
							<form action="../files/reporteOTNsTotal.php" method="post">
								 <div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="form-control">Límite de registros</label>
									  		<input type="text" name="txtLimiteOTNs" class="form-control" maxlength="8" placeholder="¿Cuántos registros totales quieres ver?">
										</div>
										<div class="col-md-4">
											<label for="form-control">Click abajo para generar el reporte</label>
									  		<button type="submit" class="btn btn-danger">&nbsp;&nbsp; <i class="fa fa-file-pdf-o" style="color:white, border=red"></i>&nbsp;&nbsp;GENERAR PDF ELECTRÓNICO&nbsp;&nbsp;&nbsp;</button>
										</div>
										<div class="col-md-4"></div>
									</div>
								</div>
							</form>
                    </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->


          <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <h3>Reporte PDF del total de Proformas</h3>
							<form action="../files/reporteProformasTotal.php" method="post">
								 <div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="form-control">Límite de registros</label>
									  		<input type="text" name="txtLimiteProformas" class="form-control" maxlength="8" placeholder="¿Cuántos registros totales quieres ver?">
										</div>
										<div class="col-md-4">
											<label for="form-control">Click abajo para generar el reporte</label>
									  		<button type="submit" class="btn btn-success">&nbsp;&nbsp; <i class="fa fa-file-pdf-o" style="color:white, border=red"></i>&nbsp;&nbsp;GENERAR PDF ELECTRÓNICO&nbsp;&nbsp;&nbsp;</button>
										</div>
										<div class="col-md-4"></div>
									</div>
								</div>
							</form>
                    </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->


          <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <h3>Reporte PDF OTN individual</h3>
							<form action="../files/reporteOTNindividual.php" method="post">
								 <div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="form-control">Busca el OTN</label>
									  		<input type="text" name="txtReporteOTNindividual" class="form-control" maxlength="8" placeholder="Escribe aquí el N°. de OTN">
										</div>
										<div class="col-md-4">
											<label for="form-control">Click abajo para generar el reporte</label>
									  		<button type="submit" class="btn btn-info">&nbsp;&nbsp; <i class="fa fa-file-pdf-o" style="color:white, border=red"></i>&nbsp;&nbsp;GENERAR PDF ELECTRÓNICO&nbsp;&nbsp;&nbsp;</button>
										</div>
										<div class="col-md-4"></div>
									</div>
								</div>
							</form>
                    </div>

                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->


          <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <h3>Reporte PDF PROFORMA individual</h3>
							<form action="../files/reporteProformaIndividual.php" method="post">
								 <div class="form-group">
									<div class="row">
										<div class="col-md-4">
											<label for="form-control">Busca el OTN</label>
									  		<input type="text" name="txtReporteOTNindividual" class="form-control" maxlength="8" placeholder="Escribe aquí el N°. de la proforma">
										</div>
										<div class="col-md-4">
											<label for="form-control">Click abajo para generar el reporte</label>
									  		<button type="submit" class="btn btn-primary">&nbsp;&nbsp; <i class="fa fa-file-pdf-o" style="color:white, border=red"></i>&nbsp;&nbsp;GENERAR PDF ELECTRÓNICO&nbsp;&nbsp;&nbsp;</button>
										</div>
										<div class="col-md-4"></div>
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
  <!--Fin-Contenido-->







<?php
require 'footer.php';
?>


