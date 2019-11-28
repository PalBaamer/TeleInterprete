<?php
class Empresa_modelo extends CI_Model {
      function __construct(){
         parent::__construct();
         $this->load->database();
      }


      //mysql:host=localhost;dbname=teleinterprete
      function mostrar_empresasDisponibles(){
            $data = $this->db->query("select * from empresa ");
            if ($data->num_rows() > 0){
         return $data->result_array();
      }
      return null;
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


      function insert_item ($data) {  

      return $this->db->insert( 'empresa' , $data );
         }

      function busca_empresa($id)
         {
             return $this->db->get_where('empresa', array('id_empresa' => $id))->row();
         }


         function borrar_empresa($id)
         {
             return $this->db->delete('empresa', array('id_empresa' => $id));
         }


}
?>