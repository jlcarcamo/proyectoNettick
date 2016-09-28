<?php 
session_start();

function contenido()
{
include_once('../controller/ctrActividad.php');
include_once('../controller/ctrActividadCub.php');
include_once('../controller/ctrMaterial.php');
include_once('../model/trabajador.php');
$trabajador = new trabajador();
$ctrActividad = new ctrActividad();
$ctrActividadCub = new ctrActividadCub();
$ctrMaterial = new ctrMaterial();
$trabajador->Tiempo();

if (isset($_GET['idCategoria'])) {
	$_SESSION['idCategoria'] = $_GET['idCategoria'];
}

if (isset($_GET['idActividad'])) {
	$_SESSION['idActividad'] = $_GET['idActividad'];
	$listarMaterial = $ctrMaterial->buscarPorActividad($_GET['idActividad']);
}	

$listarActividad = $ctrActividad->Buscar($_SESSION['idCategoria']);

if (isset($_POST['btnAgregarActividad']))
{
//aqui agrego una actividad y me retorna el id de la actividad agregada
$id_res = $ctrActividadCub->insertarActividadCub($_SESSION['idActividad'],$_SESSION['idCubicacion']);
$_SESSION['idActCub']= $id_res;
	
	//aqui recorro el array materialId para buscar la cantidad de material y el tipo de material, luego los guardo en arreglos
	foreach ($_POST['materialId'] as $materialId) 
	{		
		$resultado = $ctrActividad->buscarNubMatAct($materialId, $_SESSION['idActividad']);
		$idMat[] = $resultado['Material_idMaterial'];
		$cantM[] = $resultado['cantMaterial'];		
		$tipo[]  = $resultado['tipo'];
	}
	//aqui ejecuto la funcion que recibe los array para realizar un insert
	$ctrActividadCub->agregarMaterialActividadCub($id_res, $idMat, $cantM, $tipo);
	//echo $id_res;
}
echo $_SESSION['idActCub'];
 ?>
<link href="../css/bootstrap.min.css" rel="stylesheet">

 <div class="col-md-offset-1">
 	<h1>Cubicación <br><small>Listado de actividades</small></h1>
 </div>
 <br>
 <div>
	<h3 class="col-md-offset-1">Paso 3<small> Seleccione la actividad a agregar</small></h3>
 </div>
 <br>
 <br>
	<div class="col-sm-9 col-md-offset-1">
			<table class="table table-hover ">
					<thead>
						<th>ID</th>
						<th>NOMBRE ACTIVIDAD</th>
						<th>OPCIONES</th>
				    </thead>
				    <tbody>
							<?php 
							
								while ($row = mysql_fetch_array($listarActividad))
								{
									//$actividadId = $_GET['idCategoria'];

							?>
							<tr>
								<td><?php echo $row['idActividad']; ?></td>
								<td><?php echo $row['nombre_act']; ?></td>
								<td>
									<a href="cubicacion2.php?idActividad=<?php echo $row['idActividad']; ?>"> <span class="glyphicon glyphicon-edit"></span></a>
								</td>

							</tr>
							<?php
								}
							
							?>
					</tbody>
					
				</table>
	</div>

<?php 		
if (isset($_GET['idActividad'])) {
 ?>

<form  method="POST">	
	<div class="row col-sm-9 col-md-offset-1">			
	  <div >
			  <h3>Posibles Materiales</h3>
			   
	      <table class="table table-hover">
	      	<thead>
	      		<td></td>
	      		<td>N°</td>
	      		<td>Nombre</td>
	      		<td>Codigo Fabricante</td>
	      		<td>Unidad Medida</td>
	      		<td>Marca</td>
	      		<td>Cantidad</td>

	      	</thead>
	      	<tbody>
	      		<?php 
						if (isset($listarMaterial)) 
						{									
							while ($row = mysql_fetch_array($listarMaterial))
							{
								?>
								<tr>
									<td><input type="checkbox" name="materialId[]" value="<?php echo $row['idMaterial']; ?>" ></input></td>
									<td><?php echo $row['idMaterial']; ?></td>

									<?php 
									 ?>
									<td><?php echo $row['nombre_material']; ?></td>
									<td><?php echo $row['cod_fabricante']; ?></td>
									<td><?php echo $row['unidad_medida']; ?></td>
									<td><?php echo $row['nombre_marca']; ?></td>
									<td><?php echo $row['cantMaterial']; ?></td>
								</tr>
								<?php
							}
						}	
				?>
	      	</tbody>
	      	<div class="col-sm-3 col-md-offset-5">
	      					<button name="btnAgregarActividad" type="submit">Agregar Actividad</button>
					</div>
	      </table>
			    
	  </div>
<?php 
	}
}
require_once('master.php');
		 ?>
</form>
 


