<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CerrarSesion extends CI_Controller {

	public function index(){
		$this->load->helper('cookie');
		$this->load->helper('array');
		$this->load->helper('url');
		$this->load->view('CabeceraBasica');
		$this->load->view('Login');
		delete_cookie('datosSesion');
	}
}
?>
