<?php
include_once("../conexion/conexion.php"); 
class actividadCub
{
	private $idActividadCub;
	private $idActividadPlantilla;
	private $cantidad;
	private $tiempo_proyeccion;
	private $tiempo_real;
	private $idCubicacion;
	private $descripcion;

	//Parametros NUB
	private $idMaterial ;
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



	//metodo insertar Actividad a cubicacion
	public function insertarActividadCub()
	{
		$sql = "INSERT INTO actividad_cub(Actividad_plantilla_idActividad, Cubicacion_idCubicacion) VALUES ('{$this->idActividadPlantilla}','{$this->idCubicacion}')";

		$this->conexion->Consulta($sql);

		return $resultadoId = mysql_insert_id();

		$this->conexion->Cerrarconex();
	}

	public function agregarMaterialActividadCub()
	{
		$sql = "INSERT INTO material_has_actividad_cub(Actividad_Cub_idActividad_Cub, Material_idMaterial, cantMaterial, tipo) VALUES ";

		$idCub = $this->idActividadCub;
		$idMat = $this->idMaterial;
		$cantM = $this->cantMaterial;
		$tipo = $this->tipo;


		echo var_dump($idMat);

		//recorro los valores del array, de primero a último
		for($i = 0; $i < count($idMat); $i++)
		{
    	
    	$sql .= sprintf("('%s', '%s', '%s', '%s'),", $idCub, $idMat[$i], $cantM[$i], $this->tipo[$i]);
		}

 		//a cada paso añado a la consulta de inserción cada uno de los valores entrecomillado y entre paréntesis, seguido por una coma
    	$sql=rtrim($sql,',');//elimino la última coma sobrante
		

		echo $sql;

		$this->conexion->Consulta($sql);
		$this->conexion->Cerrarconex();
	}



	public function itemizadoCubicacion()
	{
		$sql = "SELECT acc.idActividad_Cub, acp.nombre_act, r.nombre_rubro
				FROM actividad_plantilla acp 
				INNER JOIN actividad_cub acc ON acp.idActividad = acc.Actividad_Plantilla_idActividad 
                INNER JOIN actividad_categoria ac ON acp.idActividad_categoria = ac.idActividad_categoria
                INNER JOIN rubro r ON ac.Rubro_idRubro = r.idRubro
				WHERE acc.Cubicacion_idCubicacion = '{$this->idCubicacion}' ;
";

		$resultado = $this->conexion->ConsultaResult($sql);

		return $resultado;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

}



		

