<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$this->load->view('estilo');
		$this->load->view('login');
	}
	public function acceso(){
		$mail='paloma';
		$this->load->model('usuario_modelo');
		$this->usuario_modelo->existe_email($mail);
	}
}
?>
