<?php 
session_start();

function contenido()
{
include_once('../controller/ctrSolicitud.php');
include_once('../model/trabajador.php');
$trabajador = new trabajador();
$ctrSolicitud = new ctrSolicitud();
$listarSolicitud = $ctrSolicitud->listarSolicitud();
$trabajador->Tiempo();
?>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <h1 class="col-md-offset-1">Solicitudes <br><small>Listado</small></h1>
  <br>
  <br>
  <br>
    <div class="col-sm-9">  
        <table class="table table-hover col-md-offset-1" >
            <thead>
                <th>N°</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Fecha Creacion</th>
                <th>Estado</th>
                <th colspan="2">OPCIONES</th>
            </thead>
            <tbody>
                <?php while ($row = mysql_fetch_array($listarSolicitud))
                {
                ?>
                <tr>
                    <td><?php echo $row['idsolicitud']; ?></td>
                    <td><?php echo $row['nombre_contacto']; ?></td>
                    <td><?php echo $row['apellido_contacto']; ?></td>
                    <td><?php echo $row['correo']; ?></td>
                    <td><?php echo $row['fechaSolicitud']; ?></td>
                    <td><?php echo $row['nombre_estado']; ?></td>
                    <td>

                        <a href="verSolicitud.php?idSolicitud=<?php echo $row['idsolicitud']; ?>"> <span class="glyphicon glyphicon-eye-open"></span></a>
                    </td>
                    <td>
                        <a href="?cargar=Eliminar&idSolicitud=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
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
