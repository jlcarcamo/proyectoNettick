<?php 
session_start();

function contenido()
{
include_once('../controller/ctrHerramienta.php');
include_once('../controller/ctrHerramientaCategoria.php');
$ctrHerramienta = new ctrHerramienta();
$ctrHerramientaCategoria = new ctrHerramientaCategoria();
$listarCategoria = $ctrHerramientaCategoria->Listar();


//si existe un id material enviado por get, que se asigne a una variable de session 
if (isset($_GET['idHerramienta'])) {
	$_SESSION['idHerramienta'] = $_GET['idHerramienta'];
}
$buscarHerramienta = $ctrHerramienta->buscarPorId($_SESSION['idHerramienta']);


if(isset($_POST['btnEditar']))
{
	$resultado = $ctrHerramienta->editarHerramienta($_POST['idHerramienta'], $_POST['nombre_herramienta'], $_POST['descripcion'], $_POST['idCategoria']);

	if ($resultado) {
			echo "<script type='text/javascript'>confirm('prueba1');</script>";	
			
	}else{
			echo "<script type='text/javascript'>alert('prueba2');</script>";
	}

			//echo "<script type='text/javascript'>window.location='mant_EditMaterial.php'</script>";
			header('Location: mant_listHerramienta.php');
}


?>

<h1 class="col-md-offset-1">Editar Herramienta</h1>
<br>
<br>
<br>
<form class="form-horizontal col-sm-offset-2 "  method="POST">
	<div class="form-group">
		<input type="hidden" name="idHerramienta" value="<?php echo $buscarHerramienta['idHerramienta']; ?>"/>
		
		<label class="col-sm-2 control-label">ID</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarHerramienta['idHerramienta']; ?>"  disabled/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="nombre_herramienta" value="<?php echo $buscarHerramienta['nombre_herramienta']; ?>" required/>
		</div>
	</div>	

	<div class="form-group">
		<label class="col-sm-2 control-label">Categoria</label>
		<div class="col-sm-6">
			<p class="form-control-static"><?php echo $buscarHerramienta['nombre_categoria']; ?></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">(*)</label>
		<div class="col-sm-6">
			<select class="form-control" name="idCategoria" value="" required> 
				<option value="">Seleccione una categoria</option>
				<?php
					while($row = mysql_fetch_array($listarCategoria))
					{
				?>
						<option value="<?php echo $row['idherramienta_categoria']; ?>"><?php echo $row['nombre_categoria'];?></option>
				<?php
					}
				?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Descripcion</label>
		<div class="col-sm-6">
			<textarea class="form-control"  name="descripcion" ><?php echo $buscarHerramienta['descripcion']; ?></textarea>
		</div>
	</div>

	<br>
	<div class="form-group">
	    <div class="col-sm-3 col-md-offset-5">
	      	<button type="submit" id="Editar" class="btn btn-primary btn-lg col-sm-12" name="btnEditar">Editar Herramienta</button>
		</div>
    </div>
</form>
<?php       
}
require_once('master.php');
?>
