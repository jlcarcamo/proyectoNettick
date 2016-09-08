<?php
include_once('../controller/ctrCubicacion.php');
include_once('../model/trabajador.php');
$trabajador = new trabajador();
$trabajador->Tiempo();
$controlador = new ctrCubicacion();
$resultado = $controlador->Buscar($_GET['idCubicacion']);

if(isset($_POST['btnEditar']))
	{
		$controlador->Editar($_GET['idCubicacion'], $_POST['estado'], $_POST['fecha_creacion']);

		header('Location: index.php');
	}
?>
<h1>Editar Cubicacion</h1>

<form action="" method="POST">
	<table>
		<tr>
			<td>ID</td>
			<td>:</td>
			<td>
				<input type="Text" name="idCubicacion" placeholder="<?php echo $resultado['idCubicacion']; ?>" readonly/>
			</td>
		</tr>
		<tr>
			<td>Estado</td>
			<td>:</td>
			<td>
				<input type="Text" name="estado" value="<?php echo $resultado['estado']; ?>"/>
			</td>
		</tr>
		<tr>
			<td>Fecha Creacion</td>
			<td>:</td>
			<td>
				<input type="Text" name="fecha_creacion" value="<?php echo $resultado['fecha_creacion']; ?>"/>
			</td>
		</tr>
	</table>
</form>