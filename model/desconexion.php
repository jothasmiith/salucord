<!DOCTYPE html>
<html lang="es">
   <head>
      <title>Login</title>
      <meta charset="utf-8">
      <meta http-equiv="Refresh" content="3;url=index.html">
      <script src="noregresar.js"></script>
      <link rel="stylesheet" type="text/css" href="style/login.css">
   </head>  

   <body onload="nobackbutton();">
    	<?php 
			  include("conexion.php");
		    mysql_close($conexion);
        echo "Saliendo...";      
		  ?>
   </body>
</html>

 