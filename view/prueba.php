<?php
//conexión a la base y selección de la tabla.

$nombres=array("pedro","juan","diego");
$apellidos= array("perez","carcamo","correa");

//imaginemos que te traes este array de un selector múltiple y quieres insertar en la base en el campo nombre. Yo creo el array aquí, pero tú lo recogerás mediante POST del formulario

$insertSQL="INSERT INTO nombretabla (nombre, apellido) VALUES ";//primera parte de la cadena de inserción



for($i = 0; $i < count($nombres); $i++)
{
	//recorro los valores del array, de primero a último
    $insertSQL .= sprintf("('%s', '%s'),", $nombres[$i], $apellidos[$i]);
}


 //a cada paso añado a la consulta de inserción cada uno de los valores entrecomillado y entre paréntesis, seguido por una coma
$insertSQL=rtrim($insertSQL,',');//elimino la última coma sobrante
echo $insertSQL;//esto es sólo para que veas la salida de la cadena de consulta. Luego te tocará el mysql_query y demás.
//$Result = mysql_query($insertSQL) or die(mysql_error());
?>