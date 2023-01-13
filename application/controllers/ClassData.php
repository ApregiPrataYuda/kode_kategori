<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClassData extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('ClassDataModels');
    }
	
	public function index()
	{
        $data['row'] = $this->ClassDataModels->getall();
		$this->template->load('template','ClassData/ClassData',$data);
	}


    public function Tambah_ClassData()
    {
        $this->form_validation->set_rules('kode_class', 'Kode Class', 'required');
        $this->form_validation->set_rules('nama_class', 'Nama Class', 'required');
        $this->form_validation->set_rules('status', 'status', 'required');
        $this->form_validation->set_message('required', '{field}  masih kosong, silakan di isi dulu');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        if ($this->form_validation->run() == FALSE) {
             $getkode = $this->ClassDataModels->kodeClass();
             $data = array('kodeClass' => $getkode, );
            $this->template->load('template','ClassData/ClassDataAdd',$data);
        }else {
            $post = $this->input->post(null, TRUE);

            $this->ClassDataModels->add($post);

            if ($this->db->affected_rows() > 0 ) {
                $this->session->set_flashdata('pesan','saved Success');
                redirect('ClassData');
            }
        }
    }


    public function edits($id)
    {
        $query =   $this->ClassDataModels->getid($id);
		if ($query->num_rows() > 0) {
			 $classupdate = $query->row();
			   $data = array(
							   'row'  =>  $classupdate
						 );
                         $this->template->load('template','ClassData/ClassDataEdit',$data);
	}
    }

    
    public function Process()
    {
        $post = $this->input->post(null, TRUE);
        
        $this->ClassDataModels->edit($post);
        if ($this->db->affected_rows() > 0 ) {
            $this->session->set_flashdata('pesan','updated Success');
            redirect('ClassData');
        }else {
            $this->session->set_flashdata('error','tidak Ada yang di update');
            redirect('ClassData');
        }
    }


    public function delete($id)
    {

        
       $this->ClassDataModels->delete($id);
       if ($this->db->affected_rows() > 0 ) {
        $this->session->set_flashdata('pesan','Deleted Success');
        redirect('ClassData');
    }
    }

  
}

