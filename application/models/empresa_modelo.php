<?php
class Empresa_modelo extends CI_Model {
      function __construct(){
         parent::__construct();
         $this->load->database();
      }

      //mysql:host=localhost;dbname=teleinterprete
      function listar_empresas(){
            $data = $this->db->query("select * from empresa where visible=1");
            if ($data->num_rows() > 0){
         return $data->result_array();
      }
      return null;
      }

      function historial_citas_empresa(){
         $data = $this->db->query("select cita.dia,cita.hora_inicio,servicio.centro,servicio.especialidad,cita.hora_fin, cita.total from servicio,cita where servicio.id_servicio=cita.id_servicio and servicio.id_empresa=1 and  hora_fin is not null");
         if ($data->num_rows() > 0){
            return $data->result_array();
         }
         return null;
      }

      function filtrar_citas_empresa($id, $fecha_inicio, $fecha_fin){
         $data = $this->db->query("select cita.dia,cita.hora_inicio,servicio.centro,servicio.especialidad,cita.hora_fin, cita.total from servicio,cita where servicio.id_servicio=cita.id_servicio and servicio.id_empresa='".$id."' and  hora_fin is not null and cita.dia > '".$fecha_inicio."' and cita.dia < '".$fecha_fin."';
         ");
        if ($data->num_rows() > 0){
            return $data->result_array();
         }
         return null;
      }


      function insert_item ($data) {  

      return $this->db->insert( 'empresa' , $data );
         }

      function busca_empresa($id)
         {
             return $this->db->get_where('empresa', array('id_empresa' => $id))->row();
         }



      function modificar_empresa($data , $id){


        // var_dump($data);die;
          $this->db->query('update empresa set cif="'.$data['cif'].'" , direccion="'.$data['direccion'].'", cp="'.$data['cp'].'",
               provincia="'.$data['provincia'].'", ciudad="'.$data['ciudad'].'", personal_contacto="'.$data['personal_contacto'].'", telefono_contacto="'.$data['telefono_contacto'].'"  where  id_empresa="'.$id.'"');
               
               
                    }



         function borrar_empresa($id){
            return $this->db->query("update empresa set visible=0 where id_empresa=$id");
            
           //  return $this->db->delete('empresa', array('id_empresa' => $id));
         }

         function insertar_servicios($lista){
            return $this->db->query("insert into servicio (id_empresa, categoria, especialidad, centro) values(".$lista['id_empresa'].",".$lista['id_categoria'].",'".$lista['especialidad']."','".$lista['direccion']."')");
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
   
         function busca_empresa($id)
         {
             return $this->db->get_where('empresa', array('id_empresa' => $id))->row();
         }


         function borrar_empresa($id)
         {
             return $this->db->delete('empresa', array('id_empresa' => $id));
         }

}*/

?>