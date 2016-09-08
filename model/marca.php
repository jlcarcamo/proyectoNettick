<?php 
	include_once('../conexion/conexion.php');

class marca
{
	private $idMarca;
	private $nombre_marca;

	
	public function __construct()
	{
		$this->conexion = new conexion();
	}

	public function __destruct(){}

	//GETTER AND SETTER
	public function set($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}

	public function get($atributo)
	{
		return $this->$atributo;
	}

	//METODOS
	//LISTAR RUBROS

	public function Listar()
	{
		$sql = "SELECT * FROM marca";

		$resultado = $this->conexion->ConsultaResult($sql);

		return $resultado;

		$this->conexion->Liberar($resultado);

		$this->conexion->Cerrarconex();
	}
}
 ?>