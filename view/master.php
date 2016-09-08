<?php
ob_start();
include_once('../model/trabajador.php');
$trabajador = new trabajador();
$trabajador->Tiempo();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Pagina Maestra</title>
  <meta charset="UTF-8">


  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/master.css" rel="stylesheet">
</head>
<body>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
<body class="home">
    <div class="container-fluid display-table">

        <div class="row display-table-row">

                <div class="col-md-2 col-sm-1 hidden-xs display-table-cell v-align box" id="navigation">


                    <div class="logo">
                        <img src="../img/logo.png" alt="merkery_logo" class="hidden-xs hidden-sm"> 
                        </a>
                    </div>


                    <div class="navi">
                        <ul>
                            <li class="active"><a href="listSolicitudes.php"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Solicitudes</span></a></li>

                            <li class="active"><a href="listProyecto.php"><i class="fa fa-tasks" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Proyectos</span></a></li>

                            <li class="active"><a href="mant_listActividad.php"><i class="glyphicon glyphicon-flash" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Actividades</span></a></li>

                            <li class="active"><a href="mant_listMaterial.php"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Materiales</span></a></li>
                            <li class="active"><a href="mant_listHerramienta.php"><i class="glyphicon glyphicon-wrench" aria-hidden="true"></i><span class="hidden-xs hidden-sm">Herramientas</span></a></li>
                            <li class="active"><a href="#"><i class="fa fa-cog" aria-hidden="true"></i><span class="hidden-xs hidden-sm">administracion</span></a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-md-10 col-sm-11 display-table-cell v-align">
                    <!--<button type="button" class="slide-toggle">Slide Toggle</button> -->
                    <div class="row">
                        <header>
                            <div class="col-md-7">
                                <nav class="navbar-default pull-left">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas" data-target="#side-menu" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                </nav>
                                <div class="search hidden-xs hidden-sm">
                                    <input type="text" placeholder="Search" id="search">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="header-rightside"><a href="logout.php">Cerrar Sesión</a>
                                    <ul class="list-inline header-top pull-right">
                                        <li class="hidden-xs"><a href="#" class="add-project" data-toggle="modal" data-target="#add_project">Add Project</a></li>
                                        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
                                        <li>
                                            <a href="#" class="icon-info">
                                                <i class="fa fa-bell" aria-hidden="true"></i>
                                                <span class="label label-primary">3</span>
                                            </a>
                                        </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="../img/logo.png" alt="user">
                                                <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <div class="navbar-content">
                                                        <span>JS Krishna</span>
                                                        <p class="text-muted small">
                                                            me@jskrishna.com
                                                        </p>
                                                        <div class="divider">
                                                        </div>
                                                        <a href="#" class="view btn-sm active">View Profile</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </header>
                      </div>
                    <div>
                      
                      <?php  
                        contenido();
                      ?>


                    </div>

                </div>



            </div>
        </div>

    </div>



</body>


</body>
</html>
<?php  ob_start();  ?>