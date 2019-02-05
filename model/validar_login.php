<?php 
	$usuario = $_POST['usuario'];
	$clave = $_POST['clave'];
	
	if(empty($usuario))
 		{
			$error = "ERROR: Ingresar Usuario";
			echo "<script>";
			echo "if(confirm('$error'));";  
			echo "window.location = '../index.html';";
			echo "</script>";
		}
	if(empty($clave))
 		{
			$error = "ERROR: Ingresar Contraseña";
			echo "<script>";
			echo "if(confirm('$error'));";  
			echo "window.location = '../index.html';";
			echo "</script>";
		}
	include("conexion.php"); 	
	$sql = mysql_query("SELECT * from cuentas where id_cuenta='" . $usuario . "'");
 	if($row = mysql_fetch_array($sql))
 		{	
 			$pass_hash= $row['clave_cuenta']; 			
 					
			if(password_verify($clave, $pass_hash))
				{
					session_start();
					$_SESSION['usuario'] = $usuario;
					if($row['tipo_cuenta'] == 'A'){
						header("Location: ../view/panel_admin.html");
					}else {
						header("Location: ../view/panel_usuario.html");
					}				
				}
					else
						{
							$error = "Contraseña Invalida";
							echo "<script>";
							echo "if(confirm('$error'));";  
							echo "window.location = '../index.html';";
							echo "</script>";
						}
		}
			else
				{
					$error = "El Usuario No Existe";
					echo "<script>";
					echo "if(confirm('$error'));";  
					echo "window.location = '../index.html';";
					echo "</script>"; 
				} 
?>