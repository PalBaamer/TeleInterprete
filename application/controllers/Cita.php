<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cita extends CI_Controller {

	public function index(){
        $datos['sesionUsuario']=-1;
        $this->load->view('Cabecera', $datos);
        $this->load->view('Pidecita');
        $this->load->view('Pie');
    }
    
    public function categoria(){
        $this->load->model('categoria_modelo');
        $listaCategorias= $this->categoria_modelo->listar_categoria();
        $datos['listaCategorias'] = $listaCategorias;
    }
    public function especialidad(){
        $this->load->model('categoria_modelo');
        $listaCategorias= $this->categoria_modelo->listar_categoria();
        $datos['listaCategorias'] = $listaCategorias;
    }


	public function pideCita(){
        $this->load->model('servicio_modelo');

        $listaServicios= $this->servicio_modelo->listar_servicio();

        $datos['listaServicios'] = $listaServicios;

		$this->load->model('categoria_modelo');
        $listaCategorias= $this->categoria_modelo->listar_categoria();
        $datos['listaCategorias'] = $listaCategorias;
        $datos['sesionUsuario']=-1;
        $id_usuario=$this->input->get('id_usuario');
        $datos['id_usuario']=$id_usuario;
        $datos['id']=$id_usuario;

        $this->load->view('Cabecera', $datos);
        $this->load->view('PedirCita' , $datos);
        
        $this->load->view('Pie');        
    }

    /* 
    --------
    */

    public function grabarCita(){
        $this->load->helper('cookie');
        $this->load->model('interprete_modelo');
        $this->load->model('cita_modelo');
        $this->load->model('servicio_modelo');
		$this->load->model('categoria_modelo');

        $listaServicios= $this->servicio_modelo->listar_servicio();

        $datos['listaServicios'] = $listaServicios;

        $listaCategorias= $this->categoria_modelo->listar_categoria();
        $datos['listaCategorias'] = $listaCategorias;

        
        $sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
        $datos['usuario']=$sesionUsuario;
        
        $datos['sesionUsuario']=-1;

        $id_usuario=$sesionUsuario->id_usuario;
        $categoria = $this->input->post('categoria');
        $id_servicio = $this->input->post('centro');
        $dia = $this->input->post('fecha');
        $hora = $this->input->post('hora');
        $hora =$hora.":00:00";

        if($dia < date('Y-m-d')){

            $this->load->view('Cabecera', $datos);
            $this->load->view('SeleccionFechaValida');
            $this->load->view('PedirCita', $datos);
            $this->load->view('Pie');   



        }else{

            $existeCita= $this->cita_modelo->usuario_tiene_cita($id_usuario,$dia, $hora);
            if($existeCita==1){
                
                $this->load->view('Cabecera', $datos);
                $this->load->view('CitaYaexiste');
                $this->load->view('PedirCita' , $datos);
                $this->load->view('Pie');   

            }else{
                $listaInterpretes = $this->interprete_modelo->interpretes_disponibles($dia , $hora);
        
        
                if($listaInterpretes==null){
                        
                    $this->load->view('Cabecera', $datos);
                    $this->load->view('SinInterprete');
                    $this->load->view('MenuUsuario', $datos);
                    $this->load->view('Pie');


                }else{
                    
                    $datos['interpretesDispo']=$listaInterpretes;

                    $datosCita= array (
                        'id_usuario' =>$id_usuario, 
                        'id_interprete' =>0,
                        'id_servicio' =>$this->input->post('centro'),
                        'dia' =>$dia,
                        'hora_inicio' =>$hora,
                        'hora_fin' =>null,
                        'total' =>0);
                        

                    $cookie = array(
                        'name'   => 'datosCita',
                        'value'  => serialize($datosCita),                            
                        'expire' => '12000',                                                                                   
                        'secure' => FALSE
                        );
                        $this->input->set_cookie($cookie);
                        $datos['sesionUsuario']=-1;
                        $this->load->view('Cabecera', $datos);
                        $this->load->view('GrabarCita',$datos);
                        $this->load->view('Pie');
                    

                }
            }
  

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
        $this->load->model('usuario_modelo');
        $id=$sesionUsuario->id_usuario;
        $historial= $this->usuario_modelo->hitorialCitas($id);
        $datos['usuario']=$sesionUsuario;
        $datos['historial']=$historial;
        
        $datos['sesionUsuario']=-1;

        $this->load->view('Cabecera', $datos);
        $this->load->view('MenuUsuario',$sesionUsuario);
        $this->load->view('DatoOK');
        
        $this->load->view('Pie');
        
        $cookie = array(
            'name'   => 'datosSesion',
            'value'  => serialize($sesionUsuario),                            
            'expire' => '12000',                                                                                   
            'secure' => FALSE
            );
            $this->input->set_cookie($cookie);

    }

}
?>
