<?php
include_once("../conexion/conexion.php"); 
class actividad
{
	private $idActividad;
	private $nombre_act;
	private $valor;
	private $tiempo_ejecucion;
	private $idCubicacion;
	private $idCategoria;
	private $descripcion;

	private $idMaterial;
	private $cantMaterial;
	private $tipo;

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


	//METODO BUSCAR ACTIVIDAD POR CATEGORIA - LUEGO LISTA ACTIVIDAD
	public function Buscar()
	{
		$sql = "SELECT a.idActividad ,a.nombre_act, a.valor, a.tiempo_ejecucion 
			FROM actividad_plantilla a INNER JOIN actividad_categoria ac ON ac.idActividad_categoria = 
			a.idActividad_categoria
			WHERE ac.idActividad_categoria = '{$this->idCategoria}'";

		$resultado = $this->conexion->ConsultaResult($sql);

		return $resultado;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}




	//MANTENEDOR DE ACTIVIDADES
	//METODO LISTAR(MANTENEDOR)
	public function listarActividad()
	{
		$sql = "SELECT ac.idActividad, ac.nombre_act, acc.nombre_categoria FROM actividad_plantilla ac INNER JOIN actividad_categoria acc ON ac.idActividad_categoria = acc.idActividad_categoria ORDER BY acc.nombre_categoria ASC";
		

		$resultado = $this->conexion->ConsultaResult($sql);
		return $resultado;

		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	//metodo insertar Actividad
	public function insertarActividad()
	{
		$sql = "INSERT INTO actividad_plantilla(nombre_act, idActividad_categoria, descripcion) VALUES ('{$this->nombre_act}','{$this->idCategoria}', '{$this->descripcion}')";
		$resultado = $this->conexion->Consulta($sql);
		$this->conexion->Cerrarconex();
	}

	//metodo buscarActividad por ID
	public function buscarPorId()
	{
		$sql = "SELECT act.idActividad, act.nombre_act, act.descripcion, ac.nombre_categoria, r.nombre_rubro FROM actividad_categoria ac INNER JOIN actividad_plantilla act ON ac.idActividad_categoria = act.idActividad_categoria INNER JOIN rubro r ON ac.Rubro_idRubro = r.idRubro  WHERE act.idActividad = '{$this->idActividad}'  LIMIT 1";

		$resultado = $this->conexion->ConsultaResult($sql);

		$row = mysql_fetch_array($resultado);

		return $row;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}



	public function editarActividad()
	{
		$sql = "UPDATE actividad_plantilla
				SET nombre_act = '{$this->nombre_act}', idActividad_categoria = '{$this->idCategoria}', descripcion = '{$this->descripcion}' 
				WHERE idActividad = '{$this->idActividad}'";

		$resultado = $this->conexion->ConsultaResult($sql);
		return $resultado;
		$this->conexion->Cerrarconex();
	}
	














	//CON ESTE METODO RELACIONAMOS LOS MATERIALES CON UNA ACTIVIDAD EN ESPECIFICO PARA REALIZAR LAS PLANTILLAS DE ACTIVIDADES
	public function agregarMaterialActividad()
	{
		$sql = "INSERT INTO material_has_actividad(Actividad_idActividad, Material_idMaterial, cantMaterial, tipo) VALUES ('{$this->idActividad}', '{$this->idMaterial}', '{$this->cantMaterial}', '{$this->tipo}')";

		$resultado = $this->conexion->Consulta($sql);
		$this->conexion->Cerrarconex();
	} 

	//busca los materiales seleccionados de la actividad_plantilla para ser agregados a la actividadCubicacion.
	public function buscarNubMatAct(){

	$sql = "SELECT mha.Actividad_idActividad, mha.Material_idMaterial, mha.cantMaterial , mha.tipo FROM material_has_actividad mha WHERE mha.Material_idMaterial = '{$this->idMaterial}' AND mha.Actividad_idActividad = '{$this->idActividad}'";

	$resultado = $this->conexion->ConsultaResult($sql);

	$row = mysql_fetch_array($resultado);

	return $row;
	$this->conexion->Liberar($resultado);
	$this->conexion->Cerrarconex();
	}


	//ELIMINA LA RELACION QUE TIENE UN MATERIAL CON UNA ACTIVIDAD_PLANTILLA
	public function eliminarMaterialActividad()
	{
		$sql = "DELETE FROM material_has_actividad WHERE(Material_idMaterial = '{$this->idMaterial}' AND Actividad_idActividad = '{$this->idActividad}')";

		$resultado = $this->conexion->Consulta($sql);

		//$this->conexion->Liberar($resultado);
				
		$this->conexion->Cerrarconex();
	}



}
