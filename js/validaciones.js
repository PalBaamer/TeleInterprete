


function limpiar(){
  var padre = document.getElementById("citas");
  
    document.body.style.backgroundImage="url('')";
   
  while(padre.firstChild){
      padre.removeChild(padre.firstChild);
  }
}

function uno(){
	window.open("../vistas/registro.php","_self");
}



function cuatro(){
	
	var email = document.b.email.value;
	var contraseña = document.b.contraseña.value;
	var nombre = document.b.nombre.value;
	//var nif = document.b.nif.value;
	var a1 = document.b.apellido1.value;
	var a2 = document.b.apellido2.value;
	var telefono = document.b.telefono.value;
	var direccion = document.b.direccion.value;
	var ncc = document.b.ncc.value;
	var urgencia = document.b.urgencia.value;
	
		if(email=="" || contraseña=="" || nombre=="" || /*nif=="" || */a1=="" || a2=="" || telefono=="" || direccion=="" || ncc=="" || urgencia==""){
			swal("Comprueba los datos", "Ningún campo se puede quedar vacío", "error");
			return false;
		}else{
			var z = ValidarEmail(email); //alert(z);
			var b = ValidarPass(contraseña); //alert(b);
			var c = ValidarNombre(nombre); //alert(c);
			var d = ValidarApellido(a1); //alert(d);
			var e = ValidarApellido(a2); //alert(e);
			var f = ValidarTelefono(telefono); //alert(f);
			var g = ValidarDireccion(direccion); //alert(g);
			var h = ValidarTarjeta(ncc); //alert(h);
			
			if(z==0 && b==0 && c==0 && d==0 && e==0 && f==0 && g==0 && h==0){
				document.b.submit();
			}else{
				swal("Comprueba los datos", "Hay datos incorrectos que no podemos registrar", "error");
				return false;
			}
		}
}


function ValidarEmail(email){
	//var email = document.a.email.value;
	var valor=1;
	var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
	
		if(expresion.test(email)){
			valor=0;
		}
	
	return valor;
}
function nif(dni) {
	var numero
	var letr
	var letra
	var expresion_regular_dni
   
	expresion_regular_dni = /^\d{8}[a-zA-Z]$/;
   
	if(expresion_regular_dni.test (dni) == true){
	   numero = dni.substr(0,dni.length-1);
	   letr = dni.substr(dni.length-1,1);
	   numero = numero % 23;
	   letra='TRWAGMYFPDXBNJZSQVHLCKET';
	   letra=letra.substring(numero,numero+1);
	  if (letra!=letr.toUpperCase()) {
		 alert('Dni erroneo, la letra del NIF no se corresponde');
	   }else{
		 alert('Dni correcto');
	   }
	}else{
	   alert('Dni erroneo, formato no válido');
	 }
  }
function ValidarPass(pass){
	var valor=1;
	var expresion = /^[A-Za-z0-9]{8,10}$/;
	
		if(expresion.test(pass)){
			valor=0;
		}
	
	return valor;
}

function ValidarNombre(variable){
	var valor=1;
	var expresion = /^[A-Za-zÁÉÍÓÚáéíóú]{3,20}$/;
	var error="Ha de tener la primera en mayúsculas y mínimo 3 caracteres";
	if(variable.value.match(expresion) && campo.value!=''){
		
	}else{
		alert(error);
		campos.focus();
}

/*
function ValidarApellido(ap){
	var valor=1;
	var expresion = /^[A-Za-zÁÉÍÓÚáéíóú]{3,10}$/;
	
		if(expresion.test(ap)){
			valor=0;
		}
	
	return valor;
}*/

function ValidarTelefono(tel){
	var valor=1;
	var expresion = /^[0-9]{9}$/;
	
		if(expresion.test(tel)){
			valor=0;
		}
	
	return valor;
}

function ValidarDireccion(dir){
	var valor=1;
	var expresion = /^[a-zA-Z0-9\s,.'-º]{3,}$/;
	
		if(expresion.test(dir)){
			valor=0;
		}
	
	return valor;
}
/*
function ValidarTarjeta(ncc){
	var valor=1;
	var expresion= /^[0-9]{20}$/;
	
	if(expresion.test(ncc)){
			valor=0;
		}
	
	return valor;
	
}
*/
function fn_ValidateIBAN(IBAN) {

    //Se pasa a Mayusculas
    IBAN = IBAN.toUpperCase();
    //Se quita los blancos de principio y final.
    IBAN = IBAN.trim();
    IBAN = IBAN.replace(/\s/g, ""); //Y se quita los espacios en blanco dentro de la cadena

    var letra1,letra2,num1,num2;
    var isbanaux;
    var numeroSustitucion;
    //La longitud debe ser siempre de 24 caracteres
    if (IBAN.length != 24) {
        return false;
    }

    // Se coge las primeras dos letras y se pasan a números
    letra1 = IBAN.substring(0, 1);
    letra2 = IBAN.substring(1, 2);
    num1 = getnumIBAN(letra1);
    num2 = getnumIBAN(letra2);
    //Se sustituye las letras por números.
    isbanaux = String(num1) + String(num2) + IBAN.substring(2);
    // Se mueve los 6 primeros caracteres al final de la cadena.
    isbanaux = isbanaux.substring(6) + isbanaux.substring(0,6);

    //Se calcula el resto, llamando a la función modulo97, definida más abajo
    resto = modulo97(isbanaux);
    if (resto == 1){
        return true;
    }else{
        return false;
    }
}

function modulo97(iban) {
    var parts = Math.ceil(iban.length/7);
    var remainer = "";

    for (var i = 1; i <= parts; i++) {
        remainer = String(parseFloat(remainer+iban.substr((i-1)*7, 7))%97);
    }

    return remainer;
}

function getnumIBAN(letra) {
    ls_letras = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    return ls_letras.search(letra) + 10;
}

