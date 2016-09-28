<?php 
session_start();

function contenido()
{
include_once('../controller/ctrActividad.php');
include_once('../controller/ctrRubro.php.');

$ctrActividad = new ctrActividad();
$ctrRubro = new ctrRubro();

$listarRubro = $ctrRubro->Listar();
//si existe un id material enviado por get, que se asigne a una variable de session 
if (isset($_GET['idActividad'])) {
	$_SESSION['idActividad'] = $_GET['idActividad'];
}
$buscarActividad = $ctrActividad->buscarPorId($_SESSION['idActividad']);


if(isset($_POST['btnEditar']))
{
	$resultado = $ctrActividad->editarActividad($_SESSION['idActividad'], $_POST['nombre_act'], $_POST['idCategoria'], $_POST['descripcion']);
			//echo "<script type='text/javascript'>window.location='mant_EditMaterial.php'</script>";
			header('Location: mant_listActividad.php');
}


?>
<script src= '../js/jquery.min.js' type="text/javascript"></script>
<script src= '../js/jsbase.js' type="text/javascript"></script>
<h1 class="col-md-offset-1">Editar Actividad</h1>
<br>
<br>
<br>
<form class="form-horizontal col-sm-offset-2 "  method="POST">
	<div class="form-group">
		<input type="hidden" name="idMaterial" value="<?php echo $buscarActividad['idActividad']; ?>"/>
		
		<label class="col-sm-2 control-label">ID</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarActividad['idActividad']; ?>"  disabled/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="nombre_act" value="<?php echo $buscarActividad['nombre_act']; ?>" required/>
		</div>
	</div>
		

	<div class="form-group">
		<label class="col-sm-2 control-label">Categoria</label>
		<div class="col-sm-6">
			<p class="form-control-static"><?php echo $buscarActividad['nombre_rubro']; ?></p>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-2 control-label">(*)</label>
		<div class="col-sm-6">
			<select class="form-control" name="idUnidadM" onChange="buscarSubCategoria(this.value);" value="" required> 
				<option value="">Seleccione el Unidad para Editar</option>
				<?php
					while($row = mysql_fetch_array($listarRubro))
					{
				?>
						<option value="<?php echo $row['idRubro']; ?>"><?php echo $row['nombre_rubro'];?></option>
				<?php
					}
				?>
			</select>
		</div>
	</div>




	<div class="form-group">
		<label class="col-sm-2 control-label">Sub-Categoria</label>
		<div class="col-sm-6">
			<p class="form-control-static"><?php echo $buscarActividad['nombre_categoria']; ?></p>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">(*)</label>
		<div id="subCategoria">
	                 
	    </div>
	</div>	    

	<div class="form-group">
		<label class="col-sm-2 control-label">Descripcion</label>
		<div class="col-sm-6">
			<textarea class="form-control"  name="descripcion" value=""><?php echo $buscarActividad['descripcion']; ?></textarea>
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
