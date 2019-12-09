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

    public function altaServicio(){
            $id_empresa=$this->input->get('id_empresa');
            $this->load->model('categoria_modelo');
            $listaCategorias= $this->categoria_modelo->listar_categoria();

            $datos['id_empresa']=$id_empresa;
            $datos['listaCategorias']=$listaCategorias;
        $datos= $this->obtenerDatos();
        $this->load->view('cabecera', $datos);  
        $this->load->view('altaServicios', $datos);
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
        $this->load->model('empresa_modelo');

         $datos= $this->obtenerDatos();
        $id =$this->input->post('inputId_empresa');
        $fecha_inicio =$this->input->post('fecha_inicio');
        $fecha_fin =$this->input->post('fecha_fin');
        $historialEmpresa = $this->empresa_modelo->filtrar_citas_empresa($id, $fecha_inicio, $fecha_fin);
        $datosEmpresa = $this->empresa_modelo->busca_empresa($id);
        $datos['empresa']=$datosEmpresa;
       
        $datos['historial']=$historialEmpresa;
        
        $this->load->view('cabecera',$datos);
        $this->load->view('generarFacturaEmpresa',$datos);
        $this->load->view('pie');
    }


    public function descargarFactura(){
        $this->load->model('empresa_modelo');
        $this->load->library('pdf');

        $datos= $this->obtenerDatos();
        $id =$this->input->post('inputId_empresa');
        $fecha_inicio =$this->input->post('fecha_inicio');
        $fecha_fin =$this->input->post('fecha_fin');
        //var_dump($this->input->post());die;
      //  var_dump($id, $fecha_inicio, $fecha_fin);die;
        $historialEmpresa = $this->empresa_modelo->filtrar_citas_empresa($id, $fecha_inicio, $fecha_fin);
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
    public function generar(){

		$data = [];

		$hoy = date("my");

        //load the view and saved it into $html variable
        
        // $html = $this->load->view('v_dpdf',$date,true);
        $html =$this->input->post('fecha_inicio');
        
        /*
        '<style>@page {
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
           <td>'.$datosEmpresa->nombre .'</td>
           <td>'. $datosEmpresa->cif .'</td>
           <td>'. $datosEmpresa->direccion .'</td>
           <td>'. $datosEmpresa->cp."  ".$datosEmpresa->provincia."  ".$datosEmpresa->ciudad .'</td>
        </tr>
        </table>
        
        
        <table class="table table-bordered" id="tablaVerEmpresa"  >
        
            <tr><h1>SERVICIOS REALIZADOS</h1></tr>
            <tr>
                    <th >Fecha</th>
                    <th >Hora de inicio</th>
                    <th >Servicio</th>
                    <th >Dirección</th>
                    <th >Total horas</th>
                  
            </tr>
            <tr>';
           
                      foreach($historialEmpresa as $nLinea => $valor){
                          $html .='<tr><td>'.$valor['dia'].'</td>
        
                                <td>'.$valor['hora_inicio'].'</td>
                                <td>'.$valor['centro'].'</td>
                                <td>'.$valor['especialidad'].'</td>
                                <td>'.$valor['total'].'</td></tr>';
        
                      }
                    $html .= '<th >IVA</th>
                    <td id="iva">21%</td>
            </tr>
            </table>

        </body>';*/

        // $html = $this->load->view('v_dpdf',$date,true);
 		
 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = $hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4-L'); 
 		$mpdf->WriteHTML($html);
		$mpdf->Output($pdfFilePath, "D");
       // //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
       //  //download it.
         $this->m_pdf->pdf->Output($pdfFilePath, "D"); 
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