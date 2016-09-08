<?php 
include_once('../model/actividad.php');

class ctrActividad
{
	private $actividad;

	function __construct()
	{
		$this->actividad = new actividad();
	}

	public function buscar($idCategoria)
	{
		$this->actividad->set("idCategoria", $idCategoria);
		$dato = $this->actividad->Buscar();
		return $dato;
	}

	public function listarActividad()
	{
		$resultado = $this->actividad->listarActividad();
		return $resultado;
	}


	public function insertarActividad($nombre_actividad, $idCategoria, $descripcion)
	{
		$this->actividad->set("nombre_actividad", $nombre_actividad);
		$this->actividad->set("idCategoria", $idCategoria);
		$this->actividad->set("descripcion", $descripcion);
	
		$this->actividad->insertarActividad();

	}

	public function buscarPorId($idActividad)
	{
		$this->actividad->set("idActividad", $idActividad);
		$dato = $this->actividad->buscarPorId();
		return $dato;
	}

	public function agregarMaterialActividad($idActividad, $idMaterial, $cantMaterial, $tipo)
	{
		$this->actividad->set("idActividad", $idActividad);
		$this->actividad->set("idMaterial", $idMaterial);
		$this->actividad->set("cantMaterial", $cantMaterial);
		$this->actividad->set("tipo", $tipo);

	
		$this->actividad->agregarMaterialActividad();
	}	

		public function buscarNubMatAct($idMaterial, $idActividad)
	{
		$this->actividad->set("idMaterial", $idMaterial);
		$this->actividad->set("idActividad", $idActividad);

		$dato = $this->actividad->buscarNubMatAct();
		return $dato;
	}
}
 ?>