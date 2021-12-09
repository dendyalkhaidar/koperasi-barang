<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
            
        }
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password','Password','required|trim');

        if($this->form_validation->run()==false){
            $data['title']='Koperasi Barang| login';
            $this->load->view('templates/auth_header',$data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');


        } else{
            //validasi success
            $this->_login();
        }
        
        
    }
    private function _login(){
        $email=$this->input->post('email');
        $password=$this->input->post('password');
        
        $user=$this->db->get_where('user',['email' => $email])->row_array();

        if($user){
            //jika user aktiv
            if($user['is_active']== 1){

                if(password_verify($password,$user['password'])){

                    $data=[
                        'email'=>$user['email'],
                        'role_id'=>$user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if($user['role_id']==1){
                    redirect('admin');
                    } else{
                         redirect('user');
                    }



                } else{
                     $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">password salah!</div>');
            redirect('auth');

                }
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Aktifkan Email Terlebih Dahulu!</div>');
            redirect('auth');

            }

        } else{
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Email Tidak Terdaftar!</div>');
            redirect('auth');


        }
    }
    public function registration()
    {
          if ($this->session->userdata('email')) {
            redirect('user');
            
        }
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
            'is_unique'=>'this email has already registered!'
        ]);
        $this->form_validation->set_rules('password1','password','required|trim|min_length[3]|matches[password2]',[
            'matches'=>'password dont match !',
            'min_lenght'=>'password to short!'
        ]);
        $this->form_validation->set_rules('password2','password','required|trim|min_length[3]|matches[password1]');
        
        if ($this->form_validation->run()==false){
            $data['title'] = 'Koperasi Barang| Registrasi';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data =[
                'name'=>htmlspecialchars($this->input->post('name',true)),
                'email'=>htmlspecialchars($this->input->post('email',true)),
                'image'=>'default.jpg',
                'password'=>password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'role_id'=> 2 ,
                'is_active'=> 1,
                'date_created'=> time()

            ];
            $this->db->insert('user',$data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Selamat Anda Berhasil Silakan Login!</div>');
            redirect('auth');
        }
    
    } 
    
    public function logout(){

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
         $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Kamu Sudah Keluar !</div>');
            redirect('auth');

    }
    public function blocked(){

        $this->load->view('auth/blocked');
    }

}