<?php
	include_once('../controller/ctrHerramienta.php');
	$ctrHerramienta = new ctrHerramienta();
	if(isset($_GET['idHerramienta'])) 
	{
		$resultado = $ctrHerramienta->buscarPorId($_GET['idHerramienta']);
	} 
	else 
	{
		header('Location: listHerramienta.php');
	}
	if (isset($_POST['btnEliminar'])) 
	{
		$ctrHerramienta->eliminarHerramienta($_GET['idHerramienta']);	
		header('Location: mant_listHerramienta.php');
	}
	
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">

<div>
	<h1 class="col-sm-9 col-md-offset-4 h1agregar">¿Esta Seguro de Eliminar?</h1>
	<center><label>Nombre  <?php echo $resultado['nombre_herramienta']; ?></label></center>
	<center><label>Descripcion  <?php echo $resultado['descripcion']; ?></label></center>
	<center><label>Categoria  <?php echo $resultado['nombre_categoria']; ?></label></center>
	<br><br>
	<form action="" method="POST">
		<center><input type="submit" class="btn btn-primary btn-sm" name="btnEliminar" value="Eliminar"/></center>
	</form>
</div>
