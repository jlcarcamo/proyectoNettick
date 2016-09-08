<?php 
session_start();

function contenido()
{
include_once('../controller/ctrProyecto.php');
$ctrProyecto= new ctrProyecto();
$listarProyecto = $ctrProyecto->listarProyecto();
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<h1 class="col-md-offset-1">Proyectos <br><small>Listado</small></h1>
<br>
<br>
    <div class="col-sm-9">  
        <table class="table table-hover col-md-offset-1" >
            <thead>
                <th>N°</th>
                <th>Nombre Proyecto</th>
                <th>Prioridad</th>
                <th>Fecha creacion</th>
                <th>Estado</th>
                <th colspan="2">OPCIONES</th>
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_array($listarProyecto))
                {
                ?>
                <tr>
                    <td><?php echo $row['idProyecto']; ?></td>
                    <td><?php echo $row['nombre_proyecto']; ?></td>
                    <td><?php echo $row['prioridad']; ?></td>
                    <td><?php echo $row['fechaIngreso']; ?></td>

                    <td></td>
                    <td>
                        <a href="proyecto.php?idProyecto=<?php echo $row['idProyecto']; ?>"> <span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>    
        </table>
    </div>  
</div>
<?php       
}
require_once('master.php');
?>



