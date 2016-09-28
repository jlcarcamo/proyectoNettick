<?php 
include_once('../model/actividadCategoria.php');

if (isset($_POST['valor'])) 
{
	$inst = new actividadCategoria();
	$inst->set("idRubro", $_POST['valor']);
	$res = $inst->Buscar();
	$arreglo = array();
	
	while ($row = mysql_fetch_array($res, MYSQL_NUM)) {
		$arreglo[]= $row;
	}
	echo json_encode($arreglo);	
}




class ctrActividadCategoria
{
	private $actividadCategoria;

	function __construct()
	{
		$this->actividadCategoria = new actividadCategoria();
	}

	public function buscar($idRubro)
	{
		$this->actividadCategoria->set("idRubro", $idRubro);
		$dato = $this->actividadCategoria->Buscar();
		return $dato;
	}

	public function listarCategorias()
	{	
		$resultado = $this->actividadCategoria->listarCategorias();
		return $resultado;
	}


}
 ?>