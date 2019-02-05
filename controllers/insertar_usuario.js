function Validar(letra) { 
	tecla = (document.all) ? letra.keyCode : letra.which; 
	if (tecla==8) return true; 
	patron =/[A-Za-z\s]/; 
	t = String.fromCharCode(tecla); 
	return patron.test(t); 
}	
	
	
	$(document).ready(function(){
    $("input[type=submit]").click(function(evt){
        evt.preventDefault();
		var opcion= 0;
        
                    
       var clave1= document.getElementById('clave1').value;
	var clave2= document.getElementById('clave2').value; 


       


       
       
        
	if (clave1 == clave2) {
		if(clave1.length < 8){
			alert("La contraseña debe tener minimo 8 carateres") 
		} 
		else{
			if(clave1.length > 12 ){
				alert("La contraseña debe tener maximo 12 carateres")
			}
			else{
				if (! /^[a-zA-Z0-9]+$/.test(clave1)){
					alert("La clave debe contener: \n- Mayusculas \n- Minusculas \n- Numeros \n- Simbolos") 
				} 
				else{
					var tipo_documento= document.getElementById('tipo_documento').value;
					var numero_documento= document.getElementById('numero_documento').value;
                   var nombres= document.getElementById('nombres').value;                    
	                nombres = nombres.toUpperCase();	
                    var apellidos= document.getElementById('apellidos').value;
                    apellidos = apellidos.toUpperCase();
					var fecha_nacimiento= document.getElementById('fecha_nacimiento').value;
                     var genero= document.getElementsByName("genero");
                     var sex= "";
        
        
					for(i=0;i<genero.length;i++){
						if(genero[i].checked){
							sex=genero[i].value;	
						}						   
					}
                    var grupo= document.getElementsByName('grupo');
                    var sangre= "";
					for(i=0;i<grupo.length;i++){
						if(grupo[i].checked){
							sangre=grupo[i].value;
						}						   
					}
                    var rh= document.getElementsByName('rh');
                    var signo= "";
					for(i=0;i<rh.length;i++){
						if(rh[i].checked)
						signo=rh[i].value;
					}	
					
					if(numero_documento == null || numero_documento.length == 0 || /^\s+$/.test(numero_documento)){
						alert('ERROR: El campo NUMERO DE DOCUMENTO no debe ir vacío');
						return false;
				   }
			
					if(nombres == null || nombres.length == 0 || /^\s+$/.test(nombres)){
						alert('ERROR: El campo NOMBRES no debe ir vacío');
						return false;
				   }
			
				   if(apellidos == null || apellidos.length == 0 || /^\s+$/.test(apellidos)){
					alert('ERROR: El campo APELLIDOS no debe ir vacío');
					return false;
			   }
			
			   if(fecha_nacimiento == null || fecha_nacimiento.length == 0 || /^\s+$/.test(fecha_nacimiento)){
				alert('ERROR: El campo FECHA DE NACIMIENTO no debe ir vacío');
				return false;
			}
			
			if(sex == null || sex.length == 0 || /^\s+$/.test(sex)){
				alert('ERROR: El campo GENERO no debe ir vacío');
				return false;
			}

			if(sangre == null || sangre.length == 0 || /^\s+$/.test(sangre)){
				alert('ERROR: El campo GRUPO no debe ir vacío');
				return false;
			}

			if(signo == null || signo.length == 0 || /^\s+$/.test(signo)){
				alert('ERROR: El campo RH no debe ir vacío');
				return false;
			}
                    
                    $.post("../model/insertar.php", {
                        tipo_documento: tipo_documento,
                        numero_documento: numero_documento,
                        nombres: nombres,
                        apellidos: apellidos,
                        fecha_nacimiento: fecha_nacimiento,
                        sex: sex,
                        sangre: sangre,
                        signo: signo,
                        clave1: clave1,
						opcion: opcion
                    },function(respuesta){
						$("#info").text(respuesta);
					 }) 
				}				
			}
			
		}
	} 
	else{
		alert("Las contraseñas no coinciden") 
	}
        
        







       
    });
});
