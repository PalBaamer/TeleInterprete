<?php
class Interprete_modelo extends CI_Model {
function __construct(){
   parent::__construct();
   $this->load->database();
}


//mysql:host=localhost;dbname=teleinterprete
function existe_email($email){
      $data = $this->db->query("select * from interprete ");

   $this->db->select('email');
   $this->db->where('email', $email);
   $query = $this->db->get('interprete');
   if ($query->num_rows() > 0){
      return 1;
   }
   return 0;
}

function interprete_login($mail, $pswd){
    $data = $this->db->query('select * from interprete where email="'.$mail.'" and contrasena="'.$pswd .'"');
   if ($data->num_rows() > 0){

      return $data->row();
   }
   return null;
}

function inserta_usuario($datos = array()){
   if(!$this->_required(array("email","clave"), $datos)){
      return FALSE;
   }
   //clave, encripto
   $datos['clave']=md5($datos['clave']);

   $this->db->insert('usuario', $datos);
   return $this->db->insert_id();
}

function interpretes_disponibles($dia, $hora_inic){
   $data = $this->db->query('select * from interprete where not in(select id_interprete from servicios where dia="'.$dia.'" and hora_inicio="'.$hora_inic.'"');
   echo 'select * from interprete where not in(select id_interprete from servicios where dia="'.$dia.'" and hora_inicio="'.$hora_inic.'"';
   if ($data->num_rows() > 0){
     var_dump($data);
     die;
      return $data->result_array();
   }
   return null;
}
}
?>