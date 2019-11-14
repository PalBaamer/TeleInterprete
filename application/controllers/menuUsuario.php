<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuUsuario extends CI_Controller {

	public function index(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('menuUsuario');
		$this->load->helper('array');
		$this->load->helper('url');
	}
	public function acceso(){

	}
}
?>