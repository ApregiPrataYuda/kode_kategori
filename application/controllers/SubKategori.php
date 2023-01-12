<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubKategori extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model(['SubKategori_models','KategoriModels']);
    }

	public function index()
	{
        $data['row'] = $this->SubKategori_models->getAll();
		$this->template->load('template','SubKategori/SubKategori',$data);
	}


    public function Tambah_subkategori()
    {

        $this->form_validation->set_rules('kode_kategori', 'kode kategori', 'required');
        $this->form_validation->set_rules('kode_warna', 'kode warna', 'required');
        $this->form_validation->set_rules('merk', 'merk', 'required');
        $this->form_validation->set_rules('tipe', 'tipe', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('nama_subkategori', 'nama subkategori', 'required');
    
        $this->form_validation->set_message('required', '{field}  masih kosong, silakan di isi dulu');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

        if ($this->form_validation->run() == FALSE) {

            $getdatac = $this->SubKategori_models->getc();
            $getdatakat = $this->KategoriModels->getAll();
           
            $data = array('rows' => $getdatac, 'rowskat' => $getdatakat );
            $this->template->load('template','SubKategori/SubKategoriAdd',$data);
           }else {

            $post = $this->input->post();

            $kodex = explode(' | ', $post['kode_kategori']);
            $kode_kategori = $kodex[0];

            $kodez = explode(' | ', $post['kode_warna']);
            $kode_warna = $kodez[0];

            $sendkode =  $this->SubKategori_models->subcode($kode_kategori,  $kode_warna);

            $this->SubKategori_models->add($post, $sendkode);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'data Berhasil di tambahkan');
                redirect('SubKategori');
              }
        }
    }


    public function edit_subkategori($id)
    {
        $query = $this->SubKategori_models->getid($id);
        if ($query->num_rows() > 0) {

           $updated = $query->row();

           $getdatac = $this->SubKategori_models->getc();
           $getdatakat = $this->KategoriModels->getAll();

           $data = array('row' => $updated, 'loop' => $getdatac, 'loopp' => $getdatakat);
        }
        $this->template->load('template','SubKategori/SubKategoriEdit', $data);
    }


    public function Process()
    {
        $post = $this->input->post();
            $kodex = explode(' | ', $post['kode_kategori']);
            $kode_kategori = $kodex[0];

            $kodez = explode(' | ', $post['kode_warna']);
            $kode_warna = $kodez[0];

            $sendkode =  $this->SubKategori_models->subcode($kode_kategori,  $kode_warna);

              $this->SubKategori_models->edit($post, $sendkode);
              if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'data Berhasil di update');
                redirect('SubKategori');
            }else {
                $this->session->set_flashdata('error', 'tidak ada data yg di update');
                redirect('SubKategori');
            }
    }


    public function delete_subkategori($id)
    {
        $this->SubKategori_models->delete($id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', 'data Berhasil di delete');
            redirect('SubKategori');
        }
    }

}
