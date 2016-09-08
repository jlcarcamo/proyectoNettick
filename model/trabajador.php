<?php 
	include_once('../conexion/conexion.php');

class trabajador
{
	private $idTrabajador;
	private $nombre_trabajador;
	private $apellidoP;
	private $apellidoM;
	private $rut;
	private $observacion;
	private $idCargo;
	private $contraseña;
	private $conexion;
	
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

	public function listarSupervisores()
	{
		$sql = "SELECT t.idtrabajador, t.nombre_trabajador, t.apellidoP FROM trabajador t INNER JOIN cargo c on t.cargo_idcargo = c.idcargo WHERE t.cargo_idcargo = 2";

		$resultado = $this->conexion->ConsultaResult($sql);
		return $resultado;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	public function listarTecnicos()
	{
		$sql = "SELECT t.idtrabajador, t.nombre_trabajador, t.apellidoP FROM trabajador t INNER JOIN cargo c on t.cargo_idcargo = c.idcargo WHERE t.cargo_idcargo = 3";

		$resultado = $this->conexion->ConsultaResult($sql);
		return $resultado;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}	




	public function Login()
	{
		$sql = "SELECT t.rut , t.contraseña FROM trabajador t WHERE t.rut = '{$this->rut}' AND t.contraseña = '{$this->contraseña}'";

		$resultado = $this->conexion->ConsultaResult($sql);
		return $resultado;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	public function Tiempo()
	{
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) 
		{

		}else
		{
			echo "Esta pagina es solo para usuarios registrados.<br>";
			echo "<br><a href='index.php'>Login</a>";
			exit;
		}

		$now = time();
		 
		if($now > $_SESSION['expire'])
		{
			session_destroy();		 
			echo "Su sesion a terminado,
			<a href='index.php'>Ingresar</a>";
			exit;
		}

	}


}
 ?>