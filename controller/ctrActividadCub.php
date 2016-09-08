<?php 
include_once('../model/actividadCub.php');

class ctrActividadCub
{
	private $actividadCub;

	function __construct()
	{
		$this->actividadCub = new actividadCub();
	}



	public function insertarActividadCub($idActividadPlantilla, $idCubicacion)
	{
		$this->actividadCub->set("idActividadPlantilla", $idActividadPlantilla);
		$this->actividadCub->set("idCubicacion", $idCubicacion);

    	$res_id = $this->actividadCub->insertarActividadCub();
	
		return $res_id;

	}


	public function agregarMaterialActividadCub($idActividadCub, $idMaterial, $cantMaterial, $tipo)
	{
		$this->actividadCub->set("idActividadCub", $idActividadCub);
		$this->actividadCub->set("idMaterial", $idMaterial);
		$this->actividadCub->set("cantMaterial", $cantMaterial);
		$this->actividadCub->set("tipo", $tipo);

		$this->actividadCub->agregarMaterialActividadCub();
	}

	public function itemizadoCubicacion($idCubicacion)
	{
		$this->actividadCub->set("idCubicacion", $idCubicacion);

		$resultado = $this->actividadCub->itemizadoCubicacion();

		return $resultado;
	}
	
}
 ?>