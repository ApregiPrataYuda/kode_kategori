<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(['KategoriModels','SubClassDataModels']);
    }
	
	public function index()
	{
        $data['row'] = $this->KategoriModels->getAll();
		$this->template->load('template','Kategori/KategoriData', $data);
	}

    public function Tambah_Kategori()
    {
        $this->form_validation->set_rules('kode_subclass', 'kodesubclass', 'required');
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
    
        $this->form_validation->set_message('required', '{field}  masih kosong, silakan di isi dulu');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $getdatasubclass = $this->SubClassDataModels->getAll();
            $data = array('rows' => $getdatasubclass, );
            $this->template->load('template','Kategori/KategoriAdd',$data);
        }else {
            $post = $this->input->post(null, TRUE);
            $kodesubclass = explode(' | ',$post['kode_subclass']);
              $kode_subclass = $kodesubclass[0];
              $kodesubclassview = $this->KategoriModels->kodeKategori($kode_subclass);
          
            $this->KategoriModels->add($post, $kodesubclassview);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'data Berhasil di Simpan');
                redirect('Kategori');
              } else {
                $this->session->set_flashdata('error', 'data Gagal di Simpan');
                redirect('Kategori');
              }
        }
    }


    public function Edit_Kategori($id)
    {

        $query = $this->KategoriModels->getid($id);
        if ($query->num_rows() > 0) {
             $updated = $query->row();
            $data = array('row' => $updated, );
            $this->template->load('template','Kategori/KategoriEdit', $data);
        }
    }


    public function Process()
    {
        $post = $this->input->post(null, TRUE);

        $this->KategoriModels->edit($post);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', 'data Berhasil di update');
            redirect('Kategori');
          }
    }

    public function delete($kategori_id)
    {
       $this->KategoriModels->delete($kategori_id);
       if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', 'data Berhasil di Hapus');
        redirect('Kategori');
       }
    }
}
