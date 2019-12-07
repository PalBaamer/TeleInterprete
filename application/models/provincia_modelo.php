<?php
class Provincia_modelo extends CI_Model {
        function __construct(){
        parent::__construct();
        $this->load->database();
        }


        function listar_provincia(){
                $dataProvincia = $this->db->query("select * from provincias ");
                if ($dataProvincia->num_rows() > 0){
            return $dataProvincia->result_array();
        }
            return null;
        }





}