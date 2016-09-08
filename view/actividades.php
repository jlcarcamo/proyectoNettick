<?php 
session_start();

function contenido()
{
include_once('../controller/ctrMaterial.php');
include_once('../controller/ctrActividad.php');

$ctrActividad = new ctrActividad();
$ctrMaterial= new ctrMaterial();
$listarMaterial = $ctrMaterial->listarMaterial();



if (isset($_GET['idActividad'])){
    $_SESSION['idAct'] = $_GET['idActividad'];
    $buscarActividad = $ctrActividad->buscarporID($_SESSION['idAct']);
    $buscarMaterial = $ctrMaterial->buscarPorActividad($_SESSION['idAct']);
   
}elseif(isset($_SESSION['idAct'])){
    $buscarActividad = $ctrActividad->buscarporID($_SESSION['idAct']);
    $buscarMaterial = $ctrMaterial->buscarPorActividad($_SESSION['idAct']);
}


if (isset($_POST['btnCrear'])) {
    $resultado = $ctrActividad->agregarMaterialActividad($_SESSION['idAct'],$_GET['idMaterial'], $_POST['cantMaterial'], $_POST['tipo']);
    header('Location: actividades.php');
}


?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/cssBase.css" rel="stylesheet">
<script src= '../js/jquery.min.js' type="text/javascript"></script>
<script src= '../js/jsbase.js' type="text/javascript"></script>


<script>
    
        
      
    $(function(){

        $("#mostrar").click(function(){
            $("#bgventana").show();
        })

        $("#ocultar").click(function(){
            $("#bgventana").hide();
        })

    })


        /*
        option 2
        $(function(){


        $("#mostrar").click(function(){
            $("#bgventana").css("display","block");
        })

        $("#ocultar").click(function(){
            $("#bgventana").css("display","none");
        })

    })*/

</script>

<h1 class="col-md-offset-1">Actividad<br><small></small></h1>
<br>
<br>

    <div class="col-sm-9"> 
        <div>
            <table class="table table-hover col-md-offset-1" >
                <thead>               
                    <th class="col-sm-4">Nombre</th>
                    <th>Descripcion</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="col-sm-6"><?php echo $buscarActividad['nombre_act']; ?></td>
                        <td><?php echo $buscarActividad['descripcion']; ?></td>
                    </tr>
                </tbody>    
            </table>
        </div> 
        <div>
            <table class="table table-hover col-md-offset-1" >
                <thead>
                   
                    <th>Nombre</th>
                    <th class="col-sm-2">Cod. Fabricante</th>
                    <th>Unidad</th>
                    <th>Marca</th>
                </thead>
                <tbody>
                    <?php while ($row = mysql_fetch_array($buscarMaterial))
                    {
                    ?>
                    <tr>
                        <td class="col-sm-6"><?php echo $row['nombre_material']; ?></td>
                        <td><?php echo $row['cod_fabricante']; ?></td>
                        <td><?php echo $row['unidad_medida']; ?></td>
                        <td><?php echo $row['nombre_marca']; ?></td>

                        <td>
                            <a href="?idMateria=<?php echo $row['idMaterial']; ?>"><span  class="glyphicon glyphicon-trash"></span>eliminar</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>    
            </table>
        </div>

        <div>
            <table class="table table-hover col-md-offset-1" >
                <thead>
                   
                    <th>Nombre</th>
                    <th class="col-sm-2">Cod. Fabricante</th>
                    <th>Unidad</th>
                    <th>Marca</th>
                    <th colspan="2">OPCIONES</th>
                </thead>
                <tbody>
                    <?php while ($row = mysql_fetch_array($listarMaterial))
                    {
                    ?>
                    <tr>
                        <td class="col-sm-6"><?php echo $row['nombre_material']; ?></td>
                        <td><?php echo $row['cod_fabricante']; ?></td>
                        <td><?php echo $row['nombre_unidad']; ?></td>
                        <td><?php echo $row['nombre_marca']; ?></td>

                        <td>
                            <a id="mostrar" href="?idMaterial=<?php echo $row['idMaterial']; ?>"><span  class="glyphicon glyphicon-plus-sign"></span>Agregar</a>

                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>    
            </table>
        </div>      
    </div>
    <div>
        <form method="POST">
            <div id="bgventana">
                <div id="ventana">
                    <div class="">
                        <div class="form-group">
                            <a id="ocultar" class="col-sm-offset-10">Cerrar <span class="glyphicon glyphicon-remove"></span></a>
                        </div>
                        <div class="form-group">
                            <center><h4><strong>Indique cantidad y tipo de material</strong></h4></center>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Cantidad</label>
                            <div class="col-sm-6">
                                <input class="form-control" type="text" name="cantMaterial"  value=""/>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-5 control-label">Tipo</label>
                            <div class="col-sm-6">
                                <select class="form-control" name="tipo" >
                                    <option value="0">Actividad</option>
                                    <option value="1">Complemento</option>

                                </select>
                            </div>
                        </div>
 
                        <br>
                        <br>
                        <br>


                        <div class="form-group">
                            
                              <button type="submit" class="col-sm-10 col-sm-offset-1 btn btn-primary"  name="btnCrear">Asignar
                              >
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php       
}
require_once('master.php');
?>



