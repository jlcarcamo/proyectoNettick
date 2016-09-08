<?php 
session_start();

function contenido()
{
include_once('../controller/ctrHerramienta.php');
$ctrHerramienta= new ctrHerramienta();
$listarHerramienta = $ctrHerramienta->listarHerramienta();
//echo $_SESSION['resultado'];
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<h1 class="col-md-offset-1">Mantenedor de herramientas <br><small>Listado</small></h1>
<div class="col-md-offset-1">
    <a href="mant_insertHerramienta.php"><span class="glyphicon glyphicon-plus"></span> AGREGAR HERRAMIENTA</a>
</div>
<br>
<br>
    <div class="col-sm-9">  
        <table class="table table-hover col-md-offset-1" >
            <thead>
               
                <th>Nombre</th>
                <th>Categoria</th>
                <th>Descripcion(cambiar)</th>
                <th colspan="2">OPCIONES</th>
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_array($listarHerramienta))
                {
                ?>
                <tr>
                    <td><?php echo $row['nombre_herramienta']; ?></td>
                    <td><?php echo $row['nombre_categoria']; ?></td>
                    <td><?php echo $row['descripcion']; ?></td>
                    <td>
                        <a href="mant_editHerramienta.php?idHerramienta=<?php echo $row['idHerramienta']; ?>"> <span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                    <td>
                        <a onclick="ConfirmarEliminar();" href="mant_deleteHerramienta.php?idHerramienta=<?php echo $row['idHerramienta']; ?>"><span  class="glyphicon glyphicon-trash"></span></a>
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



