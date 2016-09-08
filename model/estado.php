<?php 
include_once('../conexion/conexion.php');

class estado
{
	private $idEstado;
	private $nombre_estado;
	

	public function __construct()
	{
		$this->conexion = new conexion();
	}

	//GETTER AND SETTER
	public function __destruct(){}

	public function set($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}

	public function get($atributo)
	{
		return $this->$atributo;
	}

	//METODOS

	public function buscarEstado()
	{
		$sql = "SELECT * FROM estado where idEstado = '{$this->idEstado}' LIMIT 1";

		$resultado = $this->conexion->ConsultaResult($sql);

		$row = mysql_fetch_array($resultado);
		return $row;

		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	/*
	public function Eliminar()
	{
		$objConex = new clsConexion();
		$sql = "DELETE FROM pais WHERE (id = '{$this->id}')";
		$resultado = $this->con->Consulta($sql);
		$this->con->Liberar($resultado);
				
		$this->con->Cerrarconex();
	}
	*/
}
?>