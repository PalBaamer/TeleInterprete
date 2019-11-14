<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$this->load->view('estilo');
		$this->load->view('login');
		$this->load->helper('array');
		$this->load->helper('url');
	}
	public function acceso(){
		$this->load->helper('array');
		$this->load->helper('url');
		$arrayData = array(
			'inputEmail' => $this->input->post('inputEmail'), 
			'inputPassword'=>$this->input->post('inputPassword'));
			var_dump($arrayData);die;
		$mail='paloma';
		$this->load->model('usuario_modelo');
		$this->usuario_modelo->existe_email($mail);
	}
}
?>
