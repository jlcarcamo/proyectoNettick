<?php 
session_start();

function contenido()
{
include_once('../controller/ctrHerramienta.php');
include_once('../controller/ctrHerramientaCategoria.php');

$ctrHerramientaCategoria = new ctrHerramientaCategoria();
$listarCategoria = $ctrHerramientaCategoria->Listar();
$ctrHerramienta = new ctrHerramienta();


if (isset($_POST['btnCrearHerramienta']))
{
		$resultado_id = $ctrHerramienta->insertarHerramienta($_POST['nombre_herramienta'], $_POST['descripcion'], $_POST['idCategoria']);
		
		//header('Location: mant_listHerramienta.php');

}
if ($resultado_id == 1) {
	echo "esta wea contiene algo";
	
}else echo "esta wea no conetiene nada";


?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<h1 class=" col-md-offset-1">Agregar Herramienta</h1>
<br>
<br>

<form class="form-horizontal col-md-offset-2"  method="POST">
	<div class="form-group">
			<label class="col-sm-2 control-label">Nombre Herramienta</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="nombre_herramienta" value="" required/>
		</div>
	</div>


    <div class="form-group">
                    <label class="col-sm-2 control-label">Categoria</label> 
                <div class="col-sm-6">
                    <select class="selectpicker form-control" name="idCategoria" required>
                        <option value="">Seleccione Categoria</option>
							<?php
							while($row = mysql_fetch_array($listarCategoria))
							{
							?>
					    <option value="<?php echo $row['idherramienta_categoria']; ?>"> 
						    <?php echo $row['nombre_categoria'];?>
					    </option>
					<?php
							}
					?>
                    </select>
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
	      	<button type="submit" class="btn btn-primary btn-lg col-sm-12"  name="btnCrearHerramienta">Agregar</button>
	    </div>
    </div>

</form>
<?php       
}
require_once('master.php');
?>



