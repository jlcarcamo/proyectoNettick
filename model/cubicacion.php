<?php
include_once('../conexion/conexion.php');

class cubicacion 
{
	private $idCubicacion;
	private $fecha_creacion;
	private $fecha_modificacion;
	private $fecha_envio;
	private $fecha_aprobacion;
	private $estado;

	private $idProyecto;


	
	public function __construct()
	{
		$this->conexion = new conexion();
	}

	public function __destruct(){}

	//accesores y mutadores
	public function set($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}

	public function get($atributo)
	{
		return $this->$atributo;
	}
	

	//METODO CREAR CUBICACION
	public function crearCubicacion()
	{
		$sql = "INSERT INTO cubicacion(idCubicacion, fecha_creacion, Estado_idEstado, proyecto_idProyecto) 
				VALUES ('{$this->idCubicacion}', '{$this->fecha_creacion}', '{$this->estado}', '{$this->idProyecto}')";

		$resultado = $this->conexion->Consulta($sql);

		//$this->conexion->Liberar($resultado);

		$this->conexion->Cerrarconex();

	}

	//Verifica si cubicacion fue creada
	public function verificarCubicacion()
	{
		$sql = "SELECT c.idCubicacion, c.proyecto_idProyecto FROM cubicacion c WHERE c.proyecto_idProyecto = '{$this->idProyecto}' LIMIT 1";

		$resultado = $this->conexion->ConsultaResult($sql);

		$row = mysql_fetch_array($resultado);

		return $row;

		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}




	/*


	public function Listar()
	{
		$sql = "SELECT c.idCubicacion, c.fecha_creacion, e.nombre_estado FROM cubicacion c INNER JOIN estado e" on e.idEstado = c.Estado_idEstado;

		$resultado = $this->con->ConsultaResult($sql);

		return $resultado;

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}




		public function Buscar()
	{
		$sql = "SELECT idCubicacion, estado, fecha_creacion FROM cubicacion WHERE idCubicacion = '{$this->idCubicacion}' LIMIT 1";

		$resultado = $this->con->ConsultaResult($sql);

		$row = mysql_fetch_array($resultado);

		return $row;

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}

		public function Editar()
	{
		$sql = "UPDATE cubicacion 
				SET estado = '{$this->estado}', fecha_creacion = '{$this->fecha_creacion}' 
				WHERE idCubicacion = '{$this->idCubicacion}'";

		$resultado = $this->con->Consulta($sql);

		$this->con->Liberar($resultado);

		$this->con->Cerrarconex();
	}
	*/
}
?>