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

    /* 
    --------
    */

    public function grabarCita(){
        $this->load->helper('cookie');

        $categoria = $this->input->post('categoria');
        $id_servicio = $this->input->post('centro');
        $fecha = $this->input->post('fecha');
        $hora = $this->input->post('hora');
        $hora =$hora.":00:00";

        $datosCita= array (
        'id_usuario' =>0, 
         'id_interprete' =>0,
         'id_servicio' =>$this->input->post('centro'),
         'dia' =>$this->input->post('fecha'),
         'hora_inicio' =>$hora,
         'hora_fin' =>null,
         'total' =>0);

        $listaInterpretes = array();
        $this->load->model('interprete_modelo');
        $listaInterpretes = $this->interprete_modelo->interpretes_disponibles($fecha , $hora);
        
        $datos['listaInterpretes'] = $listaInterpretes;
        



        if($listaInterpretes==null){
            $arrayData = array(
				'error' => "No hay interpretes disponibles");
            $this->load->view('estilo');
            $this->load->view('cabecera');
            $this->load->view('menuUsuario', $arrayData);


        }else{
            $datos['interpretesDispo']=$listaInterpretes;
    

        
            $cookie = array(
                'name'   => 'datosCita',
                'value'  => serialize($datosCita),                            
                'expire' => '12000',                                                                                   
                'secure' => FALSE
                );
                $this->input->set_cookie($cookie);
              
                $this->load->view('estilo');
                $this->load->view('cabecera');
                $this->load->view('grabarCita',$datos);

               

        }


        

    }
    
    /*
    -----INSERTA EN CITA LA CITA CON SUS DATOS CORRESPONDIENTES-----
    
    */
    public function insertaCita(){
        $this->load->helper('cookie');

        
        $sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
        $datosCita = unserialize($this->input->cookie('datosCita', true));

        $id_usuario=$sesionUsuario->id_usuario;
        $datosCita['id_interprete']=$this->input->post('id_interprete');
        $datosCita['id_usuario']=$id_usuario;

        $this->load->model('cita_modelo');
        $listaInterpretes = $this->cita_modelo->insert($datosCita);

        $this->load->view('estilo');
        $this->load->view('cabecera');
        $this->load->view('menuUsuario',$sesionUsuario);
        
        $cookie = array(
            'name'   => 'datosSesion',
            'value'  => serialize($sesionUsuario),                            
            'expire' => '12000',                                                                                   
            'secure' => FALSE
            );
            $this->input->set_cookie($cookie);

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