<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuAdmin extends CI_Controller {

	public function index(){
        $datos= $this->obtenerDatos();
        $this->load->view('Cabecera', $datos);
        $this->load->view('MenuAdmin',$datos);
        $this->load->view('Pie');
}
    
 
//-------------Registro Interprete-----------
public function formularioInterprete(){
    
    $this->load->model('provincia_modelo');
    $dataProvincia = $this->provincia_modelo->listar_provincia();
    $datos['listaProvincia']=$dataProvincia;
    $datos['registroInterprete']=0;
    $this->load->view('CabeceraBasica');
    $this->load->view('AltaInterprete',$datos);
    $this->load->view('Pie');
}
//-------------Registro Usuario-----------
public function formularioUsuario(){
    $this->load->model('provincia_modelo');
    $dataProvincia = $this->provincia_modelo->listar_provincia();
    $datos['listaProvincia']=$dataProvincia;
    
$datos['registroUsuario']=0;
$this->load->view('CabeceraBasica');
$this->load->view('AltaUsuario',$datos);
$this->load->view('Pie');
}

//-------------INSERTAR EMPRESA-----------



	public function altaEmpresa(){
        $this->load->model('provincia_modelo');
        $dataProvincia = $this->provincia_modelo->listar_provincia();
        $datos= $this->obtenerDatos();
        $datos['listaProvincia']=$dataProvincia;
        $this->load->view('Cabecera', $datos);
        $this->load->view('AltaEmpresa',$datos);
        $this->load->view('Pie');
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
          
            $this->load->view('Cabecera', $datos);
            $this->load->view('MenuAdmin',$datos);
            $this->load->view('Pie');

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
            $this->load->view('Cabecera', $datos);
            $this->load->view('BuscarEmpresa',$datos);
            $this->load->view('Pie');
			
		}else{           
            
            $this->load->view('Cabecera', $datos);
            $this->load->view('MenuAdmin',$datos);
            $this->load->view('Pie');
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
        $this->load->view('Cabecera', $datos);  
        $this->load->view('MenuAdmin', $datos);
        $this->load->view('Pie');
    }

    public function altaServicios(){
            $id_empresa=$this->input->get('id_empresa');
            $this->load->model('categoria_modelo');
            $listaCategorias= $this->categoria_modelo->listar_categoria();

            $datos= $this->obtenerDatos();
            $datos['id_empresa']=$id_empresa;
            $datos['listaCategorias']=$listaCategorias;
      
        $this->load->view('Cabecera', $datos);  
        $this->load->view('AltaServicios', $datos);
        $this->load->view('Pie');

    }

    public function insertarServicio(){
        
$datos= $this->obtenerDatos();
        $this->load->model('empresa_modelo');
        $lista =array(
        'id_empresa' => $this->input->post('inputId_empresa'),
        'id_categoria' => $this->input->post('categoria'),
        'especialidad' => $this->input->post('inputEspecialidad'),
        'direccion'=> $this->input->post('inputDireccion')
    
    );
    
    $altaServicios= $this->empresa_modelo->insertar_servicios($lista);
    
    $this->load->view('Cabecera', $datos);  
    $this->load->view('MenuAdmin', $datos);
    $this->load->view('Pie');
        
    }


    public function eliminar_empresa(){
        

        $id=$this->input->get('id_empresa');
        $this->load->model('empresa_modelo');
        $listaEmpresa= $this->empresa_modelo->borrar_empresa($id);
        
        $this->load->model('servicio_modelo');
        $listaservicio= $this->servicio_modelo->borrar_servicioEmpresa($id);

        $datos= $this->obtenerDatos();
        if($listaEmpresa ==true){
                
            $this->load->view('Cabecera',$datos);
            $this->load->view('MenuAdmin',$datos);
            $this->load->view('Pie');
			
		}else{
            //false no se realiza la accion
        $this->load->view('Cabecera', $datos);
        $this->load->view('MenuAdmin', $datos);
        $this->load->view('Pie');
        }
    }


    public function descargarFactura(){
        $this->load->model('empresa_modelo');
        $this->load->library('PDF');

        $datos= $this->obtenerDatos();
        $id =$this->input->post('inputId_empresa');
        $fecha_inicio =$this->input->post('fecha_inicio');
        $fecha_fin =$this->input->post('fecha_fin');
        //var_dump($this->input->post());die;
      //  var_dump($id, $fecha_inicio, $fecha_fin);die;
        $historialEmpresa = $this->empresa_modelo->filtrar_citas_empresa($id, $fecha_inicio, $fecha_fin);
        if($historialEmpresa!=null){

        
        $datosEmpresa = $this->empresa_modelo->busca_empresa($id);
        $totalServicios=0;
        foreach($historialEmpresa as $nLinea =>$valor){
            $totalServicios = $valor['total'] + $totalServicios;

        }
        $totalServicios = $totalServicios * 35;
        $totalIVA = $totalServicios * 0.21;
        $totalFinal = $totalServicios + $totalIVA;

       /// $html =$this->load->view('generarFacturaEmpresa',false,false);
        $html = '<style>@page {
            margin-top: 0.5cm;
            margin-bottom: 0.5cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
        }
        </style>
    <body>
    <table >
    <tr>
        <td><img class="mb-4" src="'.base_url("img/Comunicados.png" ).'" alt="Icono de Inicio" width="72" height="72"></td>
        <td>Comunicados</td>
        <td>28698456T</td>
        <td>C\Antonio Nebrija,3</td>
        <td>28013 Madrid Madrid</td>
    </tr>
    <tr>
        <td></td>
       <td>'.$datosEmpresa->nombre .'</td>
       <td>'. $datosEmpresa->cif .'</td>
       <td>'. $datosEmpresa->direccion .'</td>
       <td>'. $datosEmpresa->cp."  ".$datosEmpresa->provincia."  ".$datosEmpresa->ciudad .'</td>
    </tr>';

    $html .= '<h1>SERVICIOS REALIZADOS</h1>';
       $html .= '<tr>
                <td >Fecha</td>
                <td >Hora de inicio</td>
                <td >Servicio</td>
                <td >Direccion</td>
                <td >Total horas</td>
              
        </tr>';
     
          //  var_dump($historialEmpresa);die;
                  foreach($historialEmpresa as $nLinea =>$valor){
                      $html .='<tr><td>'.$valor['dia'].'</td>
    
                            <td>'.$valor['hora_inicio'].'</td>
                            <td>'.$valor['centro'].'</td>
                            <td>'.$valor['especialidad'].'</td>
                            <td>'.$valor['total'].'</td></tr>';
    
                  }
                $html .= '<tr>
                            <td >Total sin IVA</td>
                            <td id="iva"></td>
                            <td id="iva">'.$totalServicios.' €</td>
                        </tr>
                        <tr>
                            <td >IVA</td>
                            <td id="iva">21%</td>
                            <td>'.$totalIVA.' €</td>
                        </tr>
                        <tr>
                            <td >Total</td>
                            <td id="iva"></td>
                            <td id="iva">'.$totalFinal.' €</td>
                        </tr>';

        $html .='</table>';
        $pdf= new pdf('P','cm','A4',true,'UTF-8',false);
        $pdf->SetTitle('pdf');
        $pdf->setHeaderMargin(15);
        $pdf->setHeaderMargin(20);
        $pdf->SetAuthor('PalomaBaameiro');

        $pdf->AddPage('L',false,false);
        //l = landscape P = portrait
       // $html="<h1>hola</h1>";
        $pdf->writeHTML($html);
        $pdf->Output('pdf.pdf','I');
        //I = enviar al navegador o F= guardar en el pc
    }
    $this->load->view('Cabecera', $datos);
    $this->load->view('NoFactura');
    $this->load->view('MenuAdmin',$datos);
    $this->load->view('Pie');

    }



