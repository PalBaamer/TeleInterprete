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

/*
public function calcHora($id_cita){

   $this->db->sql(update cita set total = ((hora_fin  - hora_inicio)/10000)*15 where $id_cita);
}

public function generarFactura($id_empresa,$fecha_inicio, $fecha_fin){
   $this->db->sql(select SUM(total) from citas,servicio,empresa where cita.id_servicio = servicio.id_servicio, servicio.id_empresa = empresa.id_empresa, dia between $fecha_inicio and $fecha_fin);
   if(horas>0){

      return horas;
   }else{
      return "No hay servicios";
   }
   

}*/

?>