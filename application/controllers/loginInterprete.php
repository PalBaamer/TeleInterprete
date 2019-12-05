<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginInterprete extends CI_Controller {

	public function index(){
		$this->load->view('estilo');
		$this->load->view('loginInterprete');
		
	}

	public function validarInterprete(){
		$this->load->helper('cookie');
		$this->load->helper('array');
		$this->load->helper('url');
		
		
		$mail = $this->input->post('inputEmail');
		$pswd = $this->input->post('inputPassword');




		if($mail == null || $pswd==null){
			$this->load->library('javascript');
			$this->load->view('estilo');
			$this->load->view('loginInterprete');
			$this->load->view('campoNull');


		}else{
		$this->load->model('interprete_modelo');
		$interprete = array();
		$interprete = $this->interprete_modelo->interprete_login($mail, $pswd);
		$datos['interpreteUsuario'] = $interprete;


		if($interprete ==null){
			$this->load->view('estilo');
			$this->load->view('loginInterprete');
			$this->load->view('errorLogin');

			
		}else{
			
			$cookie = array(
				'name'   => 'datosSesion',
				'value'  =>serialize($interprete),                            
				'expire' => '12000',                                                                                   
				'secure' => TRUE
				);
				$this->input->set_cookie($cookie);
				//var_dump($_COOKIE['datosSesion']);die;
			if($interprete->categoria==0){
				
				$this->load->model('empresa_modelo');
				$this->load->model('usuario_modelo');
				$listaEmpresas = $this->empresa_modelo->mostrar_empresasDisponibles();
				$listaInterpretes = $this->interprete_modelo->listar_interpretes();
				$listaUsuarios = $this->usuario_modelo->listar_usuarios();
				if($listaEmpresas==null ){
					$listaEmpresas="No hay empresas";
				
					if($listaInterpretes==null){
						$listaInterpretes="No hay interpretes";
				
						if($listaUsuarios==null){
							$listaUsuarios="No hay usuarios";
						}
					}
				}

				
					$datos['empresa']=$listaEmpresas;
					$datos['interprete']=$listaInterpretes;
					$datos['usuario']=$listaUsuarios;
					$tipo['tipoUsuario']=0;

				//var_dump($datos['empresa']);die;
				$this->load->helper('cookie');
				$this->load->view('estilo');
				$this->load->view('cabecera', $tipo);
				$this->load->view('menuAdmin',$datos);
				$this->load->helper('array');
				$this->load->helper('url');
				

			}else{	
				$this->load->model('interprete_modelo');
				$id=$interprete->id_interprete;
				$historial= $this->interprete_modelo->hitorialCitas($id);
				$datos['historial']=$historial;

				$this->load->view('estilo');
				$this->load->view('cabecera');
				$this->load->view('menuInterprete',$datos);
				$this->load->helper('array');
				$this->load->helper('url');

			}

		}
		}
	}
}
?>