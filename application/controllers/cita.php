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

        $categoria = $this->input->post('categoria');
        $centro = $this->input->post('centro');
        $fecha = $this->input->post('fecha');
        $hora = $this->input->post('hora');
        $hora =$hora.":00:00";
        $id=2;
        var_dump($categoria." - ".$centro." - ".$hora." - ".$fecha);

        $listaInterpretes = array();
        $this->load->model('interprete_modelo');
        $listaInterpretes = $this->interprete_modelo->interpretes_disponibles($fecha , $hora);

        if($listaInterpretes==null){
            $arrayData = array(
				'error' => "No hay interpretes disponibles");
            $this->load->view('estilo');
            $this->load->view('cabecera');
            $this->load->view('menuUsuario', $arrayData);
            



        }else{
            $data['interpretesDispo']=$listaInterpretes;
            $this->load->view('estilo');
            $this->load->view('cabecera');
            $this->load->controllers->cita('insertCita', $data);
        }


        

    }

    public function insertCita(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('menuUsuario');
        $hora = $this->input->post('id_interprete');
        var_dump($hora);die;

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