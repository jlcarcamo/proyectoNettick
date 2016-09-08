<?php
include_once('../model/solicitud.php'); 

class ctrSolicitud 
{
	private $solicitud;
	
	function __construct()
	{
		$this->solicitud = new solicitud();
	}

	//METODOS DE CONTROLADOR
	public function crearSolicitud($fechaSolicitud, $descripcion, $nombre_contacto, $apellido_contacto, $cargo, $telefono_contacto, $correo)
	{
		$this->solicitud->set("fechaSolicitud", $fechaSolicitud);
		$this->solicitud->set("descripcion", $descripcion);
		$this->solicitud->set("nombre_contacto", $nombre_contacto);
		$this->solicitud->set("apellido_contacto", $apellido_contacto);
		$this->solicitud->set("cargo", $cargo);
		$this->solicitud->set("telefono_contacto", $telefono_contacto);
		$this->solicitud->set("correo", $correo);
		$this->solicitud->set("idEstado", 1);

		$this->solicitud->crearSolicitud();
	}


	public function buscarSolicitud($idSolicitud)
	{
		$this->solicitud->set("idSolicitud", $idSolicitud);
		$resultado = $this->solicitud->buscarSolicitud();
		return $resultado;
	}

	public function listarSolicitud()
	{
		$resultado = $this->solicitud->listarSolicitud();
		return $resultado;
	}

	public function modificarEstado($idEstado){

		$this->solicitud->set("idEstado", $idEstado);

		$resultado = $this->solicitud->modificarEstado();

		return $resultado;
	}

}

?>