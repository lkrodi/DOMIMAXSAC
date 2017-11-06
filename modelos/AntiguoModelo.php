<?php

require_once("Conexion.php");

interface consultasExternas
{

	public function listaRegistros();

	public function listaRegistroIndividual($otn);

	public function obtenerProforma($otn);

	public function buscarPlaca($nplaca);

	public function buscarOTNFactura($otn);

	public function buscarRangoFechas($fdesde, $fhasta);

	public function agregaRegistro($datos=array());
}


class VehiculosData extends Conexion implements consultasExternas
{
	private $sql = null;
	public $codigo_retorno = '';

	public function listaRegistros()
	{
		$consulta = $this->mysql->query("SELECT * FROM ordenotn");

		if($consulta):
			$this -> codigo_retorno = "00";
		endif;

		return $consulta->fetchAll();
	}


	public function actualizaRegistro($datos=array(), $otn)
	{
		$consulta = $this->mysql->prepare("UPDATE ordenotn SET hora_inicio = :hora_inicio, hora_termino = :hora_termino, fecha_dv = :fecha_dv, tipomantenimiento_dv = :tipomantenimiento_dv, marca_dv = :marca_dv, placa_dv = :placa_dv, modelovehiculo_dv = :modelovehiculo_dv, modelocarroceria_dv = :modelocarroceria_dv, color_dv = :color_dv, kilometraje_dv = :kilometraje_dv, sede_dv = :sede_dv, descripcion_dv = :descripcion_dv, descripcion_tr = :descripcion_tr, descripcion_rau = :descripcion_rau, descripcion_st = :descripcion_st, observacionesgenerales = :observacionesgenerales, nombre_rv = :nombre_rv, dni_rv = :dni_rv, nombre_ev = :nombre_ev, dni_ev = :dni_ev WHERE otn='$otn'");
		$consulta -> bindParam(":hora_inicio", $datos[0], PDO::PARAM_STR);
		$consulta -> bindParam(":hora_termino", $datos[1], PDO::PARAM_STR);
		$consulta -> bindParam(":fecha_dv", $datos[2], PDO::PARAM_STR);
		$consulta -> bindParam(":tipomantenimiento_dv", $datos[3], PDO::PARAM_STR);
		$consulta -> bindParam(":marca_dv", $datos[3], PDO::PARAM_STR);
		$consulta -> bindParam(":placa_dv", $datos[5], PDO::PARAM_STR);
		$consulta -> bindParam(":modelovehiculo_dv", $datos[6], PDO::PARAM_STR);
		$consulta -> bindParam(":modelocarroceria_dv", $datos[7], PDO::PARAM_STR);
		$consulta -> bindParam(":color_dv", $datos[8], PDO::PARAM_STR);
		$consulta -> bindParam(":kilometraje_dv", $datos[9], PDO::PARAM_INT);
		$consulta -> bindParam(":sede_dv", $datos[10], PDO::PARAM_STR);
		$consulta -> bindParam(":descripcion_dv", $datos[11], PDO::PARAM_STR);
		$consulta -> bindParam(":descripcion_tr", $datos[12], PDO::PARAM_STR);
		$consulta -> bindParam(":descripcion_rau", $datos[13], PDO::PARAM_STR);
		$consulta -> bindParam(":descripcion_st", $datos[14], PDO::PARAM_STR);
		$consulta -> bindParam(":observacionesgenerales", $datos[15], PDO::PARAM_STR);
		$consulta -> bindParam(":nombre_rv", $datos[16], PDO::PARAM_STR);
		$consulta -> bindParam(":dni_rv", $datos[17], PDO::PARAM_INT);
		$consulta -> bindParam(":nombre_ev", $datos[18]);
		$consulta -> bindParam(":dni_ev", $datos[19], PDO::PARAM_INT);
		
		if ($consulta)
		{
			$this -> codigo_retorno = "00";
		}
		else
		{
			$this -> codigo_retorno = "01";
		}

		return $consulta->execute();
	}



