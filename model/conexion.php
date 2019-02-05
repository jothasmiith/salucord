<?php 
	$db_host="localhost"; 
	$db_usuario="root"; 
	$db_password=""; 
	$db_nombre="salucord"; 	
	$conexion = mysql_connect($db_host, $db_usuario, $db_password) or die("Error al conectar "  .mysql_error());
    mysql_select_db($db_nombre,$conexion) or die("Error al seleccionar la Base de datos: " .mysql_error()); 
?> 
