<?php 
class conexion
{
	private $server;
	private $user;
	private $pass;
	private $dbname;


//CONSTRUCTOR DE LA CLASE
	public function __construct()
	{
		$this->server = "localhost";
		$this->user   = "root";
		$this->pass   = "";
		$this->dbname = "nettick";

		$conexion = mysql_connect($this->server, $this->user, $this->pass);
		
		if ($conexion)
		{
			mysql_select_db($this->dbname, $conexion);
			mysql_set_charset('utf8',$conexion);
		} 
		else
		{
			echo "Error en la conexion a la base de datos.";
		}
	}


//DESTRUCTOR DE LA CLASE
	public function __destruct(){ }



//MANDAR UNA CONSULTA INSERT UPDATE DELETE
	public function Consulta($sql)
	{
		mysql_query($sql);

	}

//MANDAR UNA CONSULTA PARA RETORNAR DATOS
	public function ConsultaResult($sql)
	{
		$resultado = mysql_query($sql);

		return $resultado;
	}


//CERRAMOS LA CONSULTA PARA LIBERAR MEMORIA
	public function Liberar($sql)
	{
		mysql_free_result($sql);
	}

//CERRAR CONEXION
	public function Cerrarconex()
	{
		mysql_close();
	}

}
?>