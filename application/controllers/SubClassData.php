<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubClassData extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model(['SubClassDataModels','ClassDataModels']);
    }

	public function index()
	{
        $data['row'] = $this->SubClassDataModels->getAll();
		$this->template->load('template','SubClassData/SubClassData',$data);
	}


    public function Tambah_SubClassData()
    {

    $this->form_validation->set_rules('kode_class', 'kode class', 'required');
    $this->form_validation->set_rules('nama_subclass', 'Nama Subclass', 'required');

    $this->form_validation->set_message('required', '{field}  masih kosong, silakan di isi dulu');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $getclassdata = $this->ClassDataModels->gets();
            $data = array(
                'rows' =>  $getclassdata,
            );
            $this->template->load('template','SubClassData/SubClassDataAdd',$data);
        }else {
            //get all input
            $post = $this->input->post(null, TRUE);
            
            //get input kode class & explode
            $getkodeclass = explode('|', $post['kode_class']);
            $kode_class = $getkodeclass[0];
            $kodesubclassview = $this->SubClassDataModels->kodesubclass($kode_class);
            $this->SubClassDataModels->add($post, $kodesubclassview);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'data Berhasil di Simpan');
                redirect('SubClassData');
              }
        }
    }


    public function Edit_SubClassData($id)
    {
        $query =   $this->SubClassDataModels->getid($id);
		if ($query->num_rows() > 0) {
			 $classupdate = $query->row();
			   $data = array(
							   'row'  =>  $classupdate
						 );
        $this->template->load('template','SubClassData/SubClassDataEdit',$data);
    }
  }

  public function Process()
  {
    $post = $this->input->post(null, TRUE);
    $this->SubClassDataModels->edit($post);
    if ($this->db->affected_rows() > 0 ) {
        $this->session->set_flashdata('pesan','updated Success');
        redirect('SubClassData');
    }else {
        $this->session->set_flashdata('error','Tidak Ada Data yang diubah');
        redirect('SubClassData');
    }
  }


  public function delete($subclass_id)
  {
     $this->SubClassDataModels->delete($subclass_id);
     if ($this->db->affected_rows() > 0 ) {
      $this->session->set_flashdata('pesan','Deleted Success');
      redirect('SubClassData');
  }
  }
}
