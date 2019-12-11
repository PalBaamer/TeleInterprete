<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuUsuario extends CI_Controller {

	public function index(){
		$this->load->helper('cookie');
		$this->load->helper('array');
		$this->load->helper('url');
		
		$datos= $this->obtenerDatos();
			$this->load->view('Cabecera',$datos);
			$this->load->view('MenuUsuario',$datos);
			$this->load->view('Pie');

	}
	public function llamada(){
    
		$datos= $this->obtenerDatos();
		$datos['urgencias']=1;
        $this->load->view('Cabecera', $datos);
		$this->load->view('Llamada', $datos);
	
	}

	
	public function grabarMinutos(){

		$this->load->model('cita_modelo');
		$this->load->model('interprete_modelo');
		$datos= $this->obtenerDatos();

		$tiempo=$this->input->post('tiempo');
		$dia=$this->input->post('dia');
		$hora=$this->input->post('hora');
		$listaInterpreteDisponibles=$this->interprete_modelo->interpretes_disponibles($dia,$hora);
		$interprete=$listaInterpreteDisponibles[0];
		var_dump($interprete);die;
		$interprete->id_interprete;
		var_dump($interprete);die;

		$sesionUsuario=$datos['sesionUsuario'];
		$id_usuario=$sesionUsuario->id_usuario;
		$listaUrgenciasDatos=array('id_usuario'=>$id_usuario,
			'id_interprete'=>$id_usuario,
			'id_servicio'=>8,
			'dia'=>$dia,
			'hora_inicio'=>$hora,
			'hora_fin'=>$hora+$tiempo,
			'total'=>$tiempo
		);
		$hora= $this->cita_modelo->insert($listaUrgenciasDatos);

		$this->load->view('Cabecera',$datos);
		$this->load->view('MenuInterprete',$datos);
		$this->load->view('Pie');
	
	}


	

	public function obtenerDatos(){
		$sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
			
		$this->load->model('usuario_modelo');
		$id=$sesionUsuario->id_usuario;
		$historial= $this->usuario_modelo->hitorialCitas($id);
		$datos['usuario']=$sesionUsuario;
		$datos['historial']=$historial;
		$datos['sesionUsuario']=-1;
		return $datos; 

	}


}
?>