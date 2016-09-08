<?php 
session_start();

function contenido()
{
include_once('../controller/ctrActividad.php');
$ctrActividad= new ctrActividad();
$listarActividad = $ctrActividad->listarActividad();
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<h1 class="col-md-offset-1">Mantenedor de actividades <br><small>Listado</small></h1>
<div class="col-md-offset-1">
    <a href=""><span class="glyphicon glyphicon-plus"></span> AGREGAR ACTIVIDADES</a>
</div>
<br>
<br>
    <div class="col-sm-9">  
        <table class="table table-hover col-md-offset-1" >
            <thead>               
                <th>Nombre</th>
                <th>Categoria</th>
                <th colspan="3">OPCIONES</th>
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_array($listarActividad))
                {
                ?>
                <tr>
                    <td><?php echo $row['nombre_act']; ?></td>
                    <td><?php echo $row['nombre_categoria']; ?></td>
                    <td>
                        <a href="?idHerramienta=<?php echo $row['idHerramienta']; ?>"> <span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                    <td>
                        <a href="?idMaterial=<?php echo $row['idMaterial']; ?>"><span  class="glyphicon glyphicon-trash"></span></a>
                    </td>
                     <td>
                        <a href="actividades.php?idActividad=<?php echo $row['idActividad']; ?>"><span  class="glyphicon glyphicon-paperclip"></span></a>
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



