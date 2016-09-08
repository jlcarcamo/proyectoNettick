<?php 
session_start();

function contenido()
{
include_once('../controller/ctrMaterial.php');
include_once('../controller/ctrMarca.php');
include_once('../controller/ctrUnidadM.php');
$ctrMarca = new ctrMarca();
$ctrUnidadM = new ctrUnidadM();
$listarMarca = $ctrMarca->Listar();
$listarUnidad = $ctrUnidadM->Listar();
$ctrMaterial = new ctrMaterial();

if (isset($_POST['btnCrearMaterial']))
{
		$ctrMaterial->insertarMaterial($_POST['nombre_material'], $_POST['cod_fabricante'], $_POST['descripcion'], $_POST['idUnidad'], $_POST['idMarca']);
		
		header('Location: mant_listMaterial.php');

}
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<h1 class=" col-md-offset-1">Agregar Material</h1>
<br>
<br>

<form class="form-horizontal col-md-offset-2"  method="POST">
	<div class="form-group">
			<label class="col-sm-2 control-label">Nombre Material</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="nombre_material" value="" required/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Codigo Fabricante</label>
		<div class="col-sm-6">
			<input class="form-control" type="text" name="cod_fabricante" value="" required/>
		</div>
	</div>


 	<div class="form-group">
                <label class="col-sm-2 control-label">Unidad de Medida</label> 
                <div class="col-sm-6">
                    <select class="selectpicker form-control" name="idUnidad" required>
                        <option value="">Seleccione Unidad</option>
							<?php
							while($row = mysql_fetch_array($listarUnidad))
							{
							?>
					    <option value="<?php echo $row['idunidadM']; ?>"> 
						    <?php echo $row['nombre_unidad'];?>
					    </option>
					<?php
							}
					?>
                    </select>
                </div>
    </div>

    <div class="form-group">
                    <label class="col-sm-2 control-label">Marca</label> 
                <div class="col-sm-6">
                    <select class="selectpicker form-control" name="idMarca" required>
                        <option value="">Seleccione Marca</option>
							<?php
							while($row = mysql_fetch_array($listarMarca))
							{
							?>
					    <option value="<?php echo $row['idMarca']; ?>"> 
						    <?php echo $row['nombre_marca'];?>
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
	      	<button type="submit" class="btn btn-primary btn-lg col-sm-12"  name="btnCrearMaterial">Agregar</button>
	    </div>
    </div>

</form>
<?php       
}
require_once('master.php');
?>



