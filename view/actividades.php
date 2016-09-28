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

if (isset($_GET['idMateria'])){
    $ctrActividad->eliminarMaterialActividad($_GET['idMateria'],$_SESSION['idAct']);
    header('Location: actividades.php');
}

if (isset($_POST['btnCrear'])) {
    $resultado = $ctrActividad->agregarMaterialActividad($_SESSION['idAct'], $_POST['idMat'], $_POST['cantMaterial'], $_POST['tipo']);
    header('Location: actividades.php');
}
?>
<link href="../css/cssBase.css" rel="stylesheet">
<script src= '../js/jquery.min.js' type="text/javascript"></script>
<script src="../js/jsbase.js" type="text/javascript"></script>
<script>       
    $(function(){

        $(".mostrarModal").click(function(){
            var idMat = $(this).attr("Mat"); 
            $("#bgventana").show(); 
            console.log(idMat);
            $("#idMat").val(idMat);
            }
        );
        $("#ocultar").click(function(){
            $("#bgventana").hide();
        })
    })
</script>
<h1 class="col-md-offset-1">Actividad<br><small>Relacion de actividad y materiales</small></h1>
<br>
   <script type="text/javascript">
        buscarMat('');
    </script>

<br>
    <div class="col-sm-9 col-md-offset-1"> 
        <h4><strong>Actividad</strong></h4>
        <div>
            <table class="table table-hover" >
                <thead class="thead-inverse">               
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
        <br>
        <h4><strong>Materiales que integran actividad</strong></h4>
        <div>
            <table class="table table-hover" >
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
        <br>
        <h4><strong>Materiales</strong></h4>
            
    </div>







    <div class="col-sm-5 col-md-offset-1">
        <input class="form-control" type="text" name="buscar" placeholder="Buscar" onkeyup="buscarMat(this.value);"></input>
    </div>


    <div class="col-sm-10 col-md-offset-1" id='lista'>  
 

    </div>






    

    <div>
        <form method="POST">
        <input type='hidden' id='idMat' name='idMat' value=''/>
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
