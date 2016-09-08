<?php 
include_once("../model/herramienta.php");

class ctrHerramienta
{
	private $herramienta;

	function __construct()
	{
		$this->herramienta = new herramienta();
	}


	public function listarHerramienta()
	{
		$resultado = $this->herramienta->listarHerramienta();
		return $resultado;
	}


	public function insertarHerramienta($nombre_herramienta, $descripcion, $idCategoria)
	{
		$this->herramienta->set("nombre_herramienta", $nombre_herramienta);
		$this->herramienta->set("descripcion", $descripcion);
		$this->herramienta->set("idCategoria", $idCategoria);
	
		$resultado_id = $this->herramienta->insertarHerramienta();

		return $resultado_id;

	}

    public function buscarPorId($idHerramienta)
	{
		$this->herramienta->set("idHerramienta", $idHerramienta);
		$dato = $this->herramienta->buscarPorId();
		return $dato;
	}

	public function editarHerramienta($idHerramienta, $nombre_herramienta, $descripcion, $idCategoria)
	{
		$this->herramienta->set("idHerramienta", $idHerramienta);
		$this->herramienta->set("nombre_herramienta", $nombre_herramienta);
		$this->herramienta->set("descripcion", $descripcion);
		$this->herramienta->set("idCategoria", $idCategoria);
		
		
		
		$resultado = $this->herramienta->editarHerramienta();

		return $resultado;
	}

	public function eliminarHerramienta($idHerramienta)
	{
		$this->herramienta->set("idHerramienta", $idHerramienta);

		$this->herramienta->eliminarHerramienta();
	}
}