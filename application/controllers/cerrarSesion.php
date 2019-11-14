<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CerrarSesion extends CI_Controller {

	public function index(){
        $this->load->view('estilo');
        $this->load->view('login');
	}
	public function acceso(){

	}
}
?>