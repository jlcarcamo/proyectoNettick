<?php 
include_once("../model/material.php");

if (isset($_POST['boton'])) 
{
	if ($_POST['boton']==='buscar') 
	{
	$inst = new material();
	$res = $inst->buscarMaterial($_POST['valor']);
	echo json_encode($res);
	}

	
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


	public function buscarMaterial($valor)
	{
		$resultado = $this->material->buscarMaterial($valor);

		echo json_encode($resultado);

		
	
	}
}
