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

     function borrar_servicioEmpresa($id_empresa){
      return $this->db->query("update servicio set visible=0 where id_empresa=$id_empresa");

     }
}
?>