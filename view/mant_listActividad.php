<?php 
session_start();

function contenido()
{
include_once('../controller/ctrActividad.php');
$ctrActividad= new ctrActividad();
$listarActividad = $ctrActividad->listarActividad();
?>
<script src= '../js/jquery.min.js' type="text/javascript"></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/cssBase.css" rel="stylesheet">
<script>       
    $(function(){
        $(".mostrarModal").click(function(){
            var idAct = $(this).attr("Act");
            $("#bgventana").show(); 
            console.log(idAct);
            }
        );
        $("#ocultar").click(function(){
            $("#bgventana").hide();
        })
    })
</script>



<div class="col-ms-10 col-md-offset-1">
    <h1>Mantenedor de actividades <br><small>Listado</small></h1>
    <div>
        <a href="mant_insertActividad.php"><span class="glyphicon glyphicon-plus"></span> AGREGAR ACTIVIDADES</a>
    </div>
</div>
<br>
<br>
    <div class="col-sm-10 col-md-offset-1">  
        <table class="table table-hover" >
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
                        <a  href="mant_EditActividad.php?idActividad=<?php echo $row['idActividad']; ?>"><span class="glyphicon glyphicon-edit"></span>editar</a>
                    </td>
                    <td>
                        <a href="?idMaterial=<?php echo $row['idMaterial']; ?>"><span  class="glyphicon glyphicon-trash"></span>eliminar</a>
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


<?php       
}
require_once('master.php');
?>



