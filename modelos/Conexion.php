<?php

class Conexion
{
	protected $mysql = null;

	public function __construct()
	{
		try {
			$this->mysql = self::abreConexion();
		}
		catch(PDOException $ex) {
			echo $ex->getMessage();
		}
	}

	private function abreConexion()
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$database = 'domimaxsac';
		$charset = 'utf8';

		$opcion_default = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];

		$pdo = new PDO("mysql:host={$host}; dbname={$database}; charset={$charset}", $user, $pass, $opcion_default);
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $pdo;
	}
}
?>
