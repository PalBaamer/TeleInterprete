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



     function usuario_tiene_cita($id, $dia, $hora){
      $data = $this->db->query("select id_usuario from cita where id_usuario=".$id." and dia='".$dia."' and hora_inicio='".$hora."'");
         if ($data->num_rows() > 0){
     
            return 1;
         }
         return 0;
     }



     function insert ($data) {  

      return $this->db->insert( 'cita' , $data );
         }


         
      function insertar_hora_fin($total, $id){
         $this->db->query('update cita set hora_fin="'.date('Y-m-d').'" where id_citas='.$id.'');
         $data = $this->db->query('update cita set total=total + "'.$total.'"  where id_citas='.$id.'');
         if ($data){
            return $data;
         }
         return null;


      }
      
}
?>
