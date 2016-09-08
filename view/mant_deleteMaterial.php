<?php
session_start();

function contenido()
{
	include_once('../controller/ctrMaterial.php');
	$ctrMaterial = new ctrMaterial();
	if(isset($_GET['idMaterial'])) 
	{
		$resultado = $ctrMaterial->buscarPorId($_GET['idMaterial']);
	} 
	else 
	{
		header('Location: listMaterial.php');
	}
	if (isset($_POST['btnEliminar'])) 
	{
		$ctrMaterial->eliminarMaterial($_GET['idMaterial']);	
		header('Location: mant_listMaterial.php');
	}
	
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">

<div>
	<center><h1 class="h1agregar">¿Esta Seguro de Eliminar?</h1></center>
	<center><label>Nombre:  <?php echo $resultado['nombre_material']; ?></label></center>
	<center><label>Codigo Fabricante:  <?php echo $resultado['cod_fabricante']; ?></label></center>
	<center><label>Unidad:  <?php echo $resultado['nombre_unidad']; ?></label></center>
	<center><label>Marca:  <?php echo $resultado['nombre_marca']; ?></label></center>
	<center><label>Descripcion:  <?php echo $resultado['descripcion']; ?></label></center>
	<br><br>
	<form action="" method="POST">
		<center><input type="submit" class="btn btn-primary btn-sm" name="btnEliminar" value="Eliminar"/></center>
	</form>
</div>
<?php       
}
require_once('master.php');
?>