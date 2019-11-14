<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Llamada extends CI_Controller {

	public function index(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
	}
	public function contador(){
    }
}
?>