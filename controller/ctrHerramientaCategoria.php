<?php 
include_once('../model/herramientaCategoria.php');


class ctrHerramientaCategoria
{
	
	private $herramientaCategoria;

	function __construct()
	{
		$this->herramientaCategoria = new herramientaCategoria();
	}

	//CONTROLADOR DE METODOS DE MODELO
	public function Listar()
	{
		$resultado = $this->herramientaCategoria->Listar();
		return $resultado;
	}

}

 ?>