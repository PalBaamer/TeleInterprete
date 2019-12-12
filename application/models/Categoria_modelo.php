<?php
class Categoria_modelo extends CI_Model {
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

     function listar_especialidad(){
      $data = $this->db->query('select id_servicio from servicio');
     if ($data->num_rows() > 0){
   
        return $data->result_array();
     }
     return null;
   }

   public function fillCiudades() {
      $idEstado = $this->input->post('idEstado');
      
      if($idEstado){
          $this->load->model('modelComboBoxes');
          $ciudades = $this->modelComboBoxes->getCiudades($idEstado);
          echo '<option value="0">Ciudades</option>';
          foreach($ciudades as $fila){
              echo '<option value="'. $fila->idCiudad .'">'. $fila->nombreCiudad .'</option>';
          }
      }  else {
          echo '<option value="0">Ciudades</option>';
      }
  }

  
}
?>
