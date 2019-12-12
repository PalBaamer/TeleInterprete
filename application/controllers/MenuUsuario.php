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
    
		$this->load->model('interprete_modelo');
		$datos= $this->obtenerDatos();
		$datos['urgencias']=1;
		$dia=date('Y-m-d');
		$hora=date('H-i-s');
		$listaInterpreteDisponibles=$this->interprete_modelo->interpretes_disponibles($dia,$hora);
		$max=sizeof($listaInterpreteDisponibles);
		if($max!=0){
			

		$i=rand(1, $max);
		$interprete=$listaInterpreteDisponibles[$i];
		$datos['interprete']=$interprete['id_interprete'];
        $this->load->view('Cabecera', $datos);
		$this->load->view('Llamada', $datos);

		}else{

			$this->load->view('Cabecera',$datos);
			$this->load->view('MenuUsuario',$datos);
			$this->load->view('SinIterprete',$datos);
			$this->load->view('Pie');
		}
	
	}

	
	public function grabarMinutos(){
		$datos= $this->obtenerDatos();
		$this->load->model('cita_modelo');
		$this->load->model('interprete_modelo');
		$datos= $this->obtenerDatos();

		$tiempo=$this->input->post('tiempo');
		$hora=$this->input->post('hora');
		$dia=$this->input->post('dia');
		$interprete=$this->input->post('inputInterprete');
		$sesionUsuario=$datos['usuario'];

		$id_usuario=$sesionUsuario->id_usuario;
		$hora_fin=date('h-i-s');
		$listaUrgenciasDatos=array('id_usuario'=>$id_usuario,
			'id_interprete'=>$interprete,
			'id_servicio'=>8,
			'dia'=>$dia,
			'hora_inicio'=>$hora,
			'hora_fin'=>$hora_fin,
			'total'=>$tiempo
		);
		$hora= $this->cita_modelo->insert($listaUrgenciasDatos);

		$this->load->view('Cabecera',$datos);
		$this->load->view('MenuUsuario',$datos);
		$this->load->view('Pie');
	
	
	}


	

	public function obtenerDatos(){
		$sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
			
		$this->load->model('usuario_modelo');
		
		$id=$sesionUsuario->id_usuario;
		$datos['id']=$id;
		$historial= $this->usuario_modelo->hitorialCitas($id);
		$datos['usuario']=$sesionUsuario;
		$datos['historial']=$historial;
		$datos['sesionUsuario']=-1;
		return $datos; 

	}


}
?>
