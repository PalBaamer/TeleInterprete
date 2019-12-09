<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuAdmin extends CI_Controller {

	public function index(){
        $datos= $this->obtenerDatos();
        $this->load->view('cabecera', $datos);
        $this->load->view('menuAdmin',$datos);
        $this->load->view('pie');
}
    
    
//-------------INSERTAR EMPRESA-----------


	public function alta_empresa(){
        $this->load->model('provincia_modelo');
        $dataProvincia = $this->provincia_modelo->listar_provincia();
        $datos= $this->obtenerDatos();
        $datos['listaProvincia']=$dataProvincia;
        $this->load->view('cabecera', $datos);
        $this->load->view('altaEmpresa',$datos);
        $this->load->view('pie');
    }

        public function insertarEmpresa(){
            $datos= $this->obtenerDatos();
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
         

         $datos= $this->obtenerDatos();
        if($listaEmpresas!=null){
          
            $this->load->view('cabecera', $datos);
            $this->load->view('menuAdmin',$datos);
            $this->load->view('pie');

        }
    }
//-------------------------BUSCAR EMPRESA Y ABRE TODAS LAS OPCIONES
    public function buscarEmpresa(){
        $this->load->helper('cookie');
        $datos= $this->obtenerDatos();

        $idEmpresa=$this->input->post('empresa');
       
        $this->load->model('empresa_modelo');
        $this->load->model('provincia_modelo');
        $datosEmpresa= $this->empresa_modelo->busca_empresa($idEmpresa);
        $historialEmpresa= $this->empresa_modelo->historial_citas_empresa($idEmpresa);
        $dataProvincia = $this->provincia_modelo->listar_provincia();

        $datos['listaProvincia']=$dataProvincia;
        $datos['historial']=$historialEmpresa;


        if($datosEmpresa !=null){
            $datos['empresa']=$datosEmpresa;
            $this->load->view('cabecera', $datos);
            $this->load->view('buscarEmpresa',$datos);
            $this->load->view('pie');
			
		}else{           
            
            $this->load->view('cabecera', $datos);
            $this->load->view('menuAdmin',$datos);
            $this->load->view('pie');
        }
    }


    public function editarEmpresa(){
        
       
        $this->load->helper('cookie');
        $lista= array (
            'cif' =>$this->input->post('inputCif'), 
         'direccion' =>$this->input->post('inputDireccion'),
         'cp' =>$this->input->post('inputCP'),
         'ciudad' =>$this->input->post('inputCiudad'),
         'provincia' =>$this->input->post('inputProvincia'),
         'personal_contacto' =>$this->input->post('inputPersonal_contacto'),
         'telefono_contacto' =>$this->input->post('inputTelefono_contacto'));

            $id =$this->input->post('inputId_empresa');
            
        $this->load->model('empresa_modelo');
        $listaEmpresa= $this->empresa_modelo->modificar_empresa($lista , $id);
        $datos= $this->obtenerDatos();
        $this->load->view('cabecera', $datos);  
        $this->load->view('menuAdmin', $datos);
        $this->load->view('pie');
    }



    public function eliminar_empresa(){
        

        $id=$this->input->get('id_empresa');
        $this->load->model('empresa_modelo');
        $listaEmpresa= $this->empresa_modelo->borrar_empresa($id);
        
        $this->load->model('servicio_modelo');
        $listaservicio= $this->servicio_modelo->borrar_servicioEmpresa($id);

        $datos= $this->obtenerDatos();
        if($listaEmpresa ==true){
                
            $this->load->view('cabecera',$datos);
            $this->load->view('menuAdmin',$datos);
            $this->load->view('pie');
			
		}else{
            //false no se realiza la accion
        $this->load->view('cabecera', $datos);
        $this->load->view('menuAdmin', $datos);
        $this->load->view('pie');
        }
    }


   


    public function generarFactura(){
        $this->load->helper('pdf_helper');


         $datos= $this->obtenerDatos();
        $id =$this->input->post('inputId_empresa');
        $fecha_inicio =$this->input->post('fecha_inicio');
        $fecha_fin =$this->input->post('fecha_fin');
        $this->load->model('empresa_modelo');
        $historialEmpresa = $this->empresa_modelo->filtrar_citas_empresa($id, $fecha_inicio, $fecha_fin);
        $datosEmpresa = $this->empresa_modelo->busca_empresa($id);
        $datos['empresa']=$datosEmpresa;
       
        $datos['historial']=$historialEmpresa;
        
        $this->load->view('cabecera',$datos);
        $this->load->view('generarFactura',$datos);
        $this->load->view('pie');
    }




//------------------------------------------------------- INTERPRETE
    public function altaInterprete(){
        
        $this->load->model('provincia_modelo');
        $dataProvincia = $this->provincia_modelo->listar_provincia();
        $datos= $this->obtenerDatos();
        $datos['listaProvincia']=$dataProvincia;
        $this->load->view('cabecera', $datos);
        $this->load->view('altaInterprete',$datos);
        $this->load->view('pie');
    }

    public function insertarInterprete(){

        $datos= $this->obtenerDatos();
        $lista= array (
            'nombre' =>$this->input->post('inputNombre'), 
            'apellido' =>$this->input->post('inputApellido'), 
            'apellido2' =>$this->input->post('inputApellido2'),
            'dni' =>$this->input->post('inputDni'), 
         'direccion' =>$this->input->post('inputDireccion'),
         'provincia' =>$this->input->post('inputProvincia'),
         'telefono' =>$this->input->post('inputTelefono'),
         'email' =>$this->input->post('inputEmail'),
         'contrasena'=>$this->input->post('inputContrasena'),
         'urgencias' =>$this->input->post('inputUrgencias'),
         'categoria' =>$this->input->post('inputCategoria'),
         'nCC' =>$this->input->post('inputNCC')
        );

         $this->load->model('interprete_modelo');
         $listaEmpresas= $this->interprete_modelo->insert_item($lista);
         

         $datos= $this->obtenerDatos();
        if($listaEmpresas!=null){
          
            $this->load->view('cabecera', $datos);
            $this->load->view('menuAdmin',$datos);
            $this->load->view('pie');

        }
    }



    public function buscarInterprete(){
        $this->load->helper('cookie');
        $datos= $this->obtenerDatos();

        $idInterprete=$this->input->post('interprete');
       
        $this->load->model('interprete_modelo');
        $this->load->model('provincia_modelo');
        $datosInterprete= $this->interprete_modelo->buscar_interprete($idInterprete);
        $dataProvincia = $this->provincia_modelo->listar_provincia();

        $datos['listaProvincia']=$dataProvincia;


        if($datosInterprete !=null){
            $datos['interprete']=$datosInterprete;
            $this->load->view('cabecera', $datos);
            $this->load->view('buscarInterprete',$datos);
            $this->load->view('pie');
			
		}else{           
            
            $this->load->view('cabecera', $datos);
            $this->load->view('menuAdmin',$datos);
            $this->load->view('pie');
        }
    }

    public function eliminar_interprete(){
        

        $id=$this->input->get('id_interprete');
        $this->load->model('interprete_modelo');
        $listaInterprete= $this->interprete_modelo->borrar_interprete($id);

        $datos= $this->obtenerDatos();
        if($listaInterprete ==true){
                
            $this->load->view('cabecera',$datos);
            $this->load->view('menuAdmin',$datos);
            $this->load->view('pie');
			
		}else{
            //false no se realiza la accion
        $this->load->view('cabecera', $datos);
        $this->load->view('menuAdmin', $datos);
        $this->load->view('pie');
        }
    }

    public function modificarInterprete(){
        
        $this->load->helper('cookie');
        $lista= array (
            'nombre' =>$this->input->post('inputNombre'), 
            'apellido' =>$this->input->post('inputApellido'), 
            'apellido2' =>$this->input->post('inputApellido2'),
            'dni' =>$this->input->post('inputDni'), 
         'direccion' =>$this->input->post('inputDireccion'),
         'provincia' =>$this->input->post('inputProvincia'),
         'telefono' =>$this->input->post('inputTelefono'),
         'email' =>$this->input->post('inputEmail'),
         'urgencias' =>$this->input->post('inputUrgencias'),
         'categoria' =>$this->input->post('inputCategoria'),
         'nCC' =>$this->input->post('inputNCC')
        );

            $id =$this->input->post('inputId_interprete');
            
        $this->load->model('interprete_modelo');
        $listaInterprete= $this->interprete_modelo->modificar_interprete($lista , $id);
        $datos= $this->obtenerDatos();
        $this->load->view('cabecera', $datos);  
        $this->load->view('menuAdmin', $datos);
        $this->load->view('pie');
    }





    public function generar_pago_interprete(){
        $sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
        $datos['sesionUsuario']=$sesionUsuario;
        $this->load->view('cabecera', $datos);
        $this->load->view('generar_factura');
        $this->load->view('pie');
    }

//-----------------------------USUARIOS
    public function altaUsuario(){
        $this->load->model('provincia_modelo');
        $dataProvincia = $this->provincia_modelo->listar_provincia();
        $datos= $this->obtenerDatos();

        $datos['listaProvincia']=$dataProvincia;
        $this->load->view('cabecera', $datos);
        $this->load->view('altaUsuario',$datos);
        $this->load->view('pie');
    }

    public function insertarUsuario(){

        $datos= $this->obtenerDatos();
        $lista= array (
            'nombre' =>$this->input->post('inputNombre'), 
            'apellido' =>$this->input->post('inputApellido'), 
            'apellido2' =>$this->input->post('inputApellido2'),
            'dni' =>$this->input->post('inputDni'), 
         'direccion' =>$this->input->post('inputDireccion'),
         'provincia' =>$this->input->post('inputProvincia'),
         'telefono' =>$this->input->post('inputTelefono'),
         'email' =>$this->input->post('inputEmail'),
         'contrasena'=>$this->input->post('inputContrasena')
        );

         $this->load->model('usuario_modelo');
         $listaUsuario= $this->usuario_modelo->insert_item($lista);
         

         $datos= $this->obtenerDatos();
        if($listaUsuario!=null){
          
            $this->load->view('cabecera', $datos);
            $this->load->view('menuAdmin',$datos);
            $this->load->view('pie');

        }
    } 

    
    public function buscarUsuario(){
        $this->load->helper('cookie');
        $datos= $this->obtenerDatos();

        $idInterprete=$this->input->post('usuario');
       
        $this->load->model('usuario_modelo');
        $this->load->model('provincia_modelo');
        $datosUsuario= $this->usuario_modelo->buscar_usuario($idInterprete);
        $dataProvincia = $this->provincia_modelo->listar_provincia();

        $datos['listaProvincia']=$dataProvincia;


        if($datosUsuario !=null){
            $datos['usuario']=$datosUsuario;
            $this->load->view('cabecera', $datos);
            $this->load->view('buscarUsuario',$datos);
            $this->load->view('pie');
			
		}else{           
            
            $this->load->view('cabecera', $datos);
            $this->load->view('menuAdmin',$datos);
            $this->load->view('pie');
        }
    }


    public function modificarUsuario(){
        $this->load->helper('cookie');
        $lista= array (
            'nombre' =>$this->input->post('inputNombre'), 
            'apellido' =>$this->input->post('inputApellido'), 
            'apellido2' =>$this->input->post('inputApellido2'),
            'dni' =>$this->input->post('inputDni'), 
         'direccion' =>$this->input->post('inputDireccion'),
         'provincia' =>$this->input->post('inputProvincia'),
         'telefono' =>$this->input->post('inputTelefono'),
         'email' =>$this->input->post('inputEmail')
        );

            $id =$this->input->post('inputId_usuario');
            
        $this->load->model('usuario_modelo');
        $listaUsuario= $this->usuario_modelo->modificar_usuario($lista , $id);
        $datos= $this->obtenerDatos();
        $this->load->view('cabecera', $datos);  
        $this->load->view('menuAdmin', $datos);
        $this->load->view('pie');
    }





    public function eliminar_usuario(){
       
        $id=$this->input->get('id_usuario');
        $this->load->model('usuario_modelo');
        $listaUsuario= $this->usuario_modelo->borrar_usuario($id);

        $datos= $this->obtenerDatos();
        if($listaUsuario ==true){
                
            $this->load->view('cabecera',$datos);
            $this->load->view('menuAdmin',$datos);
            $this->load->view('pie');
			
		}else{
            //false no se realiza la accion
        $this->load->view('cabecera', $datos);
        $this->load->view('menuAdmin', $datos);
        $this->load->view('pie');
    }
}
//-----------------------OBTENER LOS DATOS QUE SIEMPRE SE VAN A PEDIR UNA VEZ VOLVAMOS A LA PANTALLA DE MENUADMIN
    private function obtenerDatos(){
        $this->load->helper('cookie');
        $sesionUsuario = unserialize($this->input->cookie('datosSesion', true));

        $datos['sesionUsuario']=$sesionUsuario->categoria;
        $datos['interpreteDatos']=$sesionUsuario;

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
    }
    $datos['empresa']=$listaEmpresas;
    $datos['interprete']=$listaInterpretes;
    $datos['usuario']=$listaUsuarios;
    
    return $datos;
}
    
}
?>