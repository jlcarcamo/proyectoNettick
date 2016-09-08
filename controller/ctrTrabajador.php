<?php
include_once('../model/trabajador.php');
class ctrTrabajador
{
	private $trabajador;
	
	function __construct()
	{
		$this->trabajador = new trabajador();
	}


	public function listarSupervisores(){

		$resultado = $this->trabajador->listarSupervisores();
		return $resultado;
	}

	public function listarTecnicos(){

		$resultado = $this->trabajador->listarTecnicos();
		return $resultado;
	}

	public function Login($rut, $contraseña)
	{
		$this->trabajador->set("rut", $rut);
		$this->trabajador->set("contraseña", $contraseña);
		$dato = $this->trabajador->Login();

		return $dato;
	}

	public function Tiempo()
	{
		$this->trabajador->Tiempo();
	}

}
?>