<?php
class Cita_modelo extends CI_Model {
    function __construct(){
   parent::__construct();
   $this->load->database();
    }

    function listar_categoria(){
        $data = $this->db->query('select * from categoria');
       if ($data->num_rows() > 0){
     
          return $data->result_array();
       }
       return null;
     }

     function insert ($data) {  

      return $this->db->insert( 'cita' , $data );
         }

      
}
?>