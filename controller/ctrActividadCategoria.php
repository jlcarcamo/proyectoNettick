<?php 
include_once('../model/actividadCategoria.php');


class ctrActividadCategoria
{
	private $actividadCategoria;

	function __construct()
	{
		$this->actividadCategoria = new actividadCategoria();
	}

	public function buscar($idRubro)
	{
		$this->actividadCategoria->set("idRubro", $idRubro);
		$dato = $this->actividadCategoria->Buscar();
		return $dato;
	}


}
 ?>