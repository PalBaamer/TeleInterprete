<?php
class Empresa_modelo extends CI_Model {
function __construct(){
   parent::__construct();
   $this->load->database();
}


//mysql:host=localhost;dbname=teleinterprete
function mostrarEmpresasDisponibles(){
      $data = $this->db->query("select id_empresa, nombre from empresa ");

   return $data->result_array();
}

function usuario_login($email){
   $this->db->where('email_usuario', $email);
   //$this->db->where('clave', md5($clave));
   $query = $this->db->get('usuario');
   if ($query->num_rows() > 0){
      return $query->row();
   }
   return 0;
}

function inserta_usuario($datos = array()){
   if(!$this->_required(array("email_usuario","clave"), $datos)){
      return FALSE;
   }
   //clave, encripto
   $datos['clave']=md5($datos['clave']);

   $this->db->insert('usuario', $datos);
   return $this->db->insert_id();
}
}
?>