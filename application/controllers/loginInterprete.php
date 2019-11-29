<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginInterprete extends CI_Controller {

	public function index(){
		$this->load->view('estilo');
		$this->load->view('loginInterprete');
		
	}

	public function validarInterprete(){
		$this->load->helper('cookie');
		$this->load->helper('array');
		$this->load->helper('url');
		
		$arrayData = array(
			'inputEmail' => $this->input->post('inputEmail'), 
			'inputPassword'=>$this->input->post('inputPassword'));
			$mail = $this->input->post('inputEmail');
			$pswd = $this->input->post('inputPassword');
		$this->load->model('interprete_modelo');
		
		
		
		$interprete = $this->interprete_modelo->interprete_login($mail, $pswd);
		if($interprete ==null){
			$arrayData = array(
				'error' => "El usuario no existe");
			$this->load->view('loginInterprete');
			
		}else{
			$cookie = array(
				'name'   => 'datosSesion',
				'value'  =>0,                            
				'expire' => '12000',                                                                                   
				'secure' => TRUE
				);
				$this->input->set_cookie($cookie);
			
			if($interprete->categoria==0){
				$this->load->view('estilo');
				$this->load->view('cabecera');
				$this->load->view('menuAdmin');
				$this->load->helper('array');
				$this->load->helper('url');

			}else{				
				$this->load->view('estilo');
				$this->load->view('cabecera');
				$this->load->view('menuInterprete');
				$this->load->helper('array');
				$this->load->helper('url');

			}

			
			

		}
	}
}
?>