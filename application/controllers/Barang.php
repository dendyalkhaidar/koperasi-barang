<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
        public function __construct(){

        parent :: __construct();

        is_login();





    }


    public function index(){
        $data['title']= 'Daftar Barang';
        $data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();


        $data['nama_barang']= $this->db->get('user_barang')->result_array();
        $data['stok']= $this->db->get('user_barang')->result_array();
        $data['harga_jual']= $this->db->get('user_barang')->result_array();
        $data['barang_masuk']= $this->db->get('user_barang')->result_array();
        $data['barang_keluar']= $this->db->get('user_barang')->result_array();

        $this->form_validation->set_rules('nama_barang','Barang', 'required');
        $this->form_validation->set_rules('stok','Stok', 'required');
        $this->form_validation->set_rules('harga_jual','Harga Jual', 'required');
        $this->form_validation->set_rules('barang_masuk','Barang Masuk', 'required');
        $this->form_validation->set_rules('barang_keluar','Barang keluar', 'required');


        if  ($this->form_validation->run()== false) {   
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('barang/index',$data);
            $this->load->view('templates/footer');

        }
        else{
            $data=[
                'nama_barang'=> $this->input-> post('nama_barang'),
                'stok'=> $this->input-> post('stok'),
                'harga_jual'=> $this->input-> post('harga_jual'),
                'barang_masuk'=> $this->input-> post('barang_masuk'),
                'barang_keluar'=> $this->input-> post('barang_keluar'),
                
            ];
            $this->db->insert('user_barang',$data);
               $this->session->set_flashdata('pesan','<div class="alert alert-success col-lg-5" role="alert">Data Barang Telah Ditambahkan</div>');
            redirect('barang');
        }


        
        
    }

    
    public function hapus($id){

        $this->db->where('id',$id);
        $this->db->delete('user_barang');
        redirect('barang');


    }

     
        public function edit($id){
        $data['title']= 'Edit Daftar Barang';
        $data['user']=$this->db->get_where('user',['email'=> $this->session->userdata('email')])->row_array();
        $this->load->model('ubah','u' );
        $data['edit']=$this->u->ganti($id);

        $this->form_validation->set_rules('nama_barang','Barang', 'required');
        $this->form_validation->set_rules('stok','Stok', 'required');
        $this->form_validation->set_rules('harga_jual','Harga Jual', 'required');
        $this->form_validation->set_rules('barang_masuk','Barang Masuk', 'required');
        $this->form_validation->set_rules('barang_keluar','Barang keluar', 'required');

        if  ($this->form_validation->run()== false) {   
            $this->load->view('templates/header',$data);
            $this->load->view('templates/sidebar',$data);
            $this->load->view('templates/topbar',$data);
            $this->load->view('barang/edit',$data);
            $this->load->view('templates/footer');
             } else{
             $data=[
                'nama_barang'=> $this->input-> post('nama_barang'),
                'stok'=> $this->input-> post('stok'),
                'harga_jual'=> $this->input-> post('harga_jual'),
                'barang_masuk'=> $this->input-> post('barang_masuk'),
                'barang_keluar'=> $this->input-> post('barang_keluar'),
                
            ];
            $this->db->where('id',$this->input-> post('id'));
            $this->db->update('user_barang',$data);
            redirect('barang');
        }
            
    }









    



           

}


