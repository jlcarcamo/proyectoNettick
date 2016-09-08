<?php 
include_once('../model/rubro.php');


class ctrRubro
{
	
	private $rubro;

	function __construct()
	{
		$this->rubro = new rubro();
	}

	//CONTROLADOR DE METODOS DE MODELO
	public function Listar()
	{
		$resultado = $this->rubro->Listar();
		return $resultado;
	}

}
 ?>