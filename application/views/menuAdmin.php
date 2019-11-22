<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

		<title>Menu_Usuario</title>

		<link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/sign-in/">

		<!-- Bootstrap core CSS 
	<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<style>/*
.grid-container {
  display: grid;
  justify-content: space-between;
  grid-template-columns: px 50px 50px; Make the grid smaller than the container
.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}
  grid-gap: 10px;
  background-color: #2196F3;
  padding: 10px;
  padding: 20px 0;
}*/

</style>
	</head>
<script>

</script>

	<body class="text-center">
  <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown link
  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>

  <div class="btn-group">
  <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <a class="dropdown-item" href="#">Something else here</a>

        </div>
  </div>
  <div class="btn-group">
      <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action</button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo base_url()?>index.php/cita/pideCita">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
      </div>       
      </div>

  <div class="grid-container">
      <div>
              <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                  <div class="card-body">
                      <h5 class="card-title">Empresas</h5><div class="btn-group">
 
                  </div>
              </div>
      </div>
      </div>  
      
      <div class="toggler">
                        <div id="effect" class="ui-widget-content ui-corner-all">
                            
                                    <div class="card" >
                                          <div id="effect" class="ui-widget-content ui-corner-all">
                                            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                                                <button id="button" class="ui-state-default ui-corner-all">Empresas</button>
                                          </div>
                                  </div>
                        </div>
            </div>
      </div>
            <div class="toggler">
                        <div id="effect" class="ui-widget-content ui-corner-all">
                            
                                    <div class="card" >
                                          <div id="effect" class="ui-widget-content ui-corner-all">
                                            <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                                                <button id="button" class="ui-state-default ui-corner-all">Interpretes</button>
                                          </div>
                                  </div>
                        </div>
            </div>
  </div>
	</body>
</html>