<?php
class ProformaVehiculos
{
  public $camposDesc = [];
  public $camposCant = [];
  public $camposPrecio = [];
  public $camposDesc_D = [];
  public $camposCant_D = [];
  public $camposPrecio_D = [];
  public $subtotalFijo = [];
  public $subtotalDinamico = [];
  public $totalFijo = 0;
  public $totalDinamico = 0;

  public function __construct($datos=array())
  {
    self::generarCamposFijos($datos);
    self::generarCamposDinamicos($datos);
  }

  #subtotales de los campos
  private function obtenerSubtotalFijo()
  {
    $tamanio = $this -> camposCant;

    for ($i = 0 ; $i < count($tamanio) ; $i++)
    {
      array_push($this -> subtotalFijo, (int) $this-> camposCant[$i] * $this -> camposPrecio[$i]);
    }

    return $this -> subtotalFijo;
  }

  private function obtenerSubtotalDinamico()
  {
    $tamanio = $this -> camposCant_D;

    for ($i = 0 ; $i < count($tamanio) ; $i++)
    {
      array_push($this -> subtotalDinamico, (int) $this-> camposCant_D[$i] * $this -> camposPrecio_D[$i]);
    }

    return $this -> subtotalDinamico;
  }

  #totales de los campos
  public function obtenerTotalFijo()
  {
    $this -> totalFijo = array_sum(self::obtenerSubtotalFijo());
    return $this -> totalFijo;
  }

  public function obtenerTotalDinamico()
  {
    $this -> totalDinamico = array_sum(self::obtenerSubtotalDinamico());
    return $this -> totalDinamico;
  }

  #total neto de todos los campos
  public function obtenerTotalNeto()
  {
    $totalneto = (int) self::obtenerTotalFijo() + self::obtenerTotalDinamico();
    return $totalneto;
  }

  #insercion de los campos fijos y dinamicos
  public function generarCamposFijos($datos=array())
  {
    foreach ($datos as $key => $value)
    {
      if (strpos($key, 'campoDesc') === 0)
      {
        array_push($this -> camposDesc, $value);
      }
      elseif(strpos($key, 'campoCant') === 0)
      {
        array_push($this -> camposCant, $value);
      }
      elseif(strpos($key, 'campoPrecio') === 0)
      {
        $value = substr($value, 3);
        array_push($this -> camposPrecio, $value);
      }
    }
  }
  public function generarCamposDinamicos($datos=array())
  {
    foreach ($datos as $key => $value)
    {
      if (strpos($key, 'campoDinamicoDesc') === 0)
      {
        array_push($this -> camposDesc_D, $value);
      }
      elseif(strpos($key, 'campoDinamicoCant') === 0)
      {
        array_push($this -> camposCant_D, $value);
      }
      elseif(strpos($key, 'campoDinamicoPrecio') === 0)
      {
        $value = substr($value, 3);
        array_push($this -> camposPrecio_D, $value);
      }
    }
  }
}

//PRUEBAS DE LA CLASE PROFORMA
/*
$data = $_POST;
$proforma = new ProformaVehiculos($data);#objeto
$total = $proforma -> obtenerTotalNeto();#Total
echo "<br> Total es :" . $total . "<br>";
echo '<div id="prueba1">';
foreach ($proforma -> subtotalFijo as $value) {
  echo '<table border="1">
          <tr>
            <td>'.$value.'</td>
          </tr>
  </table>';
}
echo '</div>';

foreach ($proforma -> subtotalDinamico as $value2) {
  echo '<div id="prueba2"><table border="1">
          <tr>
            <td>'.$value.'</td>
          </tr>
  </table></div>';
}*/
 ?>
