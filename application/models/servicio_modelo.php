<?php
class Servicio_modelo extends CI_Model {
    function __construct(){
   parent::__construct();
   $this->load->database();
    }

    function listar_servicio(){
        $data = $this->db->query('select * from servicio');
       if ($data->num_rows() > 0){
     
        return $data->result_array();
       }
       return null;
     }
}
?>