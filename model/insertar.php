<?php   
   $opcion = $_POST['opcion']; 
   switch ($opcion) {
      case 0:
      $tipo_documento= $_POST['tipo_documento'];
      $numero_documento= $_POST['numero_documento'];
      $nombres= $_POST['nombres'];
      $apellidos= $_POST['apellidos'];
      $fecha_nacimiento= $_POST['fecha_nacimiento'];
      $genero= $_POST['sex'];
      $grupo= $_POST['sangre'];
      $rh= $_POST['signo'];  
      $clave= $_POST['clave1'];
      $clave_hash= password_hash($clave, PASSWORD_BCRYPT);
      $tipo_cuenta= "A";
      if (isset($_POST['tipo_documento']) && !empty($_POST['tipo_documento']) &&
         isset($_POST['numero_documento']) && !empty($_POST['numero_documento']) &&
         isset($_POST['nombres']) && !empty($_POST['nombres']) &&
         isset($_POST['apellidos']) && !empty($_POST['apellidos']) &&
         isset($_POST['fecha_nacimiento']) && !empty($_POST['fecha_nacimiento']) &&
         isset($_POST['sex']) && !empty($_POST['sex']) &&
         isset($_POST['sangre']) && !empty($_POST['sangre']) &&
         isset($_POST['signo']) && !empty($_POST['signo']) &&
         isset($_POST['clave1']) && !empty($_POST['clave1']))
            {
               include("conexion.php");
               $sql1 = mysql_query("SELECT * from cuentas where id_cuenta='" . $numero_documento . "'");
 	if($row = mysql_fetch_array($sql1))
 		{		
         if($row['id_cuenta'] == $numero_documento){            
                     echo "El Usuario Ya Existe...";
         } 		
		}
			else
				{
               $sql2 = "INSERT INTO cuentas(id_cuenta, tipo_documento_cuenta, nombres_cuenta, apellidos_cuenta, fecha_nacimiento_cuenta, genero_cuenta, grupo_cuenta, rh_cuenta, clave_cuenta, tipo_cuenta) VALUES ('$numero_documento', '$tipo_documento','$nombres','$apellidos','$fecha_nacimiento','$genero','$grupo','$rh','$clave_hash','$tipo_cuenta')";
               $response = mysql_query($sql2, $conexion);
               echo "Registro Exitoso...";                
                
               
				} 

               
                           
                                  
            }
                  else
                     {                     
                        $error = "ERROR";
                        echo "<script>";
                        echo "if(confirm('$error'));";  
                        echo "window.location = '../view/insertar_usuario.html';";
                        echo "</script>";                                       
                     }      
          break;
      case 1:
          echo "i es igual a 1";
          break;
      case 2:
          echo "i es igual a 2";
          break;
  }
   
   
   
   
   
?>