<?php 
	include_once('../conexion/conexion.php');

class unidadM
{
	private $idunidadM;
	private $nombre_unidad;
	private $unidad_medida;

	
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
		$sql = "SELECT * FROM unidadm";

		$resultado = $this->conexion->ConsultaResult($sql);

		return $resultado;

		$this->conexion->Liberar($resultado);

		$this->conexion->Cerrarconex();
	}
}
 ?>