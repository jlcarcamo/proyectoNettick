<?php
include_once("../conexion/conexion.php"); 
class Herramienta
{
	private $idHerramienta;
	private $nombre_herramienta;
	private $idCategoria;
	private $descripcion;

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


	//METODOS MANTENEDOR DE HERRAMIENTAS
	//METODO LISTAR(MANTENEDOR)
	public function listarHerramienta()
	{
		$sql = "SELECT he.idHerramienta,  he.nombre_herramienta, hec.nombre_categoria, he.descripcion
 			FROM herramienta he INNER JOIN herramienta_categoria hec ON he.herramienta_categoria_idherramienta_categoria = hec.idherramienta_categoria ORDER BY hec.nombre_categoria ASC";
		

		$resultado = $this->conexion->ConsultaResult($sql);
		return $resultado;

		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	//METODO INSERTAR(MANTENEDOR)
	public function insertarHerramienta()
	{
		$sql = "INSERT INTO herramienta(nombre_herramienta,descripcion, herramienta_categoria_idherramienta_categoria) VALUES ('{$this->nombre_herramienta}','{$this->descripcion}','{$this->idCategoria}')";

		$this->conexion->Consulta($sql);

		$sql_id = "SELECT LAST_INSERT_ID()";

		return $resultado_id = $this->conexion->Consulta($sql_id);

		//$this->conexion->Cerrarconex();
	}

	//METODO BUSCAR HERRAMIENTA POR ID(para editar MANTENEDOR)
	public function buscarPorId()
	{
		$sql = "SELECT he.idHerramienta, he.nombre_herramienta, he.descripcion, hec.nombre_categoria
				FROM herramienta he INNER JOIN herramienta_categoria hec on he.herramienta_categoria_idherramienta_categoria = hec.idherramienta_categoria WHERE he.idHerramienta = '{$this->idHerramienta}' LIMIT 1";

		$resultado = $this->conexion->ConsultaResult($sql);

		$row = mysql_fetch_array($resultado);

		return $row;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	//Editar Material(MANTENEDOR)
	public function editarHerramienta()
	{
		$sql = "UPDATE herramienta 
				SET nombre_herramienta = '{$this->nombre_herramienta}', descripcion = '{$this->descripcion}', herramienta_categoria_idherramienta_categoria = '{$this->idCategoria}' 
				WHERE idHerramienta = '{$this->idHerramienta}'";

		$resultado = $this->conexion->ConsultaResult($sql);
		return $resultado;
		$this->conexion->Cerrarconex();
	}


	public function eliminarHerramienta()
	{
		$sql = "DELETE FROM herramienta WHERE (idHerramienta = '{$this->idHerramienta}')";

		$resultado = $this->conexion->Consulta($sql);

		//$this->conexion->Liberar($resultado);
				
		$this->conexion->Cerrarconex();
	}
}