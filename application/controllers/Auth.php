<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    function __construct() 
    {
        parent::__construct();
        $this->load->model('Authmodel');
    }

	public function Login()
	{
		$this->load->view('Auth/Login');
	}

    public function inprocess()
    {

        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_message('required', '{field} Tidak boleh Kosong...');
        $this->form_validation->set_message('max_length', '{field} Maximal 8 Karakter...');
        $this->form_validation->set_message('min_length', '{field} Minimal 4 Karakter...');
        $this->form_validation->set_message('alphanumeric', '{field} Harus Angka Atau Huruf...');

        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('Auth/Login');
        }else {

//   if (isset($_POST['submit'])) {
    

    // var_dump($_POST['submit']); die();
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $checkusername = $this->Authmodel->checkusername($username);
    if ($checkusername->num_rows() > 0) {
        $passwordandusername = $this->Authmodel->passwordandusername($username, $password);
            if ($passwordandusername->num_rows() > 0) {
               $getallfield = $passwordandusername->row_array();
                     if ($getallfield['user_status'] == 1) {
                            $this->session->set_userdata('locked', TRUE);
                              $this->session->set_userdata('user', $username);
                                $id = $getallfield['user_id'];
                                   if ($getallfield['user_akses'] == 1) {
                                        $name =  $getallfield['nama_user'];
                                        $usernames =  $getallfield['username'];
                                        $this->session->set_userdata('access', 'Admin');
                                        $this->session->set_userdata('id', $id);
                                        $this->session->set_userdata('nama_user', $name);
                                        $this->session->set_userdata('username', $usernames);
                                        redirect('Dashboard');

                                            }elseif($getallfield['user_akses'] == 2){
                                                $name =  $getallfield['nama_user'];
                                                $usernames =  $getallfield['username'];
                                                $this->session->set_userdata('access', 'user');
                                                $this->session->set_userdata('id', $id);
                                                $this->session->set_userdata('nama_user', $name);
                                                $this->session->set_userdata('username', $usernames);
                                                redirect('User');
                                       }
                                    else {
                                        $this->session->set_flashdata('gagal', 'tidak punya akses ke page manapun');
                                        redirect('Auth/Login');
                      }
            }else {
                $this->session->set_flashdata('gagal', 'akun tidak aktif');
                                        redirect('Auth/Login');
            }
        }else {
            $this->session->set_flashdata('gagal', 'Password Salah');
            redirect('Auth/Login');
        }
    }else {
        $this->session->set_flashdata('gagal', 'username tidak terdaftar');
            redirect('Auth/Login');
    }
  //}
    }

}
function logout()
{
    $this->session->sess_destroy();
    redirect('Auth/Login');
}

       
}