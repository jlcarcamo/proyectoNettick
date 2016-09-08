<?php 
session_start();

function contenido()
{
include_once('../controller/ctrActividadCub.php');
$ctrActividadCub = new ctrActividadCub();

$Itemizado = $ctrActividadCub ->itemizadoCubicacion($_SESSION['idCubicacion']);


if(isset($_POST['btnSubActividades']))
{
  $resultado = $ctrActividadCategoria->Buscar($_POST['idrubro']);
}
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">

<div class="col-sm-7 col-md-offset-1" col-md-offset-1>
    <h1>Cubicación<br><small>Itemizado de Actividades</small></h1>
    
    <br>
    <br>
    <table class="table table-hover ">
        <thead>
          <th>ID</th>
          <th>NOMBRE</th>
          <th>CATEGORIA</th>
          <th>OPCIONES</th>
   
          </thead>
          <tbody>
            <?php 
              while ($row = mysql_fetch_array($Itemizado))
              {
            ?>
            <tr>
              <td><?php echo $row['idActividad_Cub']; ?></td>
              <td><?php echo $row['nombre_act']; ?></td>
              <td><?php echo $row['nombre_rubro']; ?></td>

              <td>
                <a href="?idCategoria=<?php echo $row['idActividad_categoria']; ?>"> <span class="glyphicon glyphicon-edit"></span>Ver detalle</a>
              </td>
            </tr>
            <?php
              }
            
            ?>
        </tbody>
      </table>

      <a href="cubicacion1.php?"> <span class="glyphicon glyphicon-edit"></span>Sigue cubicando</a>
</div>
<?php       
}
require_once('master.php');
?>  
    




