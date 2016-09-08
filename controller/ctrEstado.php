<?php 
include_once('../model/estado.php');
class ctrEstado
{
	
	private $estado;

	function __construct()
	{
		$this->estado = new estado();
	}

	//CONTROLADOR DE METODOS DE MODELO
	public function buscarEstado($idEstado)
	{
		$this->estado->set("idEstado", $idEstado);
		$dato = $this->estado->buscarEstado();
		return $dato;
	}


}
 ?>