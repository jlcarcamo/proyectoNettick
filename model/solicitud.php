<?php 
	include_once('../conexion/conexion.php');

class solicitud
{
	private $idSolicitud;	
	private $fechaSolicitud;	
	private $descripcion;
	private $hora_visita;		
	private $nombre_contacto;
	private $apellido_contacto;
	private $cargo;
	private $telefono_contacto;	
	private $correo;
	private $idEstado;
	
	public function __construct()
	{
		$this->conexion = new conexion();
	}

	public function __destruct(){}

	//GETTER AND SETTER
	public function set($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}

	public function get($atributo)
	{
		return $this->$atributo;
	}

	//METODOS
	//Insertar contacto

	public function crearSolicitud()
	{
		$sql = "INSERT INTO solicitud(fechaSolicitud, descripcion,nombre_contacto, apellido_contacto, cargo, telefono_contacto, correo, Estado_idEstado) 
			VALUES ('{$this->fechaSolicitud}','{$this->descripcion}','{$this->nombre_contacto}', '{$this->apellido_contacto}','{$this->cargo}','{$this->telefono_contacto}', '{$this->correo}','{$this->idEstado}')";

		$resultado = $this->conexion->Consulta($sql);
		$this->conexion->Cerrarconex();
	}

 	public function buscarSolicitud()
	{
		$sql = "SELECT  sol.idsolicitud, sol.nombre_contacto, sol.apellido_contacto, sol.cargo,sol.telefono_contacto, sol.correo, sol.descripcion, sol.fechaSolicitud, es.nombre_estado FROM solicitud sol INNER JOIN estado es ON sol.Estado_idEstado = es.idEstado where sol.idsolicitud = '{$this->idSolicitud}' LIMIT 1";

		$resultado = $this->conexion->ConsultaResult($sql);

		$row = mysql_fetch_array($resultado);

		return $row;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	public function modificarSolicitud()
	{
		$sql = "UPDATE solicitud 
				SET hora_visita = '{$this->hora_visita}'
				WHERE idSolicitud = '{$this->idSolicitud}'";

		$resultado = $this->conexion->Consulta($sql);
		$this->conexion->Cerrarconex();
	}

	public function modificarEstado()
	{
		$sql = "UPDATE solicitud 
				SET Estado_idEstado = '{$this->idEstado}'
				WHERE idSolicitud = '{$this->idSolicitud}'";

		$resultado = $this->conexion->Consulta($sql);
		$this->conexion->Cerrarconex();

	}


	public function listarSolicitud()
	{
		$sql = "SELECT sol.idsolicitud, sol.nombre_contacto, sol.apellido_contacto, sol.correo, sol.fechaSolicitud, es.nombre_estado FROM solicitud sol INNER JOIN estado es ON sol.Estado_idEstado = es.idEstado ";

		$resultado = $this->conexion->ConsultaResult($sql);

		return $resultado;

		$this->conexion->Liberar($resultado);

		$this->conexion->Cerrarconex();

	}
}
 ?>