<?php 
include_once('../conexion/conexion.php');
/**
* 
*/
class actividadCategoria
{

	private $idactividad_categoria;
	private $nombre_categoria;
	private $descripcion;
	private $idRubro;
	

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


	//METODO

	public function Buscar()
	{
		$sql = "SELECT ac.idActividad_categoria,ac.nombre_categoria, ac.descripcion, r.nombre_rubro FROM actividad_categoria ac INNER JOIN rubro r ON r.idRubro = ac.Rubro_idRubro
			WHERE ac.Rubro_idRubro = '{$this->idRubro}'";

		$resultado = $this->conexion->ConsultaResult($sql);

		return $resultado;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();	
	}


}

 ?>