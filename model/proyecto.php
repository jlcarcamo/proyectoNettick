<?php 
	include_once('../conexion/conexion.php');

class proyecto
{
	private $idProyecto;
	private $nombre_proyecto;
	private $descripcion;
	private $prioridad;
	private $fechaIngreso;
	private $fechaModificacion;
	private $piso;
	private $sector;	
	private $observacionInicial;
	private $observacionFinal;	
	private $compromisos;
	private $idSolicitud;
	//variables NUB
	private $idTrabajador;
	private $encargado;//BOOLEAN 


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
	//CREAR primera parte del proyecto (nombre, prioridad, encargados.)
	public function crearProyecto()
	{
		$sql = "INSERT INTO proyecto(nombre_proyecto, prioridad, fechaIngreso, solicitud_idsolicitud)
				VALUES ('{$this->nombre_proyecto}','{$this->prioridad}','{$this->fechaIngreso}','{$this->idSolicitud}')";
		
		$this->conexion->Consulta($sql);

		return $resultadoId = mysql_insert_id();

		$this->conexion->Cerrarconex();
	}

	//se edita proyecto creado para completar segunda parte.
	public function editarProyecto()
	{
		$sql = "UPDATE proyecto 
				SET sector = '{$this->sector}', piso = '{$this->piso}', descripcion = '{$this->descripcion}', observacionInicial = '{$this->observacionInicial}', compromisos = '{$this->compromisos}'
				WHERE idProyecto = '{$this->idProyecto}'";

		$resultado = $this->conexion->ConsultaResult($sql);
		return $resultado;
		$this->conexion->Cerrarconex();
	}

	//verifica si ya fue creado el proyecto para una solicitud
	public function verificarProyecto()
	{
		$sql = "SELECT p.solicitud_idsolicitud FROM proyecto p WHERE p.solicitud_idsolicitud = '{$this->idSolicitud}'";

		$resultado = $this->conexion->ConsultaResult($sql);

		$row = mysql_num_rows($resultado);

		return $row;
	}

	//asignar encargado de proyecto y de cubicacion
	public function asignarEncargado()
	{
		$sql = "INSERT INTO proyecto_has_trabajador(proyecto_idProyecto, trabajador_idTrabajador, encargado) VALUES('{$this->idProyecto}', '{$this->idTrabajador}','{$this->encargado}')";

		$this->conexion->Consulta($sql);

		//$this->conexion->Cerrarconex();
	}

	// lista proyectos varios
	public function listarProyecto()
	{
		$sql = "SELECT p.idProyecto, p.nombre_proyecto, p.prioridad , p.fechaIngreso FROM proyecto p";

		$resultado = $this->conexion->ConsultaResult($sql);
		
		return $resultado;

		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	//muestra a supervisor y tecnico encargado del proyecto
	public function buscarEncargado()
	{
		$sql = "SELECT tr.nombre_trabajador, tr.apellidoP, tr.apellidoM
  				FROM trabajador tr 
  				INNER JOIN proyecto_has_trabajador pht ON tr.idtrabajador = pht.trabajador_idTrabajador 
  				INNER JOIN proyecto pr ON pht.proyecto_idProyecto = pr.idProyecto 
  				WHERE pr.solicitud_idsolicitud = '{$this->idSolicitud}' AND pht.encargado = 1";

		$resultado = $this->conexion->ConsultaResult($sql);	
		return $resultado;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	public function encargadoProyecto()
	{
		$sql = "SELECT tr.nombre_trabajador, tr.apellidoP, tr.apellidoM
				FROM cargo car
				INNER JOIN trabajador tr ON car.idcargo = tr.cargo_idcargo
				INNER JOIN proyecto_has_trabajador pht ON tr.idtrabajador = pht.trabajador_idTrabajador
				WHERE car.idcargo = 2 AND  pht.proyecto_idProyecto = '{$this->idProyecto}'";

		$resultado = $this->conexion->ConsultaResult($sql);
		
		$row = mysql_fetch_array($resultado);

		return $row;

		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	public function encargadoCubicacion()
	{
		$sql = "SELECT tr.nombre_trabajador, tr.apellidoP, tr.apellidoM
				FROM cargo car
				INNER JOIN trabajador tr ON car.idcargo = tr.cargo_idcargo
				INNER JOIN proyecto_has_trabajador pht ON tr.idtrabajador = pht.trabajador_idTrabajador
				WHERE car.idcargo = 3 AND  pht.proyecto_idProyecto = '{$this->idProyecto}'";

		$resultado = $this->conexion->ConsultaResult($sql);
		$row = mysql_fetch_array($resultado);

		return $row;

		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}



	//busca- VER proyecto seleccionado en lista
	public function buscarProyecto()
	{
		$sql = "SELECT * FROM proyecto p where p.idProyecto = '{$this->idProyecto}'";

		$resultado = $this->conexion->ConsultaResult($sql);
		
		$row = mysql_fetch_array($resultado);

		return $row;

		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}



}
 ?>