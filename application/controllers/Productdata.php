<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productdata extends CI_Controller {

     function __construct()
    {
        parent::__construct();
        $this->load->model('Productdatamodels');
    }

	public function index()
	{
        $data['row'] = $this->Productdatamodels->getdataall();
		$this->template->load('template','Product_view/Header/Product_data', $data);
	}

    public function Tambahproductheader()
    {

    $this->form_validation->set_rules('nama_header', 'Nama Header', 'required');
    $this->form_validation->set_rules('berat_satuan', 'berat satuan', 'required');
    $this->form_validation->set_rules('kode_subkategori', 'Kategori product', 'required');
    $this->form_validation->set_rules('image', 'image', 'callback_validate_image'); 
    $this->form_validation->set_rules('description_header', 'description product', 'required');
   
    $this->form_validation->set_message('required', '{field}  masih kosong, silakan di isi dulu');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {

        $throwdatakat =  $this->Productdatamodels->getdatasub();
        $data = array('rows' => $throwdatakat, );
        $this->template->load('template','Product_view/Header/Product_tambah',$data);
    }else {

        $config['upload_path']          = './assets/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2097152;
        $config['file_name']            = 'uploads-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $this->load->library('upload', $config);

        $post =  $this->input->post(null, TRUE);

        $kodesub = explode(' | ', $post['kode_subkategori']);
        $kode_subkategori =  $kodesub[0];
    
        $kode_subkatthrowdata = $this->Productdatamodels->printkodeproduct($kode_subkategori);

        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name']) {
                if ($this->upload->do_upload('image'))
                    {
                       $post['image']= $this->upload->data('file_name');

                        $this->Productdatamodels->add($post, $kode_subkatthrowdata);
                        if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('pesan', 'data berhasil di simpan');
                           }
                          redirect('Productdata'); 
                                             }else {
                                                    $error = $this->upload->display_errors();
                                                    $this->session->set_flashdata('error',$error);
                                                    redirect('Productdata'); 
                                                  }
            }
        }
        $this->session->set_flashdata('error', 'data gagal di simpan');
        redirect('Productdata');
        }
    }

    //validasi image
    public function validate_image()
    {
        $check = TRUE;
        if ((!isset($_FILES['image'])) || $_FILES['image']['size'] == 0) {
            $this->form_validation->set_message('validate_image', 'The {field} masih kosong');
            $check = FALSE;
        } else if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
            $allowedExts = array("gif", "jpeg", "jpg", "png", "JPG", "JPEG", "GIF", "PNG");
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            $detectedType = exif_imagetype($_FILES['image']['tmp_name']);
            $type = $_FILES['image']['type'];

            if (!in_array($detectedType, $allowedTypes)) {
                $this->form_validation->set_message('validate_image', 'Invalid Image Content!');
                $check = FALSE;
            }
            if (filesize($_FILES['image']['tmp_name']) > 2097152) {
                $this->form_validation->set_message('validate_image', 'Image Minimal 2MB!');
                $check = FALSE;
            }
            if (!in_array($extension, $allowedExts)) {
                $this->form_validation->set_message('validate_image', "File Extension {$extension} Tidak Valid");
                $check = FALSE;
            }
        }
        return $check;
    }


    public function edit($kode_header)
    {
        $query = $this->Productdatamodels->getkode($kode_header);
        if ($query->num_rows() > 0) {
             $updated = $query->row();
             $throwdatakat =  $this->Productdatamodels->getdatasub();
             $data = array(
                'row' => $updated, 
                'getdatasubkat' => $throwdatakat,
            );
        }
        $this->template->load('template','Product_view/Header/Product_edit', $data);
    }



    public function Process()
    {
      
        $config['upload_path']          = './assets/image/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2097152;
        $config['file_name']            = 'uploads-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $this->load->library('upload', $config);

        $post =  $this->input->post(null, TRUE);

        // var_dump($post); die();

        $kodesub = explode(' | ', $post['kode_subkategori']);
        $kode_subkategori =  $kodesub[0];
    
        $kode_subkatthrowdata = $this->Productdatamodels->kodeedit($kode_subkategori);

        if (isset($_POST['edit'])) {
            if (@$_FILES['image']['name']) {
                if ($this->upload->do_upload('image'))
                    {

                        $oldimg = $this->Productdatamodels->getid($post['header_id'])->row();
                                               if ($oldimg->image) {
                                                   $target_file = './assets/image/'.$oldimg->image;
                                                   unlink( $target_file);
                                               } 

                       $post['image']= $this->upload->data('file_name');
                        $this->Productdatamodels->edit($post, $kode_subkatthrowdata);
                        if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('pesan', 'data berhasil di simpan');
                           }
                          redirect('Productdata'); 
                                             }else {
                                                    $error = $this->upload->display_errors();
                                                    $this->session->set_flashdata('error',$error);
                                                    redirect('Productdata'); 
                                                  }
            }else {
                $post['image']= null;
                $this->Productdatamodels->edit($post, $kode_subkatthrowdata);
                 if ($this->db->affected_rows() > 0) {
                  $this->session->set_flashdata('pesan', 'data berhasil di update');
            }
            redirect('Productdata');
        }
        $this->session->set_flashdata('error', 'data gagal di simpan');
        redirect('Productdata');
        }
    }


    public function delete($kode_header)
    {
        $oldimg = $this->Productdatamodels->getkode($kode_header)->row();
        if ($oldimg->image) {
            $target_file = './assets/image/'.$oldimg->image;
            unlink($target_file);
        }

      $this->Productdatamodels->delete($kode_header);
      if ($this->db->affected_rows() > 0) {
        $this->session->set_flashdata('pesan', 'data berhasil di hapus');
      }
      redirect('Productdata');
    }


