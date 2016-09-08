<?php 
session_start();

function contenido()
{
include_once('../controller/ctrMaterial.php');
include_once('../controller/ctrMarca.php');
include_once('../controller/ctrUnidadM.php');
$ctrMaterial = new ctrMaterial();
$ctrMarca = new ctrMarca();
$ctrUnidadM = new ctrUnidadM();
$listarMarca = $ctrMarca->Listar();
$listarUnidadM = $ctrUnidadM->Listar();

//si existe un id material enviado por get, que se asigne a una variable de session 
if (isset($_GET['idMaterial'])) {
	$_SESSION['idMaterial'] = $_GET['idMaterial'];
}
$buscarMaterial = $ctrMaterial->buscarPorId($_SESSION['idMaterial']);


if(isset($_POST['btnEditar']))
{
	$resultado = $ctrMaterial->editarMaterial($_POST['idMaterial'], $_POST['nombre_material'], $_POST['cod_fabricante'], $_POST['idUnidadM'], $_POST['idMarca'], $_POST['descripcion']);
			//echo "<script type='text/javascript'>window.location='mant_EditMaterial.php'</script>";
			header('Location: mant_listMaterial.php');
}


?>
<h1 class="col-md-offset-1">Editar Material</h1>
<br>
<br>
<br>
<form class="form-horizontal col-sm-offset-2 "  method="POST">
	<div class="form-group">
		<input type="hidden" name="idMaterial" value="<?php echo $buscarMaterial['idMaterial']; ?>"/>
		
		<label class="col-sm-2 control-label">ID</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarMaterial['idMaterial']; ?>"  disabled/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="nombre_material" value="<?php echo $buscarMaterial['nombre_material']; ?>" required/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">COD. Fabricante</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="cod_fabricante" value="<?php echo $buscarMaterial['cod_fabricante']; ?>" required/>
		</div>
	</div>
		

	<div class="form-group">
		<label class="col-sm-2 control-label">Medida</label>
		<div class="col-sm-6">
			<p class="form-control-static"><?php echo $buscarMaterial['nombre_unidad']; ?></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">(*)</label>
		<div class="col-sm-6">
			<select class="form-control" name="idUnidadM" value="" required> 
				<option value="">Seleccione el Unidad para Editar</option>
				<?php
					while($row = mysql_fetch_array($listarUnidadM))
					{
				?>
						<option value="<?php echo $row['idunidadM']; ?>"><?php echo $row['nombre_unidad'];?></option>
				<?php
					}
				?>
			</select>
		</div>
	</div>




	<div class="form-group">
		<label class="col-sm-2 control-label">Marca</label>
		<div class="col-sm-6">
			<p class="form-control-static"><?php echo $buscarMaterial['nombre_marca']; ?></p>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">(*)</label>
		<div class="col-sm-6">
			<select class="form-control" name="idMarca" value="" required> 
				<option value="">Seleccione el Marca para Editar</option>
				<?php
					while($row = mysql_fetch_array($listarMarca))
					{
				?>
						<option value="<?php echo $row['idMarca']; ?>"><?php echo $row['nombre_marca'];?></option>
				<?php
					}
				?>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Descripcion</label>
		<div class="col-sm-6">
			<textarea class="form-control"  name="descripcion" value=""><?php echo $buscarMaterial['descripcion']; ?></textarea>
		</div>
	</div>

	<br>
	<div class="form-group">
	    <div class="col-sm-3 col-md-offset-5">
	      	<button type="submit" id="Editar" class="btn btn-primary btn-lg col-sm-12" name="btnEditar">Editar material</button>
		</div>
    </div>
</form>
<?php       
}
require_once('master.php');
?>
