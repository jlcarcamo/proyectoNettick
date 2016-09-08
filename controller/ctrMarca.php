<?php 
include_once('../model/marca.php');


class ctrMarca
{
	
	private $marca;

	function __construct()
	{
		$this->marca = new marca();
	}

	//CONTROLADOR DE METODOS DE MODELO
	public function Listar()
	{
		$resultado = $this->marca->Listar();
		return $resultado;
	}

}

 ?>