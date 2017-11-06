<?php

require_once 'VehiculosData.php';

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
    
    for ($i=0; $i<count($tamanio); $i++)
    {
      $precio = $this->camposPrecio[$i];
      $cantidad = $this->camposCant[$i];

      $producto = $precio * $cantidad;
      $producto = self::ponerCeros($producto);
      array_push($this->subtotalFijo, $producto);
    }

    return $this -> subtotalFijo;
  }


  private function obtenerSubtotalDinamico()
  {
    $tamanio = $this -> camposCant_D;
    
    for ($i=0 ; $i<count($tamanio); $i++)
    {
      $precio = $this->camposPrecio_D[$i];
      $cantidad = $this->camposCant_D[$i];

      $producto = $precio * $cantidad;
      $producto = self::ponerCeros($producto);
      array_push($this->subtotalDinamico, $producto);
    }

    return $this->subtotalDinamico;
  }


  #totales de los campos
  public function obtenerTotalFijo()
  {
    $total = self::obtenerSubtotalFijo();
    $this->totalFijo = array_sum($total);

    return $this->totalFijo;
  }


  public function obtenerTotalDinamico()
  {
    $total = self::obtenerSubtotalDinamico();
    $this->totalDinamico = array_sum($total);
    
    return $this->totalDinamico;
  }


  #total neto de todos los campos
  public function obtenerTotalNeto()
  {
    $totalneto = self::obtenerTotalFijo() + self::obtenerTotalDinamico();
    $totalneto = self::ponerCeros($totalneto);
    $totalneto_convertido = $totalneto;

    return $totalneto_convertido;
  }


  #insercion de los campos fijos y dinamicos
  public function generarCamposFijos($datos=array())
  {
    foreach ($datos as $key => $value)
    {
      if (strpos($key, 'campoDesc') === 0)
      {
        array_push($this->camposDesc, $value);
      }
      elseif(strpos($key, 'campoCant') === 0)
      {
        array_push($this->camposCant, $value);
      }
      elseif(strpos($key, 'campoPrecio') === 0)
      {
        $value = substr($value, 3);
        array_push($this->camposPrecio, $value);
      }
    }
  }


  public function generarCamposDinamicos($datos=array())
  {
    foreach ($datos as $key => $value)
    {
      if (strpos($key, 'campoDinamicoDesc') === 0)
      {
        array_push($this->camposDesc_D, $value);
      }
      elseif(strpos($key, 'campoDinamicoCant') === 0)
      {
        array_push($this->camposCant_D, $value);
      }
      elseif(strpos($key, 'campoDinamicoPrecio') === 0)
      {
        $value = substr($value, 3);
        array_push($this->camposPrecio_D, $value);
      }
    }
  }


  private function ponerCeros($numero)
  {
    if(substr($numero, -2, 1) === '.') {
      $numero = $numero . '0' ;
    }
    else {
      $numero = $numero .'.00';
    }

    $convertido = $numero;
    
    return $convertido;
  }


  public function organizaDataProforma()
  {
    $delimitador = '|||';

    for ($i=0; $i < sizeof($this-> camposDesc); $i++) { 

      $descripcion .= $this->camposDesc[$i] . $delimitador;

      $cantidad .= $this->camposCant[$i] . $delimitador;

      $precio .= $this->camposPrecio[$i] . $delimitador;
    }

    for ($j=0; $j < sizeof($this-> camposDesc_D); $j++) { 
      
      $descripcion_d .= $this->camposDesc_D[$j] . $delimitador;

      $cantidad_d .= $this->camposCant_D[$j] . $delimitador;

      $precio_d .= $this->camposPrecio_D[$j] . $delimitador;
    }

    $datosRetorno = array(
      'descripcion' => $descripcion,
      'cantidad' => $cantidad,
      'precio' => $precio,

      'descripcion_d' => $descripcion_d,
      'cantidad_d' => $cantidad_d,
      'precio_d' => $precio_d
    );

    return $datosRetorno;
  }
}
?>
