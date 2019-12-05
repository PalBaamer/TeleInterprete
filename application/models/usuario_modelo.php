<?php
class Usuario_modelo extends CI_Model {
function __construct(){
   parent::__construct();
   $this->load->database();
}


function listar_usuarios(){
   $data = $this->db->query('SELECT * FROM usuario');
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

function busca_usuario($id)
         {
             return $this->db->get_where('usuario', array('id_usuario' => $id))->row();
             
         }


}
?>