	public function agregaRegistro($datos = array())
	{
		#Consulta SQL
		$consulta = $this->mysql->prepare("INSERT INTO ordenotn VALUES (
			:otn, :hora_inicio, :hora_termino, :fecha_dv, :tipomantenimiento_dv,
			:marca_dv, :placa_dv, :modelovehiculo_dv, :modelocarroceria_dv,
			:color_dv, :kilometraje_dv, :sede_dv, :descripcion_dv,
			:descripcion_tr, :descripcion_rau, :descripcion_st,
			:observacionesgenerales, :nombre_rv, :dni_rv, :nombre_ev, :dni_ev)");
		#Vincula los parmámetros para una buena performance en consulta
		$consulta -> bindParam(":otn", $datos[0], PDO::PARAM_INT);
		$consulta -> bindParam(":hora_inicio", $datos[1], PDO::PARAM_STR);
		$consulta -> bindParam(":hora_termino", $datos[2], PDO::PARAM_STR);
		$consulta -> bindParam(":fecha_dv", $datos[3], PDO::PARAM_STR);
		$consulta -> bindParam(":tipomantenimiento_dv", $datos[4], PDO::PARAM_STR);
		$consulta -> bindParam(":marca_dv", $datos[5], PDO::PARAM_STR);
		$consulta -> bindParam(":placa_dv", $datos[6], PDO::PARAM_STR);
		$consulta -> bindParam(":modelovehiculo_dv", $datos[7], PDO::PARAM_STR);
		$consulta -> bindParam(":modelocarroceria_dv", $datos[8], PDO::PARAM_STR);
		$consulta -> bindParam(":color_dv", $datos[9], PDO::PARAM_STR);
		$consulta -> bindParam(":kilometraje_dv", $datos[10], PDO::PARAM_INT);
		$consulta -> bindParam(":sede_dv", $datos[11], PDO::PARAM_STR);
		$consulta -> bindParam(":descripcion_dv", $datos[12], PDO::PARAM_STR);
		$consulta -> bindParam(":descripcion_tr", $datos[13], PDO::PARAM_STR);
		$consulta -> bindParam(":descripcion_rau", $datos[14], PDO::PARAM_STR);
		$consulta -> bindParam(":descripcion_st", $datos[15], PDO::PARAM_STR);
		$consulta -> bindParam(":observacionesgenerales", $datos[16], PDO::PARAM_STR);
		$consulta -> bindParam(":nombre_rv", $datos[17], PDO::PARAM_STR);
		$consulta -> bindParam(":dni_rv", $datos[18], PDO::PARAM_INT);
		$consulta -> bindParam(":nombre_ev", $datos[19]);
		$consulta -> bindParam(":dni_ev", $datos[20], PDO::PARAM_INT);
		
		if ($consulta)
		{
			$this -> codigo_retorno = "00";
		}
		else
		{
			$this-> codigo_retorno = "01";
		}

		return $consulta->execute();
	}


