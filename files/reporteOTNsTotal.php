<?php

ob_start();

require_once '../modelos/VehiculosData.php';
include 'fechaWeb.php';
include 'errores.php';

$limite = $_POST['txtLimiteOTNs'];

$reporteOB = new VehiculosData();
$listadoTotal = $reporteOB->RegistroPdfOtns($limite);
$conteoRegistros = $reporteOB->contarRegistrosOTN();

if($reporteOB->codigo_retorno == '00') {
  $conteoTotal = $conteoRegistros[0]['COUNT(otn)'];
}
else {
  echo $error_limite;
  echo $regresar;
}

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
  <img src="../public/images/LogotipoDomimax.png">
  <h4>Lista total de Registros OT-N° <?php echo $conteoTotal; ?></h4><br>
    <table class="table table-bordered text-center">
            <tr style="background: #0E66A7; color: #fff;">
                <th style="text-align: center;">O.T - N°.</th>
                <th style="text-align: center;">N° DE PLACA</th>
                <th style="text-align: center;">MARCA</th>
                <th style="text-align: center;">FECHA DE INGRESO</th>
            </tr>
            <?php foreach ( $listadoTotal as $registro) { ?>
            <tr>
              <td><?php echo $registro['otn'];?></td>
              <td><?php echo $registro['placa_dv'];?></td>
              <td><?php echo $registro['marca_dv'];?></td>
              <td><?php echo convierteaFechaWeb($registro['fecha_dv']);?></td>
            </tr>
            <?php } ?>
    </table>
</body>
</html>

<?php

use Dompdf\Dompdf;
require_once '../modelos/dompdf/autoload.inc.php' ;

$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('Lista Total de OT°Ns');

?>
