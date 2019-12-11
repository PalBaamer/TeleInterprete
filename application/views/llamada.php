<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <script>
    var inicio=0;
    var timeout=0;
 
    function empezarDetener(elemento)
    {
        document.getElementById("editarVisible").style.display = "none";
  document.getElementById("ocultar").style.display= "block";
        if(timeout==0)
        {
            // empezar el cronometro
 
            elemento.value="Detener";
 
            // Obtenemos el valor actual
            inicio=new Date().getTime();
 
            // Guardamos el valor inicial en la base de datos del navegador
            localStorage.setItem("inicio",inicio);
 
            // iniciamos el proceso
            funcionando();
        }else{
            // detemer el cronometro
 
            elemento.value="Empezar";
            clearTimeout(timeout);
 
            // Eliminamos el valor inicial guardado
            localStorage.removeItem("inicio");
            timeout=0;
        }
    }
 
    function funcionando()
    {
        // obteneos la fecha actual
        var actual = new Date().getTime();
 
        // obtenemos la diferencia entre la fecha actual y la de inicio
        var diff=new Date(actual-inicio);
 
        // mostramos la diferencia entre la fecha actual y la inicial
        var result=LeadingZero(diff.getUTCHours())+":"+LeadingZero(diff.getUTCMinutes())+":"+LeadingZero(diff.getUTCSeconds());
        document.getElementById('crono').innerHTML = result;
 
        document.getElementById('tiempo').value=result;
        // Indicamos que se ejecute esta función nuevamente dentro de 1 segundo
        timeout=setTimeout("funcionando()",1000);
    }
 
    /* Funcion que pone un 0 delante de un valor si es necesario */
    function LeadingZero(Time)
    {
        return (Time < 10) ? "0" + Time : + Time;
    }
 
    window.onload=function(){
        
    document.getElementById("editarVisible").style.display = "block";
  document.getElementById("ocultar").style.display= "none";
        if(localStorage.getItem("inicio")!=null)
        {
            // Si al iniciar el navegador, la variable inicio que se guarda
            // en la base de datos del navegador tiene valor, cargamos el valor
            // y iniciamos el proceso.
            inicio=localStorage.getItem("inicio");
            document.getElementById("boton").value="Detener";
            funcionando();
        }
    }
    </script>
 
    <style>
    .crono_wrapper {text-align:center;width:200px;}
    </style>
</head>
 
<body>
 
<div class="crono_wrapper">
    <h2 id='crono'>00:00:00</h2>
    <input type="image" src="<?php echo base_url('img/llamar.png') ?>" width="72" height="72" value="Empezar" id="editarVisible" display="none" onclick="empezarDetener(this);">
   <?php  if($urgencias==1){
?>
<form class="form" action="<?php echo base_url() ?>index.php/MenuUsuario/grabarMinutos " method="POST">

<?php
    }else{
        ?>
    <form class="form" action="<?php echo base_url() ?>index.php/MenuInterprete/grabarMinutos " method="POST">
    <input type="hidden" value="<?php echo $nCita?>"  name="id_cita">

    <?php }  ?>
    <input type="hidden" value="<?php echo date('Y-m-d')?>"  name="dia">
    <input type="hidden" value="<?php echo date('h:i:s')?>"  name="hora">
    <input type="text" value=""  id="tiempo" name="tiempo">
    <input type="image" src="<?php echo base_url('img/colgar.png') ?>" width="72" height="72" value="Detener"  id="ocultar"  display="block" onclick="empezarDetener(this);">
    </form>
</div>
    <!--script>
    var inicio=0;
    var timeout=0;
 
    function empezarDetener(elemento){
        
  document.getElementById("editarVisible").style.display = "none";
  document.getElementById("ocultar").style.display= "block";
        if(timeout==0)
        {
            // empezar el cronometro
 
        
 
            // Obtenemos el valor actual
            inicio=new Date().getTime();
 
            // Guardamos el valor inicial en la base de datos del navegador
            localStorage.setItem("inicio",inicio);
 
            // iniciamos el proceso
            funcionando();
        }else{
            // detemer el cronometro
 
            clearTimeout(timeout);
 
            // Eliminamos el valor inicial guardado
            localStorage.removeItem("inicio");
            timeout=0;
        }
    }
 
    function funcionando()
    {
        // obteneos la fecha actual
        var actual = new Date().getTime();
 
        // obtenemos la diferencia entre la fecha actual y la de inicio
        var diff=new Date(actual-inicio);
 
        // mostramos la diferencia entre la fecha actual y la inicial
        var result=LeadingZero(diff.getUTCHours())+":"+LeadingZero(diff.getUTCMinutes())+":"+LeadingZero(diff.getUTCSeconds());
        document.getElementById('crono').innerHTML = result;
         elemento.value=result;
        // Indicamos que se ejecute esta función nuevamente dentro de 1 segundo
        timeout=setTimeout("funcionando()",1000);
    }
 
    /* Funcion que pone un 0 delante de un valor si es necesario */
    function LeadingZero(Time)
    {
        return (Time < 10) ? "0" + Time : + Time;
    }
 
    window.onload=function(){
        
document.getElementById("editarVisible").style.display = "block";
  document.getElementById("ocultar").style.display= "none";
        if(localStorage.getItem("inicio")!=null)
        {
            // Si al iniciar el navegador, la variable inicio que se guarda
            // en la base de datos del navegador tiene valor, cargamos el valor
            // y iniciamos el proceso.
            inicio=localStorage.getElementById("editarVisible");
            document.getElementById("ocultar").value="Detener";
            funcionando();
        }
    }
    </script>
 
    <style>
    .crono_wrapper {text-align:center;width:200px;}
    </style>
</head>
 
<body>
 
<div class="crono_wrapper">
    <h2 id='crono'>00:00:00</h2>
    <input type="image" src="<?php echo base_url('img/llamar.png') ?>" width="72" height="72" value="Empezar" id="editarVisible" display="none" onclick="empezarDetener(this);">
    <form class="form" action="<?php echo base_url() ?>index.php/MenuInterprete/grabarMinutos " method="POST">
    <input type="hidden" value="<?php echo $nCita?>"  name="id_cita">
    <input type="hidden" value="Empezar"  name="tiempo">
    <input type="image" src="<?php echo base_url('img/colgar.png') ?>" width="72" height="72" value="Detener"  id="ocultar"  display="block" onclick="empezarDetener(this);">
    </form>
</div-->
 
</body>
</html>