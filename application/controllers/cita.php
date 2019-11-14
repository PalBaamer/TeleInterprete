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
		$this->load->model('empresa_modelo');
        $listaEmpresas= $this->empresa_modelo->mostrarEmpresasDisponibles();
        $datos['listaEmpresas'] = $listaEmpresas;
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