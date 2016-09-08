<?php 
include_once('../controller/ctrTrabajador.php');
include_once('../model/trabajador.php');
session_start();
$trabajador = new trabajador();
$ctrTrabajador = new ctrTrabajador();

if(isset($_POST['btnLogin']))
{
	$resultado = $ctrTrabajador->Login($_POST['rut'],$_POST['password']);
	
	if(mysql_num_rows($resultado)== 0)
	{
    		echo "Rut o Contraseña Incorrectos, Intentelo Nuevamente.";
	}
	else
	{
		$_SESSION['loggedin'] = true;
		$_SESSION['rut'] = $rut;
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (300*60);


		header("Location: listSolicitudes.php");
 	}	
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/login.css" rel="stylesheet">
</head>
<body>

	     <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="http://s11.postimg.org/7kzgji28v/logo_sm_2_mr_1.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form accept-charset="UTF-8" role="form" class="form-signin" method="POST">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        <input class="form-control" placeholder="Rut" name ="rut" id="username" type="text">
                                        <input class="form-control" placeholder="Contraseña" id="password" name="password" type="password">
                                        <br></br>
                                        <input class="btn btn-lg btn-primary btn-block" name="btnLogin" type="submit" id="login" value="Login »">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

</body>
</html>
?>