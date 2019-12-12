
<body >
  <header>
</header>



    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="<?php echo base_url()?>index.php/inicio">
            <img class="mb-4" src="<?php echo base_url('img/Comunicados.png') ?>" alt="Icono de Inicio" width="72" height="72">
          </a> 
          <a href="<?php echo base_url()?>index.php/Login" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Iniciar Sesion</a>


            <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">REGISTRO</button>
			      	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
			      		<a class="dropdown-item" href="<?php echo base_url('index.php/MenuAdmin/formularioInterprete') ?>">Interprepete</a>
		      			<a class="dropdown-item" href="<?php echo base_url('index.php/MenuAdmin/formularioUsuario') ?>">Usuario</a>
              </div>
            </div>

    </nav>
    <main role="main" class="container">
    </header>

<section class="loginCampo">
  <form class="form-signin justify-content-center" action="<?php echo base_url()?>index.php/Login/validarUsuario" method="POST">
      
      <h1 class="h3 mb-3 font-weight-normal">Inicia Sesión</h1>
      <label for="inputEmail" class="sr-only">Email </label>
      <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email"  >
      <label for="inputPassword" class="sr-only">Contraseña</label>
      <input type="password" id="inputPassword" class="form-control" minlength="8" name="inputPassword" placeholder="Contraseña" >
      <button class="btn btn-lg btn-primary btn-block" type="submit" >Entrar</button>

    
    </form>
    <a href="<?php echo base_url()?>index.php/LoginInterprete"><button class="btn btn-lg btn-primary btn-block form-signin">Soy Interprete</button></a></div>

    </section>
