<?php 
	include_once('../conexion/conexion.php');

class herramientaCategoria
{
	private $idherramienta_categoria;
	private $nombre_categoria;
	private $descripcion;

	
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
	//LISTAR Categorias de herramientas

	public function Listar()
	{
		$sql = "SELECT * FROM herramienta_categoria";

		$resultado = $this->conexion->ConsultaResult($sql);

		return $resultado;

		$this->conexion->Liberar($resultado);

		$this->conexion->Cerrarconex();
	}
}
 ?>