<?php 
session_start();

function contenido()
{
include_once('../controller/ctrSolicitud.php');
$ctrSolicitud = new ctrSolicitud();

include_once('../controller/ctrProyecto.php');
$ctrProyecto = new ctrProyecto();

include_once('../controller/ctrTrabajador.php');
$ctrTrabajador = new ctrtrabajador();
$listarSupervisores = $ctrTrabajador->listarSupervisores();
$listarTecnicos = $ctrTrabajador->listarTecnicos();


if (isset($_GET['idSolicitud'])) {
	$_SESSION['idSolicitud'] = $_GET['idSolicitud'];
	$buscarSolicitud = $ctrSolicitud->buscarSolicitud($_GET['idSolicitud']);
}elseif(isset($_SESSION['idSolicitud'])) {
	$buscarSolicitud = $ctrSolicitud->buscarSolicitud($_SESSION['idSolicitud']);
}

$totalFilas = $ctrProyecto->verificarProyecto($_SESSION['idSolicitud']);



if ($totalFilas==0)
{
	if (isset($_POST['btnCrear']))
	{
		$res_id = $ctrProyecto->crearProyecto($_POST['nombreProyecto'], $_POST['prioridad'], date("Y-m-d"), $_GET['idSolicitud']); 
		
					
		foreach($_POST['trabajador'] as $trabajador) 
		{
			echo $trabajador;
			$ctrProyecto->asignarEncargado($res_id, $trabajador , 1);
		}
		$ctrSolicitud->modificarEstado(2);	
	}
}else{ 
	echo "Esta solicitud ya fue asignara - a:";
	$listarEncargados = $ctrProyecto->buscarEncargado($_GET['idSolicitud']);
}

?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/cssBase.css" rel="stylesheet">

<script type="text/javascript"> 
function desplegar(_valor){
	document.getElementById("bgventana").style.visibility= _valor;
}
</script>


<br>

<h1 class="col-md-offset-1">Solicitud de trabajo</h1>
<br>

<div class="col-md-offset-1">
	<?php 
	if ($totalFilas!= 0) 
	{
		if (isset($listarEncargados))
		{?><label>Solicitud Asignada a:</label> <?php 
			while ($row = mysql_fetch_array($listarEncargados)) 
			{
	?>
				<label>-<?php echo $row['nombre_trabajador']; ?></label>
				<label><?php echo $row['apellidoP']; ?></label>

			<?php 
			}
		} 

	}else
	{ ?>
		<div class="col-md-offset-1">
			<a href="javascript:desplegar('visible');"><span class="glyphicon glyphicon-plus"></span>Asignar encargado</a>
		</div>
	<?php 
	}
	 ?>
	

</div>



panel

<br>

<div class="form-horizontal col-sm-offset-2"> 	
	<div class="form-group">	
		<label class="col-sm-2 control-label">N°</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarSolicitud['idsolicitud']; ?>"  disabled/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Recepcion</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarSolicitud['fechaSolicitud']; ?>" disabled/>
		</div>
	</div>



	<div class="form-group">
		<label class="col-sm-2 control-label">Nombre</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarSolicitud['nombre_contacto']; ?>" disabled/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Apellido</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarSolicitud['apellido_contacto']; ?>" disabled/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Cargo</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarSolicitud['cargo']; ?>" disabled/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Telefono</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarSolicitud['telefono_contacto']; ?>" disabled/>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label">Correo</label>
		<div class="col-sm-6">
			<input class="form-control" type="text"  value="<?php echo $buscarSolicitud['correo']; ?>" disabled/>
		</div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">descripcion</label>
		<div class="col-sm-6">

		<textarea class="form-control" disabled><?php echo $buscarSolicitud['descripcion'];?> </textarea>
		</div>
	</div>

</div>

<div class="form-horizontal">
<br>
<br>
<br>
<br>
	<form method="POST">
		<div id="bgventana">
			<div id="ventana">
				<div class="">
					<div class="form-group">
				    	<a class="col-sm-offset-10" href="javascript:desplegar('hidden');">Cerrar <span class="glyphicon glyphicon-remove"></span></a>
				    </div>
				    <div class="form-group">
						<center><h4><strong>Asigne Encargado de proyecto y Cubicacion</strong></h4></center>
					</div>

				 	<div class="form-group">
						<label class="col-sm-5 control-label">Nombre Proyecto</label>
						<div class="col-sm-6">
							<input class="form-control" name="nombreProyecto" type="text"  value="" required/>
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-5 control-label">prioridad</label>

						<div class="col-sm-6">
							<select class="form-control" name="prioridad" required>
								<option>Alta</option>
								<option>Media</option>
								<option>Baja</option>
								
							</select>
						
						</div>
					</div>

					<div class="form-group">
			            <label class="col-sm-5 control-label">Supervisor a Cargo</label> 
			            <div class="col-sm-6">
			               <select class="selectpicker form-control" name="trabajador[]" required>
			                  <option value="">Seleccione Supervisor</option>
										<?php
										while($row = mysql_fetch_array($listarSupervisores))
										{
										?>
								   <option value="<?php echo $row['idtrabajador']; ?>"> 
									    <?php echo $row['nombre_trabajador']." ".$row['apellidoP'];?></option>
										<?php
										}
										?>
			               </select>
			            </div>
			     	</div>

			    	<div class="form-group">
			                    <label class="col-sm-5 control-label">Encargado de cubicacion</label> 
			                <div class="col-sm-6">
			                    <select class="selectpicker form-control" name="trabajador[]" required>
			                        <option value="">Seleccione Tecnico</option>
										<?php
										while($row = mysql_fetch_array($listarTecnicos))
										{
										?>
								    <option value="<?php echo $row['idtrabajador']; ?>"> 
									    <?php echo $row['nombre_trabajador']." ".$row['apellidoP'];?>
								    </option>
								<?php
										}
								?>
			                    </select>
			                </div>
			    	</div>	


					<div class="form-group">
					    
					      <button type="submit" class="col-sm-10 col-sm-offset-1 btn btn-primary"  name="btnCrear">Asignar
					      >
					    
				    </div>
				</div>
			</div>
		</div>
	</form>
</div>

	<br>

<?php       
}
require_once('master.php');
?>