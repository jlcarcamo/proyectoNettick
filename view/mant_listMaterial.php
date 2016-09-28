<?php 
session_start();
function contenido()
{
include_once('../controller/ctrMaterial.php');

$ctrMaterial= new ctrMaterial();
$listarMaterial = $ctrMaterial->listarMaterial();
/*
if (isset($_POST['boton'])) {
    if ($_POST['boton']==='buscar') 
    {
        $ctrMaterial->buscarMaterial($_POST['valor']); 
    }
}*/
?>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<script src= '../js/jquery.min.js' type="text/javascript"></script>
<script src="../js/jsbase.js" type="text/javascript"></script>



<h1 class="col-md-offset-1">Mantenedor de materiales <br><small>Listado</small></h1>
<br>

<div class="col-sm-10 col-md-offset-1">
    
    <script type="text/javascript">
        buscarMaterial('');
    </script>
    



    <div class="col-sm-5">
        <input class="form-control" type="text" name="buscar" placeholder="Buscar" onkeyup="buscarMaterial(this.value);"></input>
    </div>

    <div>
        <a href="mant_insertMaterial.php"><span class="glyphicon glyphicon-plus"></span>AGREGAR MATERIAL</a>
    </div>
</div>


<div class="col-sm-10 col-md-offset-1" id="lista">
    
</div>



<?php       
}
require_once('master.php');
?>



