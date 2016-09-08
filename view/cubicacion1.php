<?php 
session_start();

function contenido()
{
include_once('../controller/ctrRubro.php');
include_once('../controller/ctrActividadCategoria.php');
include_once('../model/trabajador.php');
include_once('../controller/ctrCubicacion.php');

$trabajador = new trabajador();
$trabajador->Tiempo();

$ctrRubro = new ctrRubro();
$listarRubro = $ctrRubro->Listar();

$ctrCubicacion = new ctrCubicacion();

$buscarCubicacion = $ctrCubicacion->verificarCubicacion($_SESSION['idProyecto']);

if ($buscarCubicacion == 0) 
{
	$ctrCubicacion->crearCubicacion($_SESSION['idProyecto']);
	$_SESSION['idCubicacion'] = $buscarCubicacion['idCubicacion']; 
}


$ctrActividadCategoria = new ctrActividadCategoria();


if(isset($_POST['btnSubActividades']))
{
	$resultado = $ctrActividadCategoria->Buscar($_POST['idrubro']);
}

?>
<link href="../css/bootstrap.min.css" rel="stylesheet">



	<div class="col-sm-9 col-md-offset-1" col-md-offset-1>

		<div>
			<h1>Cubicación<br><small>Agregar Actividades</small></h1>
			<p>Para facilitar la busqueda de las actividades a agregar a esta cubicacion, filtrelas por categoria y sub-categoria</p>
		</div>
		<br>
		<div>
			<h3> Paso 1 <small>Filtre la actividad por categoria</small></h3>
		</div>

		<br>
		<br>
		<div>
			<form method="POST" class="form-horizontal col-md-12">
					<div class="form-group">		
						<label class="col-md-1 control-label">Categoria</label>
						<div class="col-md-11">
							<select class="form-control" name="idrubro" value=""> 
								<option value="">Seleccione Categoria</option>
								<?php
									while($row = mysql_fetch_array($listarRubro))
									{
								?>
								<option value="<?php echo $row['idRubro']; ?>"> <?php echo $row['nombre_rubro'];?></option>
								<?php
									}
								?>
							</select>
						</div>
					</div>
								
					<button type="submit" name="btnSubActividades" class="btn btn-primary col-md-3 col-md-offset-9">Ver Sub-Categorias</button>
					<br>
					<br>
					<br>
			</form>	
		</div>

		<?php 
		if(isset($_POST['idrubro']))					{
 		?>


		<div>
			<h3> Paso 2 <small>Filtre la actividad por Sub-Categoria</small></h3>
		</div>
		<br>
		<br>
		<table class="table table-hover ">
				<thead>
					<th>ID</th>
					<th>CATEGORIA</th>
					<th>DESCRIPCION</th>
					<th>RUBRO</th>
			    </thead>
			    <tbody>
						<?php 
							while ($row = mysql_fetch_array($resultado))
							{
						?>
						<tr>
							<td><?php echo $row['idActividad_categoria']; ?></td>
							<td><?php echo $row['nombre_categoria']; ?></td>
							<td><?php echo $row['descripcion']; ?></td>
							<td><?php echo $row['nombre_rubro']; ?></td>
							<td>
								<a href="cubicacion2.php?idCategoria=<?php echo $row['idActividad_categoria']; ?>"> <span class="glyphicon glyphicon-edit"></span></a>
							</td>
						</tr>
						<?php
							}
						}
						?>
				</tbody>
				
			</table>
	</div>
<?php       
}
require_once('master.php');
?>	
		




