<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$this->load->helper('array');
		$this->load->helper('url');
		$this->load->view('login');
		$this->load->view('pie');
		
	}
	public function validarUsuario(){
		$this->load->helper('cookie');

			$mail = $this->input->post('inputEmail');
			$pswd = sha1($this->input->post('inputPassword'));


	if($mail == null || $pswd==null){
		$this->load->view('login');
		$this->load->view('campoNull');
		$usuario=null;

	}else{
		$this->load->model('usuario_modelo');
		$usuario = $this->usuario_modelo->usuario_login($mail, $pswd);
		
		if($usuario ==null){

			$this->load->view('login');
			$this->load->view('errorLogin');
			
		}else{
			$datos['usuario'] = $usuario;
		
			$cookie = array(
				'name'   => 'datosSesion',
				'value'  => serialize($usuario),                            
				'expire' => '12000',                                                                                   
				'secure' => FALSE
				);
				$this->input->set_cookie($cookie);
				
				$this->load->model('usuario_modelo');
				$id=$usuario->id_usuario;
				$historial= $this->usuario_modelo->hitorialCitas($id);
				$datos['historial']=$historial;
				$datos['sesionUsuario']=-1;
				$this->load->view('cabecera',$datos);
				$this->load->view('menuUsuario',$datos);
				$this->load->helper('array');
				$this->load->helper('url');
				$this->load->view('pie');
				
		}
	}
}	
	
}
?>
