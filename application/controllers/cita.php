<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cita extends CI_Controller {

	public function index(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('pidecita');
	}
	public function pideCita(){
        $listaEmpresas = array();
		$this->load->model('servicio_modelo');
        $listaServicios= $this->servicio_modelo->listar_servicio();
        $datos['listaServicios'] = $listaServicios;

        $listaCategorias = array();
		$this->load->model('categoria_modelo');
        $listaCategorias= $this->categoria_modelo->listar_categoria();
        $datos['listaCategorias'] = $listaCategorias;


        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('pidecita' , $datos);
    }
    public function urgencias(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('urgencias');
    }
    public function misCitas(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('misCitas');
	}
}
?>