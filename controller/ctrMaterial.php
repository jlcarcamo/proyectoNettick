<?php 
include_once("../model/material.php");


$btn = $_POST['boton'];

if ($btn==='buscar') 
{
	$valor = $_POST['valor'];

	$inst = new material();

	$res = $inst->buscarMaterial($valor);

		//print_r($res);enco
	echo json_encode($res);
}

























class ctrMaterial
{
	private $material;

	function __construct()
	{
		$this->material = new material();
	}


	public function buscarPorActividad($idActividad)
	{
		$this->material->set("idActividad", $idActividad);
		$dato = $this->material->buscarPorActividad();
		return $dato;
	}


	public function listarMaterial()
	{
		$resultado = $this->material->listarMaterial();
		return $resultado;
	}

	public function insertarMaterial($nombre_material, $cod_fabricante, $descripcion, $idUnidad, $idMarca)
	{
		$this->material->set("nombre_material", $nombre_material);
		$this->material->set("cod_fabricante", $cod_fabricante);
		$this->material->set("descripcion", $descripcion);
		$this->material->set("idUnidadM", $idUnidad);
		$this->material->set("idMarca", $idMarca);

		$this->material->insertarMaterial();

	}

	public function buscarPorId($idMaterial)
	{
		$this->material->set("idMaterial", $idMaterial);
		$dato = $this->material->buscarPorId();
		return $dato;
	}

		public function eliminarMaterial($idMaterial)
	{
		$this->material->set("idMaterial", $idMaterial);

		$this->material->eliminarMaterial();
	}

	public function editarMaterial($idMaterial, $nombre_material, $cod_fabricante, $idUnidadM, $idMarca, $descripcion)
	{
		$this->material->set("idMaterial", $idMaterial);
		$this->material->set("nombre_material", $nombre_material);
		$this->material->set("cod_fabricante", $cod_fabricante);
		$this->material->set("idUnidadM", $idUnidadM);
		$this->material->set("idMarca", $idMarca);
		$this->material->set("descripcion", $descripcion);
		
		$resultado = $this->material->editarMaterial();

		return $resultado;
	}


	public function buscarMaterial()
	{
		$btn = $_POST['boton'];

		if ($btn==='buscar') 
		{
			$valor = $_POST['valor'];

			$res = $material->buscarMaterial($valor);

		//print_r($res);
		echo json_encode($res);
		}
	


	}



}
 ?>