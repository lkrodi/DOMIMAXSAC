<?php
ob_start();

require_once '../modelos/ProformaVehiculos.php';
require_once '../modelos/VehiculosData.php';
include 'fechaWeb.php';

$ot = $_POST['txtOTN'];
$data = $_POST;

$Otn = new VehiculosData();
$Proforma = new ProformaVehiculos($data);

$nomreport = 'Proforma OT-N° '. $ot;

$registro = $Otn->listaRegistroIndividual($ot);
$trealizados = $registro[0]['descripcion_tr'];

$datos = [];
foreach ($_POST as $key => $value) {
   if(strpos($key, 'Prim') === 0) {
    array_push($datos, $value);
   }
}


$fecha = convierteaFechaWeb($datos[0]);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reporte de Proforma PDF</title>
    <link rel="stylesheet" href="../public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="../public/css/font-awesome.css">
    <style media="screen">
      h3{
        font-weight: bold;
        font-family: sans-serif;
      }
    </style>
</head>
<body>
  <img src="../public/images/LogotipoDomimax.png">
  <h3>PROFORMA N° <?php echo $ot; ?></h3><br>
    <table class="table table-bordered">
            <tr>
                <th>RAZÓN SOCIAL</th>
                <td>UNIVERSIDAD CESAR VALLEJO S.A.C</td>
            </tr>
            <tr>
                <th>DIRECCIÓN</th>
                <td><?php echo $datos[7]; ?></td>
            </tr>
            <tr>
                <th>RUC</th>
                <td>20164113532</td>
            </tr>
    </table>
    <br>
    <table class="table table-bordered">
        <tr>
            <th>MARCA</th>
            <td><?php echo $datos[1]; ?></td>
            <th>MODELO</th>
            <td><?php echo $datos[3]?></td>
            <th>CARROCERIA</th>
            <td><?php echo $datos[4]?></td>
        </tr>
        <tr>
            <th>PLACA</th>
            <td><?php echo $datos[2]; ?></td>
            <th>KM</th>
            <td><?php echo $datos[6]?></td>
            <th>COLOR</th>
            <td><?php echo $datos[5]?></td>
        </tr>
        <tr>
            <th>SEDE</th>
            <td colspan="6">
              <?php echo $datos[7]; ?>
            </td>
        </tr>
        <tr>
            <th>TRABAJO REA.</th>
            <td colspan="6"><?php echo $trealizados; ?></td>
        </tr>
    </table>
    <table class="table table-bordered">
      <tr>
        <th>REPUESTO(S) / SERVICIO(S)</th>
        <th>CANTIDAD</th>
        <th>PRECIO</th>
      </tr>
      <?php
      $totalNeto = $Proforma -> obtenerTotalNeto();
      for ($i = 0 ; $i < count($Proforma -> camposDesc); $i++) {
      ?>
      <tr>
        <td><?php echo $Proforma -> camposDesc[$i]; ?></td>
        <td><?php echo $Proforma -> camposCant[$i]; ?></td>
        <td><?php echo 'S/. '. $Proforma -> camposPrecio[$i].'0'; ?></td>
      </tr>
      <?php
      }
      for ($j = 0; $j < count($Proforma -> camposDesc_D); $j++) {
      ?>
      <tr>
        <td><?php echo $Proforma -> camposDesc_D[$j]; ?></td>
        <td><?php echo $Proforma -> camposCant_D[$j]; ?></td>
        <td><?php echo 'S/. '. $Proforma -> camposPrecio_D[$j].'0'; ?></td>
      </tr>
      <?php
      }
      ?>
      <tr>
        <th colspan="2">TOTAL</th>
        <th><?php echo $totalNeto; ?></th>
      </tr>
    </table>
    <br><br><br>
    <table class="table table-bordered" border="1">
      <tr>
        <td>FECHA DE SERVICIO REALIZADO</td>
        <td><?php echo $fecha; ?></td>
      </tr>
    </table>
    <footer><img src="../public/images/piepaginaDomimax.png" alt=""></footer>
</body>
</html>
<?php

$campos_org = organizaDataProforma();
$Otn->agregarRegistroProforma($campos_org);

use Dompdf\Dompdf;
require_once '../modelos/dompdf/autoload.inc.php' ;

$dompdf = new Dompdf();
$dompdf->load_html(ob_get_clean());
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream($nomreport);

?>
