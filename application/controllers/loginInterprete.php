<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginInterprete extends CI_Controller {

	public function index(){
		$this->load->view('LoginInterprete');
		
	}

	public function validarInterprete(){
		$this->load->helper('cookie');
		$this->load->helper('array');
		$this->load->helper('url');
		
		
		$mail = $this->input->post('inputEmail');
		$pswd = sha1($this->input->post('inputPassword'));




		if($mail == null || $pswd==null){
			$this->load->view('LoginInterprete');
			$this->load->view('campoNull');


		}else{
		$this->load->model('interprete_modelo');
		$interprete = array();
		$interprete = $this->interprete_modelo->interprete_login($mail, $pswd);


		if($interprete ==null){
			$this->load->view('LoginInterprete');
			$this->load->view('errorLogin');

			
		}else{
			
			$cookie = array(
				'name'   => 'datosSesion',
				'value'  =>serialize($interprete),                            
				'expire' => '12000',                                                                                   
				'secure' => FALSE
				);
				
				
				$this->input->set_cookie($cookie);
				$datos['sesionUsuario']=$interprete->categoria;
				$datos['interpreteDatos']=$interprete;

				//var_dump($_COOKIE['datosSesion']);die;
			if($interprete->categoria==0){
//-------CARGAMOS DESDE AQUÍ LAS LISTAS DE EMPRESAS-INTERPRETE Y USUARIOS PARA LA VISTA DEL ADMIN
					
		$this->load->model('empresa_modelo');
		$this->load->model('interprete_modelo');
		$this->load->model('usuario_modelo');
		$listaEmpresas= $this->empresa_modelo->listar_empresas();
		$listaInterpretes= $this->interprete_modelo->listar_interpretes();
		$listaUsuarios= $this->usuario_modelo->listar_usuarios();

		if($listaEmpresas==null ){
			$listaEmpresas="No hay empresas";
		
			if($listaInterpretes==null){
				$listaInterpretes="No hay interpretes";
		
				if($listaUsuarios==null){
					$listaUsuarios="No hay usuarios";
				}
			}
		}else{

				$datos['empresa']=$listaEmpresas;
				$datos['interprete']=$listaInterpretes;
				$datos['usuario']=$listaUsuarios;

				$this->load->helper('cookie');
				$this->load->view('Cabecera', $datos);
				$this->load->view('MenuAdmin',$datos);
				$this->load->view('Pie');
				

			}
		}else{	
				$this->load->model('interprete_modelo');
				$id=$interprete->id_interprete;
				$historial= $this->interprete_modelo->hitorialCitas($id);
				$datos['historial']=$historial;

				$this->load->view('Cabecera',$datos);
				$this->load->view('MenuInterprete',$datos);
				$this->load->view('Pie');

			}

			}
		}
	
	}
}
?>