<?php 
session_start();

function contenido()
{
include_once('../controller/ctrActividad.php');
include_once('../controller/ctrActividadCategoria.php');
include_once('../controller/ctrRubro.php');

$ctrActividadCategoria = new ctrActividadCategoria();
$listarCategoria = $ctrActividadCategoria->listarCategorias();

$ctrRubro = new ctrRubro();
$listarRubro = $ctrRubro->Listar();

$ctrActividad = new ctrActividad();


if (isset($_POST['btnCrearActividad']))
{
		$ctrActividad->insertarActividad($_POST['nombre_actividad'], $_POST['idCategoria'],$_POST['descripcion']);
		
		header('Location: mant_listActividad.php');

}
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src= '../js/jquery.min.js' type="text/javascript"></script>
<script src= '../js/jsbase.js' type="text/javascript"></script>
<h1 class=" col-md-offset-1">Agregar Actividad</h1>
<br>
<br>
<form class="form-horizontal col-md-offset-2"  method="POST">
	<div class="form-group">
			<label class="col-sm-2 control-label">Nombre Actividad</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="nombre_actividad" value="" required/>
		</div>
	</div>

	<div class="form-group">
                    <label class="col-sm-2 control-label">Categoria</label> 
                <div class="col-sm-6">
                    <select class="selectpicker form-control" name="idCategoria" onChange="buscarSubCategoria(this.value);" required>
                        <option value="">Seleccione Categoria</option>
							<?php
							while($row = mysql_fetch_array($listarRubro))
							{
							?>
					    <option value="<?php echo $row['idRubro']; ?>"> 
						    <?php echo $row['nombre_rubro'];?>
					    </option>
					<?php
							}
					?>
                    </select>
                </div>
    </div>



    <div class="form-group">
    	<label class="col-sm-2 control-label">Sub-Categoria</label>
	    <div id="subCategoria">
	                 
	    </div>
	</div>

    <div class="form-group">
		<label class="col-sm-2 control-label">Descripcion</label>
		<div class="col-sm-6">
			<textarea class="form-control"  name="descripcion" value=""></textarea>
		</div>
	</div>


	<br>
	<div class="form-group">
	    <div class="col-sm-3 col-md-offset-5">
	      	<button type="submit" class="btn btn-primary btn-lg col-sm-12"  name="btnCrearActividad">Agregar</button>
	    </div>
    </div>

</form>
<?php       
}
require_once('master.php');
?>



