<?php
class Empresa_modelo extends CI_Model {
function __construct(){
   parent::__construct();
   $this->load->database();
}

public function __construct() {
   parent::__construct();
}

public function get_all() {
   return $this->db->get($this->table)
                   ->result();
}

public function busquedaEmpresa($nombreEmpresa) {
   return $this->db->get_where($this->table, array('nombre' => $nombreEmpresa))
                   ->row();
}

public function get_where($where) {
   return $this->db->where($where)
                   ->get($this->table)
                   ->result();
}

public function insertar($data) {
   return $this->db->insert($this->table, $data);
}

public function modificar($id, $data) {
   $this->db->where('id_empresa', $id);
   $this->db->update($this->table, $data);
}

public function borrar($id) {
   $this->db->where('id_empresa', $id);
   $this->db->delete($this->table);
}


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
   

}

?>