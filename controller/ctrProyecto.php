<?php
include_once('../model/proyecto.php'); 

class ctrProyecto
{
	private $proyecto;
	
	function __construct()
	{
		$this->proyecto = new proyecto();
	}
	
	//METODOS DE CONTROLADOR
	public function crearProyecto($nombre_proyecto, $prioridad, $fechaIngreso, $idSolicitud)
	{
		$this->proyecto->set("nombre_proyecto", $nombre_proyecto);
		$this->proyecto->set("prioridad", $prioridad);
		$this->proyecto->set("fechaIngreso", $fechaIngreso);
		$this->proyecto->set("idSolicitud", $idSolicitud);
		
		$res_id = $this->proyecto->crearProyecto();
	
		return $res_id;
	}
	
	public function asignarEncargado($idProyecto, $idTrabajador, $encargado)
	{
		$this->proyecto->set("idProyecto", $idProyecto);
		$this->proyecto->set("idTrabajador", $idTrabajador);
		$this->proyecto->set("encargado", $encargado);
		
		$this->proyecto->asignarEncargado();
	
		//return $resultadoId = mysql_insert_id();
	}

	public function verificarProyecto($idSolicitud)
	{
		$this->proyecto->set("idSolicitud", $idSolicitud);
		$resultado = $this->proyecto->verificarProyecto();
		
		return $resultado;
	}

	public function listarProyecto()
	{
		$resultado = $this->proyecto->listarProyecto();
		return $resultado;
	}

	public function buscarEncargado($idSolicitud)
	{
		$this->proyecto->set("idSolicitud", $idSolicitud);
		$resultado = $this->proyecto->buscarEncargado();
		return $resultado;
	}

	public function encargadoProyecto($idProyecto)
	{
		$this->proyecto->set("idProyecto", $idProyecto);
		$resultado = $this->proyecto->encargadoProyecto();
		return $resultado;
	}

	public function encargadoCubicacion($idProyecto)
	{
		$this->proyecto->set("idProyecto", $idProyecto);
		$resultado = $this->proyecto->encargadoCubicacion();
		return $resultado;
	}


	public function editarProyecto($idProyecto, $sector, $piso, $descripcion, $observacion, $compromisos)
	{
		$this->proyecto->set("idProyecto", $idProyecto);
		$this->proyecto->set("sector", $sector);
		$this->proyecto->set("piso", $piso);
		$this->proyecto->set("descripcion", $descripcion);
		$this->proyecto->set("observacionInicial", $observacion);
		$this->proyecto->set("compromisos", $compromisos);
			
		
		$resultado = $this->proyecto->editarProyecto();

		return $resultado;

	}

	public function buscarProyecto($idProyecto)
	{
		$this->proyecto->set("idProyecto", $idProyecto);
		$resultado = $this->proyecto->buscarProyecto();
		return $resultado;
	}


}

?>