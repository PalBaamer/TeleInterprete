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
		
		
		$mail = $this->input->post('inputEmail');
		$pswd = $this->input->post('inputPassword');




		if($mail == null || $pswd==null){
			$this->load->library('javascript');
			$this->load->view('estilo');
			$this->load->view('loginInterprete');
			$this->load->view('campoNull');


		}else{
		$this->load->model('interprete_modelo');
		
		$interprete = $this->interprete_modelo->interprete_login($mail, $pswd);
		if($interprete ==null){
			$this->load->view('estilo');
			$this->load->view('loginInterprete');
			$this->load->view('errorLogin');

			
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
				$this->load->view('menuAdmin', $interprete);
				$this->load->helper('array');
				$this->load->helper('url');

			}else{				
				$this->load->view('estilo');
				$this->load->view('cabecera');
				$this->load->view('menuInterprete',$interprete);
				$this->load->helper('array');
				$this->load->helper('url');

			}

		}
		}
	}
}
?>