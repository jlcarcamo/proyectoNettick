<?php
session_start();
include_once('../controller/ctrSolicitud.php');
include_once('../controller/ctrEstado.php');
$ctrSolicitud = new ctrSolicitud();
$ctrEstado = new ctrEstado();
//$listarEstado = $ctrEstado->buscarEstado('1');


if (isset($_POST['btnEnviar']))
{
		$ctrSolicitud->crearSolicitud(date("Y-m-d"), $_POST['descripcion'], $_POST['nombre_contacto'], $_POST['apellido_contacto'], $_POST['cargo'], $_POST['telefono_contacto'], $_POST['correo']);
}
?>
<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Contact Form Template</title>

        <!-- CSS -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100italic,300,300italic,400,400italic,500,500italic">        
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">

    </head>
 		
    <body>



		<!-- Contact Form -->
		<div class="c-form-container section-container section-container-image-bg">
	        <div class="container">
	        	
	            <div class="row">
	                <div class="col-sm-8 col-sm-offset-2 c-form section-description wow fadeIn">
	                    <h1>Netlife <strong>Solicitud </strong>de Trabajo</h1>
	                    <p>Envienos su consulta o solicitud de cotizacion y nos contactaremos a la brevedad</p>
	                </div>
	            </div>
	            
	            <div class="row">
	            	<div class="col-sm-6 col-sm-offset-3 c-form-box wow fadeInUp">
	            		
	                    <div class="c-form-top">
                    		<div class="c-form-top-left">
                    			<h3>Contactenos</h3>
								<p>Complete el siguiente formulario para contactarse  con NETLIFE:</p>
                    		</div>
                    		<div class="c-form-top-right">
                    			<div class="c-form-top-right-icon">
                    				<i class="fa fa-paper-plane"></i>
                    			</div>
                    		</div>
                        </div>
                        <div class="c-form-bottom">
		                   




		                    <form role="form" action="" method="POST">
		                    	<div class="form-group">
		                    		<label for="c-form-name">
		                    			<span class="label-text">Nombre:</span> 
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<input type="text" name="nombre_contacto" value="" placeholder="Tu nombre..." class="c-form-name form-control" id="c-form-name" required="">
		                        </div>
		                    	<div class="form-group">
		                    		<label for="c-form-email">
		                    			<span class="label-text">Apellidos:</span> 
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<input type="text" name="apellido_contacto" value="" placeholder="Tu apellido..." class="c-form-email form-control" id="c-form-email" required="">
		                        </div>
		                        <div class="form-group">
		                        	<label for="c-form-subject">
		                    			<span class="label-text">Cargo:</span> 
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<input type="text" name="cargo" value="" placeholder="Tu cargo..." class="c-form-subject form-control" id="c-form-subject" required="">
		                        </div>
		                        <div class="form-group">
		                        	<label for="c-form-subject">
		                    			<span class="label-text">Telefono:</span> 
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<input type="text" name="telefono_contacto" value="" placeholder="Tu telefono..." class="c-form-subject form-control" id="c-form-subject" required="">
		                        </div>
		                        
		                        <div class="form-group">
		                        	<label for="c-form-subject">
		                    			<span class="label-text">Correo:</span> 
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<input type="text" name="correo" value="" placeholder="Tu correo..." class="c-form-subject form-control" id="c-form-subject" required="">
		                        </div>


		                        <div class="form-group">
		                        	<label for="c-form-message">
		                    			<span class="label-text">Descripcion:</span> 
		                    			<span class="contact-error"></span>
		                    		</label>
		                        	<textarea name="descripcion" value="" placeholder="Descripcion..." class="c-form-message form-control" id="c-form-message" required=""></textarea>
		                        </div>



		                        <button type="submit" name="btnEnviar" class="btn">Enviar Solicitud</button>

		                    </form>
	                    </div>
	                    
	                </div>
	            </div>
	            
	            <div class="row">
	            	<div class="col-sm-12 c-form-info-title wow fadeInUp">
	            		<h3>...or find us here:</h3>
	            	</div>
	            </div>
	            
	            <div class="row">
	            	<div class="col-sm-3 c-form-info-box wow fadeInUp">
	            		<div class="c-form-info-box-icon">
	            			<i class="fa fa-map-marker"></i>
	            		</div>
	            		<p>Via Po 10<br>10136 Turin IT</p>
	            	</div>
	            	<div class="col-sm-3 c-form-info-box wow fadeInDown">
	            		<div class="c-form-info-box-icon">
	            			<i class="fa fa-phone"></i>
	            		</div>
	            		<p>Phone:<br>333 12 68 347</p>
	            	</div>
	            	<div class="col-sm-3 c-form-info-box wow fadeInUp">
	            		<div class="c-form-info-box-icon">
	            			<i class="fa fa-envelope"></i>
	            		</div>
	            		<p>Email:<br><a href="mailto:contact.azmind@gmail.com">contacto@netlife.cl</a></p>
	            	</div>
	            	<div class="col-sm-3 c-form-info-box wow fadeInDown">
	            		<div class="c-form-info-box-icon">
	            			<i class="fa fa-skype"></i>
	            		</div>
	            		<p>Skype:<br>azmind_online</p>
	            	</div>
	            </div>
	            
	        </div>
        </div>
        

        <!-- Javascript -->
        //
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/jquery.backstretch.min.js"></script>
        <script src="../assets/js/wow.min.js"></script>
        <script src="../assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