	public function eliminarRegistro($id)
	{
		$consulta_extra = $this->mysql->query("SELECT otn FROM factura WHERE otn = '$id'");
		$resultado = $consulta_extra->fetchAll();

		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = '01';//error tiene relacion con factura
		}
		else
		{
			$consulta = $this->mysql->query("DELETE FROM ordenotn WHERE otn = '$id'");
			$respuesta = $consulta->execute();
			$this -> codigo_retorno = '00';
		}
	}


	public function buscarPlaca($nplaca)
	{
		$consulta = $this->mysql->query("SELECT * FROM ordenotn WHERE placa_dv='$nplaca'");
		$resultado = $consulta->fetchAll();

		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = '00';
			return $resultado;
		}
		else
		{
			$this -> codigo_retorno = "01";
		}
	}


	public function buscarRangoFechas($fdesde, $fhasta)
	{
		$consulta = $this->mysql->query("SELECT * FROM ordenotn WHERE fecha_dv BETWEEN '$fdesde' AND '$fhasta'");
		$resultado = $consulta->fetchAll();

		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = '00';
			return $resultado;
		}
		else
		{
			 $this -> codigo_retorno = "01";
		}
	}


	public function buscarOTNFactura($otn)
	{
		$consulta = $this->mysql->query("SELECT * FROM ordenotn A INNER JOIN factura B ON A.otn = B.otn  WHERE B.otn='$otn'");
		$resultado = $consulta->fetchAll();

		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = "00";
			return $resultado;
		}
		else
		{
			return $this -> codigo_retorno = "01";
		}
	}


	public function listaRegistroIndividual($otn)
	{
		$consulta = $this -> mysql ->query("SELECT * FROM ordenotn WHERE otn = '$otn'");
		
		if ($consulta):
			$this -> codigo_retorno = "00";
		endif;

		return $consulta->fetchAll();
	}

	#consultas internas sin retorno.
	public function contarRegistrosOTN()
	{
		$consulta = $this->mysql->query("SELECT COUNT(otn) FROM ordenotn");
		$resultado = $consulta->fetchAll();

		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = "00";
			return $resultado;
		}
		else
		{
			return $this -> codigo_retorno = "01";#Error
		}
	}


	/*-------MÉTODOS PARA LA PROFORMA----------*/

	public function listarProformas()
	{
		$consulta = $this->mysql->query("SELECT A.otn, A.numero_proforma, B.placa_dv, A.total_p FROM proforma A INNER JOIN ordenotn B ON A.otn = B.otn");
		$resultado = $consulta->fetchAll();

		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = '00';
			return $resultado;
		}
		else
		{
			$this -> codigo_retorno = '01';
		}
	}


	public function obtenerProforma($id)
	{
		if (strpos($id, 'P') === 0)
		{
			$id = substr($id, 1);
			$consulta = $this->mysql->query("SELECT * FROM ordenotn A INNER JOIN proforma B ON A.otn = B.otn  WHERE B.numero_proforma='$id'");
		}
		else
		{
			$consulta = $this->mysql->query("SELECT * FROM ordenotn A INNER JOIN proforma B ON A.otn = B.otn  WHERE B.otn='$id'");
		}

		if ($consulta) 
		{
			$resultado = $consulta->fetchAll();
			
			if(sizeof($resultado) > 0)
			{
				$this -> codigo_retorno = '00';
				return $resultado;
			}
			else
			{
				$this -> codigo_retorno = '01';
			}
		}
		else 
		{
			$this -> codigo_retorno = '01';
		}
	}


	public function agregarRegistroProforma($datos)
	{
		$consulta = $this->mysql->prepare("INSERT INTO proforma VALUES( :otn, :trabajosrealizados_dv, :total, :fechaservicio)");
		$consulta -> bindParam(":otn", $datos[0], PDO::PARAM_INT);
		$consulta -> bindParam(":trabajosrealizados_dv", $datos[1], PDO::PARAM_STR);
		$consulta -> bindParam(":total", $datos[2], PDO::PARAM_INT);
		$consulta -> bindParam(":fechaservicio", $datos[3], PDO::PARAM_STR);
		
		if ($consulta)
		{
			$this -> codigo_retorno = "00";
		}
		else
		{
			$this -> codigo_retorno = "01";
		}

		return $consulta->execute();
	}


	public function contarRegistrosProforma()
	{
		$consulta = $this->mysql->query("SELECT COUNT(numero_proforma) FROM proforma");
		$resultado = $consulta->fetchAll();
		
		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = "00";
			return $resultado;
		}
		else
		{
			return $this -> codigo_retorno = "01";
		}
	}


	/*----------------MÉTODOS PARA LA FACTURA---------------*/
	#Lista todo si existe la relación entre la proforma y la ordenotn

	public function agregarRegistroFactura($datos)
	{
		$consulta = $this->mysql->prepare("INSERT INTO proforma VALUES
			( :nguia, :otn, :descripcion_factura, :subtotal, :total)");
		#Vincula los parmámetros para una buena performance en consulta
		$consulta -> bindParam(":nguia", $datos[0], PDO::PARAM_INT);
		$consulta -> bindParam(":otn", $datos[1], PDO::PARAM_INT);
		$consulta -> bindParam(":descripcion_factura", $datos[2], PDO::PARAM_STR);
		$consulta -> bindParam(":subtotal", $datos[3], PDO::PARAM_INT);
		$consulta -> bindParam(":total", $datos[3], PDO::PARAM_INT);
		
		if ($consulta)
		{
			$this -> codigo_retorno = "00";
		}
		else
		{
			$this -> codigo_retorno = "01";
		}

		return $consulta->execute();
	}


	public function obtenerFactura($otn)
	{
		$consulta = $this->mysql->query("SELECT * FROM factura WHERE otn='$otn'");
		$resultado = $consulta->fetchAll();
		
		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = '00';
			return $resultado;
		}
		else
		{
			$this -> codigo_retorno = "01";#Error
		}
	}


	public function buscaUsuario($user, $password)
    {
	    $consulta = $this -> mysql -> query("SELECT * FROM usuarios WHERE nombre_usuario = '$user' AND contrasenia = '$password'");
	    $resultado = $consulta -> fetchAll();

		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = '00';
			return $resultado;
		} 
		else 
		{
			$this -> codigo_retorno = "01";
		}
  	}


  	public function RegistroPdfOtns ($limite) 
  	{
	  	$consulta = $this -> mysql -> query("SELECT * FROM ordenotn LIMIT 0,$limite");
	    $resultado = $consulta -> fetchAll();

		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = '00';
			return $resultado;
		} 
		else 
		{
			$this -> codigo_retorno = "01";
		}
  	}


 	public function RegistroPdfProformas ($limite) 
  	{
	  	$consulta = $this -> mysql -> query("SELECT * FROM proforma LIMIT 0,$limite");
	    $resultado = $consulta -> fetchAll();

		if (sizeof($resultado) > 0)
		{
			$this -> codigo_retorno = '00';
			return $resultado;
		} 
		else 
		{
			$this -> codigo_retorno = "01";
		}
  	}


  	public function RegistroPdfOtns ($limite) 
  	{
	  	$consulta = $this -> mysql -> query("SELECT * FROM ordenotn LIMIT 0,$limite");
	    $resultado = $consulta -> fetchAll();
	    
		if (validaResConsulta($resultado) === '00')
		{

		}
  	}



  	private function validaResConsulta ($resultado=array())
  	{
  		$datosArray = [];
  		$datosArray = $resultado;

  		if (sizeof($datosArray) > 0)
		{
			$this -> codigo_retorno = '00';
		}
		else
		{
			$this -> codigo_retorno = "01";
		}

		return $this -> codigo_retorno;
  	}
}


?>