//------------------------------------------------------- INTERPRETE
    public function altaInterprete(){
        
        $this->load->model('provincia_modelo');
        $dataProvincia = $this->provincia_modelo->listar_provincia();
        $datos= $this->obtenerDatos();
        $datos['registroInterprete']=1;
        $datos['listaProvincia']=$dataProvincia;
        $this->load->view('Cabecera', $datos);
        $this->load->view('AltaInterprete',$datos);
        $this->load->view('Pie');
    }

    public function insertarInterprete(){

        $lista= array (
            'nombre' =>$this->input->post('inputNombre'), 
            'apellido' =>$this->input->post('inputApellido'), 
            'apellido2' =>$this->input->post('inputApellido2'),
            'dni' =>$this->input->post('inputDni'), 
         'direccion' =>$this->input->post('inputDireccion'),
         'provincia' =>$this->input->post('inputProvincia'),
         'telefono' =>$this->input->post('inputTelefono'),
         'email' =>$this->input->post('inputEmail'),
         'contrasena'=> sha1($this->input->post('inputContrasena')),
         'urgencias' =>$this->input->post('inputUrgencias'),
         'categoria' =>$this->input->post('inputCategoria'),
         'nCC' =>$this->input->post('inputNCC')
        );
        $registroInterprete=$this->input->post('registroInterprete');
        $this->load->model('interprete_modelo');
        $listaInterpretes= $this->interprete_modelo->insert_item($lista);

        if($registroInterprete==1){
        
            $datos= $this->obtenerDatos();

            

            if($listaInterpretes!=null){
            
                $this->load->view('Cabecera', $datos);
                $this->load->view('MenuAdmin',$datos);
                $this->load->view('DatoOK');
                $this->load->view('Pie');

            }
        }else{
            
            $this->load->view('CabeceraBasica');
            $this->load->view('Inicio');
            $this->load->view('Pie');
        }
    }



    public function buscarInterprete(){
        $this->load->helper('cookie');
        $datos= $this->obtenerDatos();

        $sesionVariable=$this->input->get('sesionUsuario');
        if($sesionVariable!=null){

         $idInterprete=$this->input->get('id_interprete');
        } else{
        $idInterprete=$this->input->post('interprete');
        }

        $this->load->model('interprete_modelo');
        $this->load->model('provincia_modelo');
        $datosInterprete= $this->interprete_modelo->buscar_interprete($idInterprete);
        $dataProvincia = $this->provincia_modelo->listar_provincia();

        $datos['listaProvincia']=$dataProvincia;

        if($datosInterprete !=null){
            $datos['interprete']=$datosInterprete;
            $this->load->view('Cabecera', $datos);
            $this->load->view('BuscarInterprete',$datos);
            $this->load->view('Pie');
			
        }else
        {           
            
            $this->load->view('Cabecera', $datos);
            $this->load->view('MenuAdmin',$datos);
            $this->load->view('Pie');
        }
    }

    public function eliminar_interprete(){
        

        $id=$this->input->get('id_interprete');
        $this->load->model('interprete_modelo');
        $listaInterprete= $this->interprete_modelo->borrar_interprete($id);

        $datos= $this->obtenerDatos();
        if($listaInterprete ==true){
                
            $this->load->view('Cabecera',$datos);
            $this->load->view('MenuAdmin',$datos);
            $this->load->view('Pie');
			
		}else{
            //false no se realiza la accion
        $this->load->view('Cabecera', $datos);
        $this->load->view('MenuAdmin', $datos);
        $this->load->view('Pie');
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
        
        $this->load->view('Cabecera', $datos);  
        $this->load->view('MenuAdmin', $datos);
        $this->load->view('Pie');
    }





    public function generar_pago_interprete(){
        $sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
        $datos['sesionUsuario']=$sesionUsuario;
        $this->load->view('Cabecera', $datos);
        $this->load->view('Generar_factura');
        $this->load->view('Pie');
    }

//-----------------------------USUARIOS
    public function altaUsuario(){
        $this->load->model('provincia_modelo');
        $dataProvincia = $this->provincia_modelo->listar_provincia();
        $datos= $this->obtenerDatos();
        $datos['registroUsuario']=1;
        $datos['listaProvincia']=$dataProvincia;
        $this->load->view('Cabecera', $datos);
        $this->load->view('AltaUsuario',$datos);
        $this->load->view('Pie');
    }

    public function insertarUsuario(){

        $lista= array (
            'nombre' =>$this->input->post('inputNombre'), 
            'apellido' =>$this->input->post('inputApellido'), 
            'apellido2' =>$this->input->post('inputApellido2'),
            'dni' =>$this->input->post('inputDni'), 
         'direccion' =>$this->input->post('inputDireccion'),
         'provincia' =>$this->input->post('inputProvincia'),
         'telefono' =>$this->input->post('inputTelefono'),
         'email' =>$this->input->post('inputEmail'),
         'contrasena'=>sha1($this->input->post('inputContrasena'))
        );
        $registroUsuario=$this->input->post('registroUsuario');
        
        if($registroUsuario==1){

        
         $this->load->model('usuario_modelo');
         $listaUsuario= $this->usuario_modelo->insert_item($lista);
         

         $datos= $this->obtenerDatos();
        if($listaUsuario!=null){
          
            $this->load->view('Cabecera', $datos);
            $this->load->view('MenuAdmin',$datos);
            $this->load->view('Pie');

        }
    }else{
        
        $this->load->model('usuario_modelo');
        $listaUsuario= $this->usuario_modelo->insert_item($lista);
            $this->load->view('CabeceraBasica');
            $this->load->view('Inicio');
            $this->load->view('Pie');
    }
    } 

    
    public function buscarUsuario(){
        $this->load->helper('cookie');
        $datos= $this->obtenerDatos();
        $sesionVariable=$this->input->get('sesionUsuario');
           if($sesionVariable!=null){

            $idUsuario=$this->input->get('id_usuario');
           } else{
        $idUsuario=$this->input->post('usuario');
           }
        $this->load->model('usuario_modelo');
        $this->load->model('provincia_modelo');
        $datosUsuario= $this->usuario_modelo->buscar_usuario($idUsuario);
        $dataProvincia = $this->provincia_modelo->listar_provincia();

        $datos['listaProvincia']=$dataProvincia;


        if($datosUsuario !=null){
            $datos['usuario']=$datosUsuario;
            $this->load->view('Cabecera', $datos);
            $this->load->view('BuscarUsuario',$datos);
            $this->load->view('Pie');
			
		}else{           
            
            $this->load->view('Cabecera', $datos);
            $this->load->view('MenuAdmin',$datos);
            $this->load->view('Pie');
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
        $this->load->view('Cabecera', $datos);  
        $this->load->view('MenuAdmin', $datos);
        $this->load->view('Pie');
    }





    public function eliminar_usuario(){
       
        $id=$this->input->get('id_usuario');
        $this->load->model('usuario_modelo');
        $listaUsuario= $this->usuario_modelo->borrar_usuario($id);

        $datos= $this->obtenerDatos();
        if($listaUsuario ==true){
                
            $this->load->view('Cabecera',$datos);
            $this->load->view('MenuAdmin',$datos);
            $this->load->view('Pie');
			
		}else{
            //false no se realiza la accion
        $this->load->view('Cabecera', $datos);
        $this->load->view('MenuAdmin', $datos);
        $this->load->view('Pie');
    }
}
//-----------------------OBTENER LOS DATOS QUE SIEMPRE SE VAN A PEDIR UNA VEZ VOLVAMOS A LA PANTALLA DE MenuADMIN
    private function obtenerDatos(){
        $this->load->helper('cookie');
        $sesionUsuario = unserialize($this->input->cookie('datosSesion', true));
        $datos['id']=$sesionUsuario->id_interprete;
        if(!isset($sesionUsuario->categoria)){
            $datos['sesionUsuario']=-1;

        }else{
      
            $datos['sesionUsuario']=$sesionUsuario->categoria;
        }
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
