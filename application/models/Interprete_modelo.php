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
/*
function inserta_usuario($datos = array()){
   if(!$this->_required(array("email","clave"), $datos)){
      return FALSE;
   }
   //clave, encripto
   $datos['clave']=md5($datos['clave']);

   $this->db->insert('usuario', $datos);
   return $this->db->insert_id();
}*/

function listar_interpretes(){
   $data = $this->db->query('SELECT * FROM interprete where visible = 1');
   if ($data->num_rows() > 0){
      return $data->result_array();
   }
   return null;
}

function interpretes_disponibles($dia, $hora_inic){
   $existe=$this->db->query('SELECT group_concat(id_interprete) FROM cita where dia="'.$dia.'" and hora_inicio="'.$hora_inic.'"');
   if($existe==null){
      $data = $this->db->query('SELECT * FROM interprete WHERE id_interprete ');

   }else{
      $data = $this->db->query('SELECT * FROM interprete WHERE id_interprete NOT IN (SELECT id_interprete
      FROM cita where dia="'.$dia.'" and hora_inicio="'.$hora_inic.'")');
   }
   
   if ($data->num_rows() > 0){
      return $data->result_array();
   }
   return null;
}

function hitorialCitas($id){
   $data = $this->db->query('select distinct id_citas, dia,hora_inicio,servicio.especialidad,servicio.centro,total from interprete,cita,servicio where cita.id_interprete ='.$id.' and cita.id_servicio= servicio.id_servicio order by dia desc,hora_inicio desc');

   if($data->num_rows()>0){
      return $data->result_array();

   }else{

      return null;

   }

}

function buscar_interprete($id){
             return $this->db->get_where('interprete', array('id_interprete' => $id))->row();
             
         }


function modificar_interprete($datos , $id){
   return $this->db->query('update interprete set nombre="'.$datos['nombre'].'",apellido="'.$datos['apellido'].'",apellido2="'.$datos['apellido2'].'",dni="'.$datos['dni'].'",direccion="'.$datos['direccion'].'",provincia="'.$datos['provincia'].'",
   telefono="'.$datos['telefono'].'",email="'.$datos['email'].'",urgencias="'.$datos['urgencias'].'",categoria="'.$datos['categoria'].'",nCC="'.$datos['nCC'].'" where id_interprete="'.$id.'"');
}


function insert_item ($data) {  

   return $this->db->insert( 'interprete' , $data );
      }


function borrar_interprete($id){
   return $this->db->query("update interprete set visible=0 where id_interprete=$id");
   
  //  return $this->db->delete('empresa', array('id_empresa' => $id));
}
}
?>
