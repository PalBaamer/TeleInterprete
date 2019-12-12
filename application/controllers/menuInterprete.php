<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuInterprete extends CI_Controller {

	public function index(){
		
		$datos= $this->obtenerDatos();
		
        $this->load->view('Cabecera', $datos);
        $this->load->view('MenuInterprete',$datos);
        $this->load->view('Pie');
	}

	//A qué cita llama de ese día, guarda datos en cookie
	public function llamada(){
    
		$datos= $this->obtenerDatos();
		
		$id_cita=$this->input->get('id_cita');
		$datos['nCita']=$id_cita;
        $this->load->view('Cabecera', $datos);
		$this->load->view('Llamada', $datos);
	
	}

	public function grabarMinutos(){

		$this->load->model('cita_modelo');
		$datos= $this->obtenerDatos();
		
		$id=$this->input->post('id_cita');
		$tiempo=$this->input->post('tiempo');

		$hora= $this->cita_modelo->insertar_hora_fin($tiempo,$id);

		$this->load->view('Cabecera',$datos);
		$this->load->view('MenuInterprete',$datos);
		$this->load->view('Pie');
	
	}






	//-----------------------------------------VUELTA A LA VISTA MenuINTERPRETE
	private function obtenerDatos(){
        $this->load->helper('cookie');
		$sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
		$id=$sesionUsuario->id_interprete;
		$this->load->model('interprete_modelo');
		$historial= $this->interprete_modelo->hitorialCitas($id);
		$datos['id']=$id;
		$datos['historial']=$historial;
        $datos['sesionUsuario']=-1;
        $datos['interpreteDatos']=$sesionUsuario;
    
    	return $datos;
	}
}
?>