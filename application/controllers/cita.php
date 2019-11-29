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
		$this->load->view('pedirCita' , $datos);
    }



    public function grabarCita(){

        $categoria = $_POST['categoria'];
        var_dump($categoria);
        $servicio=$_POST['servicio'];
        
        $dia = $this->input->post('fecha');
        $hora=$_POST['dia'];

        $listaInterpretes = array();
        $this->load->model('interprete_modelo');
        $listaInterpretes = $this->interprete_modelo->interpretes_disponibles( $dia, $hora );
        $datos['listaInterpretes'] = $listaInterpretes;
        


        $arrayData = array(
			'inputEmail' => $this->input->post('inputEmail'), 
			'inputPassword'=>$this->input->post('inputPassword'));
		$mail = $this->input->post('id_categoria');
		$pswd = $this->input->post('id_servicio');

        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('menuUsuario');

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