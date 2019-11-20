<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuAdmin extends CI_Controller {

	public function index(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('pidecita');
	}
	public function alta_empresa(){
        $listaEmpresas = array();
		$this->load->model('empresa_modelo');
        $listaEmpresas= $this->empresa_modelo->mostrarEmpresasDisponibles();
        $datos['listaEmpresas'] = $listaEmpresas;
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('alta_empresa' , $datos);
    }
    public function editar_empresa(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('editar_empresa');
    }
    public function eliminar_empresa(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('eliminar_empresa');
    }
    public function generar_factura(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('generar_factura');
    }
    

    public function alta_interprete(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('generar_factura');
    }
    public function eliminar_interpre(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('generar_factura');
    }
    public function editar_interprete(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('generar_factura');
    }
    public function generar_pago_interprete(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('generar_factura');
    }

    
    public function editar_usuario(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('generar_factura');
    }
    public function eliminar_usuario(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('generar_factura');
    }
}
?>