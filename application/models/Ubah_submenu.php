<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

class ubah_submenu extends CI_Model{
    public function ganti($id){

        return $this->db->get_where('user_sub_menu',['id'=>$id])->row_array();
    }
}