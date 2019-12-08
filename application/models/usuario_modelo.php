<?php
class Usuario_modelo extends CI_Model {
function __construct(){
   parent::__construct();
   $this->load->database();
}


function listar_usuarios(){
   $data = $this->db->query('SELECT * FROM usuario where visible=1');
   if ($data->num_rows() > 0){
      return $data->result_array();
   }
   return null;

}

function usuario_login($mail, $pswd){
   $data = $this->db->query('select * from usuario where email="'.$mail.'" and contrasena="'.$pswd .'"');
  if ($data->num_rows() > 0){

      //return $data->result_array();
     return $data->row();
  }
  return null;
}

/*function inserta_usuario($datos = array()){
   if(!$this->_required(array("email_usuario","clave"), $datos)){
      return FALSE;
   }
   //clave, encripto
   $datos['clave']=md5($datos['clave']);

   $this->db->insert('usuario', $datos);
   return $this->db->insert_id();
}*/


function hitorialCitas($id){
   $data = $this->db->query('select distinct dia,hora_inicio,servicio.especialidad,servicio.centro,total from usuario,cita,servicio where cita.id_usuario ='.$id.' and cita.id_servicio= servicio.id_servicio');

   if($data->num_rows()>0){
      return $data->result_array();

   }else{

      return null;

   }
}

function busca_usuario($id){
   
             return $this->db->get_where('usuario', array('id_usuario' => $id))->row();
             
         }


function modificar_usuario($datos , $id){
  return $this->db->query('update usuario set nombre="'.$datos['nombre'].'",apellido="'.$datos['apellido'].'",apellido2="'.$datos['apellido2'].'",dni="'.$datos['dni'].'",direccion="'.$datos['direccion'].'",provincia="'.$datos['provincia'].'",
  telefono="'.$datos['telefono'].'",email="'.$datos['email'].'",urgencias="'.$datos['urgencias'].'",categoria="'.$datos['categoria'].'",nCC="'.$datos['nCC'].'" where id_interprete="'.$id.'"');
}

function insert_item ($data) {  

  return $this->db->insert( 'usuario' , $data );
     }


function borrar_usuario($id){
  return $this->db->query("update usuario set visible=0 where id_interprete=$id");
  
 //  return $this->db->delete('empresa', array('id_empresa' => $id));
}

}
?>