<?php 
class Conexion
{
	protected $serv="localhost";
	protected $base="colegio";
	protected $usua="root";
	protected $pass="";
	protected $charset="utf8";
	protected $port=3306;
	protected $conex;

	public function Conexion()
	{
		try
		{
			$this->conex= new PDO("mysql:host=".$this->serv.";dbname=".$this->base.";charset=".$this->charset.";port=".$this->port,$this->usua,$this->pass);
		}
		catch(exception $e)
		{
			echo"Error al aconectar la base de datos".$e->getMessage();
		}

	}
}
?>