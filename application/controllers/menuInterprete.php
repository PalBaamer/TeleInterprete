<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuInterprete extends CI_Controller {

	public function index(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->view('menuInterprete');
		$this->load->helper('array');
		$this->load->helper('url');
	}
	public function acceso(){

	}
}
?>