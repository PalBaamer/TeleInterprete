<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuUsuario extends CI_Controller {

	public function index(){
		$this->load->helper('cookie');
		$this->load->helper('array');
		$this->load->helper('url');
		$sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
			
			$this->load->model('usuario_modelo');
			$id=$sesionUsuario->id_usuario;
			$historial= $this->usuario_modelo->hitorialCitas($id);
			$datos['usuario']=$sesionUsuario;
			$datos['historial']=$historial;
			$datos['sesionUsuario']=-1;
			$this->load->view('Cabecera',$datos);
			$this->load->view('MenuUsuario',$datos);
			$this->load->view('Pie');

	}
	public function acceso(){

	}
}
?>