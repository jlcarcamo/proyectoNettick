<?php 
include_once('../model/unidadM.php');


class ctrUnidadM
{
	
	private $unidadM;

	function __construct()
	{
		$this->unidadM = new unidadM();
	}

	//CONTROLADOR DE METODOS DE MODELO
	public function Listar()
	{
		$resultado = $this->unidadM->Listar();
		return $resultado;
	}
}
 ?>