<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$this->load->view('estilo');
		$this->load->view('login');
		$this->load->helper('array');
		$this->load->helper('url');
		
	}
	public function validarUsuario(){
	/*	$this->load->view('estilo');
		$this->load->helper('cookie');
		$this->load->helper('array');
		$this->load->helper('url');
		$this->load->view('login');*/
		
		/*$arrayData = array(
			'inputEmail' => $this->input->post('inputEmail'), 
			'inputPassword'=>$this->input->post('inputPassword'));
		*/
			$mail = $this->input->post('inputEmail');
			$pswd = $this->input->post('inputPassword');


	if($mail == null || $pswd==null){
		$this->load->view('estilo');
				$this->load->view('login');
				$this->load->view('campoNull');
			}else{
				$this->load->model('usuario_modelo');
		
		$usuario = $this->usuario_modelo->usuario_login($mail, $pswd);
		var_dump($usuario);
		die;
			}

 /*
		if($usuario ==null){
			$arrayData = array(
				'error' => "El usuario no existe");
			$this->load->view('estilo');
			$this->load->view('login');
			$this->load->view('errorLogin');
			
		}else{
			$cookie = array(
				'name'   => 'datosSesion',
				'value'  =>0,                            
				'expire' => '12000',                                                                                   
				'secure' => TRUE
				);
				$this->input->set_cookie($cookie);
			
				$this->load->view('estilo');
				$this->load->view('cabecera');
				$this->load->view('menuUsuario');
				$this->load->helper('array');
				$this->load->helper('url');
			

			
			

		}
	}
*/
			}
	
}
?>
