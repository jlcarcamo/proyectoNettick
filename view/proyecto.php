<?php 
session_start();

function contenido()
{
include_once('../controller/ctrProyecto.php');
$ctrProyecto = new ctrProyecto();

include_once('../controller/ctrCubicacion.php');
$ctrCubicacion = new ctrCubicacion();

if (isset($_GET['idProyecto'])) {
	$_SESSION['idProyecto'] = $_GET['idProyecto']; 
	$buscarCubicacion = $ctrCubicacion->verificarCubicacion($_GET['idProyecto']);
	$_SESSION['idCubicacion'] = $buscarCubicacion['idCubicacion']; 
	echo "id Cubicacion ". $_SESSION['idCubicacion'];
}

$proyecto = $ctrProyecto->buscarProyecto($_SESSION['idProyecto']);

$encargadoProyecto = $ctrProyecto->encargadoProyecto($_SESSION['idProyecto']);

?><br><?php 
echo "Encargo Proyecto: ".$encargadoProyecto['nombre_trabajador']." ".$encargadoProyecto['apellidoP']." ".$encargadoProyecto['apellidoM'];



if (isset($_POST['btnProyecto']))
{
		$resultado = $ctrProyecto->editarProyecto($_SESSION['idProyecto'], $_POST['sector'], $_POST['piso'], $_POST['descripcion'], $_POST['observacion'], $_POST['compromisos']); 
}
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">

<div>
	<h1 class="col-sm-10 col-md-offset-2">Proyecto de Instalación</h1>
</div>


<form class="form-horizontal col-sm-6 col-md-offset-2"   method="POST">
	<div class="form-group">
		<label class="col-sm-2 control-label">Sector</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="sector" value="<?php echo $proyecto['sector'];  ?>" required/>
		</div>
	</div>

	<div class="form-group">
			<label class="col-sm-2 control-label">Piso</label>
		<div class="col-sm-10">
			<input class="form-control" type="text" name="piso" value="<?php echo $proyecto['piso'];  ?>" required/>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-2 control-label">Descripcion</label>
		<div class="col-sm-10">
			<textarea class="form-control"  name="descripcion" value="" required><?php echo $proyecto['descripcion'];  ?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Observaciones<br>y dificultades</label>
		<div class="col-sm-10">
			<textarea class="form-control"  name="observacion" value="" required><?php echo $proyecto['observacionInicial'];  ?></textarea>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Compromisos</label>
		<div class="col-sm-10">
			<textarea class="form-control"  name="compromisos" value="" required><?php echo $proyecto['compromisos'];  ?></textarea>
		</div>
	</div>

	<br>
	<div class="form-group">

	    <div class="col-sm-offset-2 col-sm-10 ">
	      	<button type="submit" class="btn btn-primary btn-lg col-sm-12 "  name="btnProyecto">Crear Proyecto</button>
	    </div>
    </div>
</form>




<?php 
	if ($buscarCubicacion == 0) 
	{
 ?>		<div class="col-sm-12">
			<div>
			   <a href="cubicacion1.php?"> <span class="glyphicon glyphicon-edit"></span>Crear Cubicacion</a>
			</div>	
<?php
	}else{ 
?>
			<div>
				<h4 class="col-sm-offset-6">Cubicacion</h4>
				<div>
			   		<a href="cubicacion.php?"> <span class="glyphicon glyphicon-edit"></span>Ver Cubicacion</a>
				</div>
			</div>
		</div>
<?php 
		}
}
require_once('master.php');
?>