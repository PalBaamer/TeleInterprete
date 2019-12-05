
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">


    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/navbar-fixed/">


    <!-- Custom styles for this template -->
    <link href="navbar-top-fixed.css" rel="stylesheet">


    <img class="mb-4" src="application/src/Comunicados.png" alt="" width="72" height="72">

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <?php
    /*
    $sesionUsuario = unserialize($_COOKIE['datosSesion']);
      var_dump('hola'.$sesionUsuario);
        
      echo '<a class="navbar-brand" href="'.base_url().'index.php/menuAdmin">Inicio</a>';
      die;
       /* switch ($tipoUsuario){
          case 0:
          echo '<a class="navbar-brand" href="'.base_url().'index.php/menuAdmin">Inicio</a>';
          break;
        
          case 1:
          echo '<a class="navbar-brand" href="'.base_url().'index.php/menuInterprete">Inicio</a>';
          break;

          case 2:
          echo '<a class="navbar-brand" href="'. base_url().'index.php/menuUsuario">Inicio</a>';
          break;

        }*/
      ?>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <a class="navbar-brand" href="<?php echo base_url()?>index.php/menuAdmin">Inicio</a>'  
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url()?>index.php/miPerfil">Mi perfil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url()?>index.php/cerrarSesion">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </nav>
    