// detail 


    public function detailproduct($kode_header)
    {
        // $kode_header = $this->Productdatamodels->getkodeheader();
        $data['row'] = $this->Productdatamodels->getdataatkodeheader($kode_header);
        $this->template->load('template','Product_view/Detail/Detail_data_product', $data);
    }

    public function Tambah_detail_product()
    {
        $this->form_validation->set_rules('nama_product', 'Nama Product', 'required');
        $this->form_validation->set_rules('kondisi', 'Kodisi Product', 'required');
        $this->form_validation->set_rules('warna', 'Warna Product', 'required');
        $this->form_validation->set_rules('type_product', 'Type Product', 'required');
        $this->form_validation->set_rules('qty', 'Qty Product', 'required');
        $this->form_validation->set_rules('price_satuan', 'price satuan Product', 'required');
        $this->form_validation->set_rules('description', 'price satuan Product', 'required');
        

        $this->form_validation->set_message('required', '{field}  masih kosong, silakan di isi dulu');
        $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template','Product_view/Detail/Detail_add_product');
        }else {
        if (isset($_POST['add'])) {
            $post = $this->input->post(null, TRUE);
            $kodeheader = explode(' ', $post['kode_header']);
            $cetakkodeheader = $kodeheader[0];

            $kirimkodeheader = $this->Productdatamodels->kodeproductreal($cetakkodeheader);
            
            $this->Productdatamodels->adddetail($post, $kirimkodeheader);

            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan','save success');
                redirect('Productdata/detailproduct/'.$post['kode_header']);
            }
        }else {
            $this->session->set_flashdata('error','save gagal');
            redirect('Productdata/detailproduct/'.$post['kode_header']);
        }
        }
    }

    public function deletedetails($detail_id, $kode_header)
    {
     
        $this->Productdatamodels->deletedetails($detail_id, $kode_header);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus');
            redirect('Productdata/detailproduct/'.$kode_header);
        }else {
            $this->session->set_flashdata('error', 'Data Gagal Di Hapus');
            redirect('Productdata/detailproduct/'.$kode_header);
        }
    }


    public function editdetails($detail_id)
    {
        $query = $this->Productdatamodels->getdetail($detail_id);
        if ($query->num_rows() > 0) {
             $updated = $query->row();
            $data = array('row' => $updated);
        }
        $this->template->load('template','Product_view/Detail/Detail_edit_product',$data);
    }

    public function processdetail()
    {
        $post = $this->input->post(null, TRUE);

        $cetakkode = explode(' ', $post['kode_header']);
        $kode_headers = $cetakkode[0];

        
        //var_dump($post); die();
        //if (isset($_POST['edit'])) {
        //    echo 'data berhasil di ambil';
            $this->Productdatamodels->editdetail($post);
            // if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('pesan', 'Data Berhasil Di updated');
                redirect('Productdata/detailproduct/'.$kode_headers);
           // }
            // else {
            //     $this->session->set_flashdata('error', 'Data Gagal Di updated');
            //     redirect('Productdata/detailproduct/'.$kode_headers);
            // }
    
        // }
        // else {
        //   echo 'data gagal di ambil';
        // }
    }
}