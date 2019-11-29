<?php 

if( $this->input->get_cookie('datosSesion')!=null){
    //ok
   
}else{
    $this->load->view('loginInterprete');
}
?>