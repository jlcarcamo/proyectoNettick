<?php 
session_start();

function contenido()
{
include_once('../controller/ctrMaterial.php');

$ctrMaterial= new ctrMaterial();
$listarMaterial = $ctrMaterial->listarMaterial();
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<h1 class="col-md-offset-1">Mantenedor de materiales <br><small>Listado</small></h1>
<div onload="buscarMaterial('')">
    <div>
        <label for="buscar" class="control-label">Buscar:</label>
    </div>
    <div>
        <input type="text" name="buscar" id="buscar"></input>
    </div>
</div>
<div class="col-md-offset-1">
    <a href="mant_insertMaterial.php"><span class="glyphicon glyphicon-plus"></span> AGREGAR</a>
</div>
<br>
<br>
    <div  class="col-sm-9">  
        <table class="table table-hover col-md-offset-1" >
            <thead>
               
                <th>Nombre</th>
                <th>Codigo Fabricante</th>
                <th>Unidad</th>
                <th>Marca</th>
                <th colspan="2">OPCIONES</th>
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_array($listarMaterial))
                {
                ?>
                <tr>
                    <td><?php echo $row['nombre_material']; ?></td>
                    <td><?php echo $row['cod_fabricante']; ?></td>
                    <td><?php echo $row['nombre_unidad']; ?></td>
                    <td><?php echo $row['nombre_marca']; ?></td>
                    <td>
                        <a href="mant_EditMaterial.php?idMaterial=<?php echo $row['idMaterial']; ?>"> <span class="glyphicon glyphicon-edit"></span>editar</a>
                    </td>
                    <td>
                        <a onclick="ConfirmarEliminar();" href="mant_deleteMaterial.php?idMaterial=<?php echo $row['idMaterial']; ?>"><span  class="glyphicon glyphicon-trash"></span>eliminar</a>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>    
        </table>
    </div>  
    <script src="../js/jquery.min.js"></script>
    <script src="../js/jsbase.js"></script>

<?php       
}
require_once('master.php');
?>



