<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class Ubah_menu extends CI_Model{
    public function ganti($id){

        return $this->db->get_where('user_menu',['id'=>$id])->row_array();
    }
}