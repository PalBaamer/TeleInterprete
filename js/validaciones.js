


function validarFormCompleto(){
	
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
			var z = validarEmail(email); //alert(z);
			var b = validarPass(contraseña); //alert(b);
			var c = validarNombre(nombre); //alert(c);
			var d = validarApellido(a1); //alert(d);
			var e = validarApellido(a2); //alert(e);
			var f = validarTelefono(telefono); //alert(f);
			var g = validarDireccion(direccion); //alert(g);
			var h = validarTarjeta(ncc); //alert(h);
			
			if(z==0 && b==0 && c==0 && d==0 && e==0 && f==0 && g==0 && h==0){
				document.b.submit();
			}else{
				swal("Comprueba los datos", "Hay datos incorrectos que no podemos registrar", "error");
				return false;
			}
		}
}


function validarEmail(email){
	//var email = document.a.email.value;
	var valor=1;
	var expresion = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
		if(!expresion.test(email.value)){
			alert("El email no cumple el formato");
		}
	
	return valor;
}

function validarDNI(input) {
	var numero
	var letr
	var letra
	var expresion_regular_dni
	var dni = input.value;
	expresion_regular_dni = /^\d{8}[a-zA-Z]{1}$/;

	if(expresion_regular_dni.test(dni) == true){
	   numero = dni.substr(0,dni.length-1);
	   letr = dni.substr(dni.length-1,9);
	   numero = numero % 23;
	   letra='TRWAGMYFPDXBNJZSQVHLCKET';
	   letra=letra.substring(numero,numero+1);
	  if (letra!=letr.toUpperCase()) {
		 alert('Dni erroneo, la letra del NIF no se corresponde');
	   }
	}else{
	   alert('Dni erroneo, formato no válido');
	 }
  }


function validarContrasena(pass){
	var valor=1;
	var expresion = /^[A-Za-z0-9]{8,10}$/;
	
		if(expresion.test(pass)){
			valor=0;
		}
	
	return valor;
}

function validarNombre(variable){
	var valor=1;
	var expresion = /^[A-Za-zÁÉÍÓÚáéíóú]{3,20}$/;
	var error="No puede tener números y ha de tener un mínimo de 3 letras";
	if(variable.value.match(expresion) && campo.value!=''){
		
	}else{
		alert(error);
		campos.focus();
}
}

/*
function validarApellido(ap){
	var valor=1;
	var expresion = /^[A-Za-zÁÉÍÓÚáéíóú]{3,10}$/;
	
		if(expresion.test(ap)){
			valor=0;
		}
	
	return valor;
}*/

function validarTelefono(tel){

	var valor=1;
	var expresion = /^[6|9]{1}[0-9]{8}$/;
		if(!expresion.test(tel.value)){
			alert('El telefono no cumple el formato');
		}
	
	return valor;
}

function validarDireccion(dir){
	var valor=1;
	var expresion = /^[a-zA-Z0-9\s,]{3,}$/;
	
		if(expresion.test(dir)){
			valor=0;
		}
	
	return valor;
}
function validarNCC(IBAN) {


	IBAN = IBAN.value;
	console.log(IBAN);
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
        alert('El NCC no cumple el formato, debe tener minimo 24 caracteres')
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
        alert('El NCC no cumple el formato')
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
