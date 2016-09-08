<?php
include_once('../conexion/conexion.php');

class material
{
	
	private $idMaterial;
	private $nombre_material;
	private $cod_fabricante;
	private $valor;
	private $idUnidadM;
	private $idMarca;
	private $descripcion;

	function __construct()
	{
		$this->conexion = new conexion();
	}

	//GETTER AND SETTER
	public function set($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}

	public function get($atributo)
	{
		return $this->$atributo;
	}


	//METODO BUSCAR Material POR ACTIVIDAD - LUEGO LISTA MATERIAL
	public function buscarPorActividad()
	{
		$sql = "SELECT m.idMaterial, m.nombre_material, m.cod_fabricante, m.valor, um.unidad_medida, ma.nombre_marca, mha.cantMaterial FROM actividad_plantilla ac INNER JOIN material_has_actividad mha ON ac.idActividad = mha.Actividad_idActividad INNER JOIN material m on mha.Material_idMaterial = m.idMaterial INNER JOIN unidadm um ON um.idunidadM = m.unidadM_idunidadM INNER JOIN marca ma ON m.Marca_idMarca = ma.idMarca WHERE ac.idActividad = '{$this->idActividad}';";

		$resultado = $this->conexion->ConsultaResult($sql);

		return $resultado;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	//METODOS MANTENEDOR DE MATERIALES
	//METODO LISTAR(MANTENEDOR)
	public function listarMaterial()
	{
		$sql = "SELECT m.idMaterial,  m.nombre_material, m.cod_fabricante, um.nombre_unidad, ma.nombre_marca FROM unidadm um INNER JOIN material m ON m.unidadM_idunidadM = um.idunidadM INNER JOIN marca ma ON ma.idMarca = m.Marca_idMarca ORDER BY m.nombre_material ASC";
		$resultado = $this->conexion->ConsultaResult($sql);
		
		return $resultado;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}
	

	//METODO INSERTAR(MANTENEDOR)
	public function insertarMaterial()
	{
		$sql = "INSERT INTO material(nombre_material, cod_fabricante,descripcion, unidadM_idunidadM, Marca_idMarca) VALUES ('{$this->nombre_material}','{$this->cod_fabricante}','{$this->descripcion}','{$this->idUnidadM}','{$this->idMarca}')";

		$resultado = $this->conexion->Consulta($sql);
		
		$this->conexion->Cerrarconex();
	}



	//METODO BUSCAR MATERIAL POR ID(para editar MANTENEDOR)
	public function buscarPorId()
	{
		$sql = "SELECT m.idMaterial, m.nombre_material, m.cod_fabricante, m.valor, un.nombre_unidad, mar.nombre_marca, m.descripcion FROM unidadm un INNER JOIN material m on m.unidadM_idunidadM = un.idunidadM INNER JOIN marca mar ON m.Marca_idMarca = mar.idMarca WHERE m.idMaterial = '{$this->idMaterial}' LIMIT 1";

		$resultado = $this->conexion->ConsultaResult($sql);

		$row = mysql_fetch_array($resultado);

		return $row;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

	//Editar Material(MANTENEDOR)
	public function editarMaterial()
	{
		$sql = "UPDATE material 
				SET nombre_material = '{$this->nombre_material}', cod_fabricante = '{$this->cod_fabricante}', unidadM_idunidadM = '{$this->idUnidadM}', 
					Marca_idMarca = '{$this->idMarca}', descripcion = '{$this->descripcion}' 
				WHERE idMaterial = '{$this->idMaterial}'";

		$resultado = $this->conexion->ConsultaResult($sql);
		return $resultado;
		$this->conexion->Cerrarconex();
	}


	

	//Eliminar Material (MANTENEDOR)
	public function eliminarMaterial()
	{
		$sql = "DELETE FROM material WHERE (idMaterial = '{$this->idMaterial}')";

		$resultado = $this->conexion->Consulta($sql);

		//$this->conexion->Liberar($resultado);
				
		$this->conexion->Cerrarconex();
	}


	public function buscarMaterial($valor)
	{

		$sql= "SELECT m.idMaterial,  m.nombre_material, m.cod_fabricante, um.nombre_unidad, ma.nombre_marca FROM unidadm um INNER JOIN material m ON m.unidadM_idunidadM = um.idunidadM INNER JOIN marca ma ON ma.idMarca = m.Marca_idMarca WHERE m.nombre_material like '%".$valor."%' or ma.nombre_marca like '%".$valor."%'";

		//$this->conexion->set_charset('utf8');

		$resultado = $this->conexion->ConsultaResult($sql);
		$arreglo = array();

		while ($row = mysql_fetch_array($resultado, MYSQL_NUM))
		{
			$arreglo[]=$row;
		}

		return $arreglo;
		$this->conexion->Liberar($resultado);
		$this->conexion->Cerrarconex();
	}

}
