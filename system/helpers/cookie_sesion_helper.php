<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->helper('cookie');
$sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
return $sesionUsuario;








?>