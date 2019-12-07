<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuAdmin extends CI_Controller {

	public function index(){
        
        $this->load->view('cabecera');
		$this->load->helper('array');
        $this->load->helper('url');
        $this->load->view('menuAdmin');
        $this->load->view('pie');
    }
    
    
	public function alta_empresa(){
        $this->load->view('cabecera');
		$this->load->helper('array');
		$this->load->helper('url');
        $this->load->view('altaEmpresa');
        $this->load->view('pie');
    }
        public function insertarEmpresa(){

        $datos= array (
            'cif' =>$this->input->post('inputCif'), 
         'nombre' =>$this->input->post('inputNombre'),
         'direccion' =>$this->input->post('inputDireccion'),
         'cp' =>$this->input->post('inputCP'),
         'provincia' =>$this->input->post('inputProvincia'),
         'ciudad' =>$this->input->post('inputCiudad'),
         'personal_contacto' =>$this->input->post('inputPersonal_contacto'),
         'telefono_contacto' =>$this->input->post('inputTelefono_contacto'));

         $this->load->model('empresa_modelo');
         $listaEmpresas= $this->empresa_modelo->insert_item($datos);
         

        if($listaEmpresas!=null){
            $this->load->view('estilo');
            $this->load->view('cabecera');
            $this->load->view('menuAdmin');
            $this->load->view('pie');
            return "se ha guardado satisfactoriamente";

        }else{
            return "fallo";

        }
    }

    public function todasEmpresas(){
        $listaTodas = array();
        $this->load->model('empresa_modelo');
        $listaTodas= $this->empresa_modelo->mostrar_empresasDisponibles();
        $datos['listaEmpresas'] = $listaTodas;

        $this->load->view('estilo');
        $this->load->view('cabecera');
        $this->load->view('menuAdmin', $datos);
        $this->load->view('pie');
    
}

    public function buscarEmpresa(){
        $idEmpresa=$this->input->post('empresa');
       
        $this->load->model('empresa_modelo');
        $this->load->model('provincia_modelo');
        $datosEmpresa= $this->empresa_modelo->busca_empresa($idEmpresa);
        $dataProvincia = $this->provincia_modelo->listar_provincia($idEmpresa);

        if($datosEmpresa ==null){
			$errorArray = array(
				'error' => "La empresa no existe");
            $this->load->view('menuAdmin');
            $this->load->view('pie');
			
		}else{
            $sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
            $datos['empresa']=$datosEmpresa;
            $datos['listaProvincia']=$dataProvincia;


            //var_dump($datos);die;
            //$datos['interprete']=$sesionUsuario;
            
            $this->load->view('estilo');
            $this->load->view('cabecera');
            $this->load->view('buscarEmpresa', $datos);
            $this->load->helper('array');
            $this->load->helper('url');
            $this->load->view('pie');
        }
    }


    public function editarEmpresa(){
        $datos= array (
            'cif' =>$this->input->post('inputCif'), 
         'direccion' =>$this->input->post('inputDireccion'),
         'cp' =>$this->input->post('inputCP'),
         'ciudad' =>$this->input->post('inputCiudad'),
         'provincia' =>$this->input->post('inputProvincia'),
         'personal_contacto' =>$this->input->post('inputPersonal_contacto'),
         'telefono_contacto' =>$this->input->post('inputTelefono_contacto'));

            $id =$this->input->post('inputId_empresa');
            
        $this->load->model('empresa_modelo');
        $listaEmpresa= $this->empresa_modelo->modificar_empresa($datos , $id);

        $this->load->view('estilo');
        $this->load->view('cabecera');
        $this->load->view('menuAdmin');
        $this->load->view('pie');
    }



    public function eliminar_empresa(){
        $this->load->view('estilo');
        $this->load->view('cabecera');
		$this->load->helper('array');
		$this->load->helper('url');
        $this->load->view('menuAdmin');
        $this->load->view('pie');


        $datos= array ( 'id_empresa'=>$this->input->post('inputID'));
        $this->load->model('empresa_modelo');
        $listaEmpresa= $this->empresa_modelo->borrar_empresa($datos['id_empresa']);

        if($listaEmpresa ==null){
			$arrayData = array(
				'error' => "La empresa no existe");
            $this->load->view('menuAdmin');
            $this->load->view('pie');
			
		}else{
            
            $this->load->view('estilo');
            $this->load->view('cabecera');
            $this->load->view('verEmpresa');
            $this->load->helper('array');
            $this->load->helper('url');
            $this->load->view('pie');

            echo "Ha sido borrada con exito";
        }



    }
    public function generar_factura(){

        
        $this->load->view('cabecera');
        $this->load->view('generar_factura');
        $this->load->view('pie');
    }

    

    public function alta_interprete(){
        $this->load->view('cabecera');
        $this->load->view('generar_factura');
        $this->load->view('pie');
    }
    public function eliminar_interpre(){
        
        $this->load->view('cabecera');
        $this->load->view('generar_factura');
        $this->load->view('pie');
    }
    public function editar_interprete(){
        $this->load->view('cabecera');
        $this->load->view('generar_factura');
        $this->load->view('pie');
    }
    public function generar_pago_interprete(){

        $this->load->view('cabecera');
        $this->load->view('generar_factura');
        $this->load->view('pie');
    }

    
    public function editar_usuario(){
        $this->load->view('cabecera');
        $this->load->view('generar_factura');
        $this->load->view('pie');
    }
    public function eliminar_usuario(){
        $this->load->view('cabecera');
        $this->load->view('generar_factura');
        $this->load->view('pie');
    }
}
?>