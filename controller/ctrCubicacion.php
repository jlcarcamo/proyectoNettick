<?php
include_once('../model/cubicacion.php'); 

class ctrCubicacion 
{
	private $cubicacion;
	

	function __construct()
	{
		$this->cubicacion = new cubicacion();
	}

	//METODOS DE CONTROLADOR

	public function crearCubicacion($idProyecto)
	{
		$this->cubicacion->set("fecha_creacion", date("Y-m-d"));
		$this->cubicacion->set("estado", 3);
		$this->cubicacion->set("idProyecto", $idProyecto);

		
		$this->cubicacion->crearCubicacion();
	}

	public function verificarCubicacion($idProyecto)
	{
		$this->cubicacion->set("idProyecto", $idProyecto);
		$resultado = $this->cubicacion->verificarCubicacion();
		
		return $resultado;
	}

	


}

?>
