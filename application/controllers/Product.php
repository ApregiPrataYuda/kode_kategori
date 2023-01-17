<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('Product_models');
    }
	
	public function index()
	{
		$this->template->load('template','Product/Product_data');
	}

   public function Tambah_product()
   {

    $this->form_validation->set_rules('nama_product', 'Kode product', 'required');
    $this->form_validation->set_rules('price', 'Price product', 'required');
    $this->form_validation->set_rules('kode_subkategori', 'Kategori product', 'required');
    $this->form_validation->set_rules('image', 'image', 'callback_validate_image'); 
    $this->form_validation->set_rules('description', 'description product', 'required');
   
    $this->form_validation->set_message('required', '{field}  masih kosong, silakan di isi dulu');
    $this->form_validation->set_error_delimiters('<span class="help-block">', '</span>');

    if ($this->form_validation->run() == FALSE) {

        $datasubkat =  $this->Product_models->getdatasub();
    $data = array('rows' =>  $datasubkat, );
    $this->template->load('template','Product/Product_form_add',$data);
    }else {

        $config['upload_path']          = './assets/images/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2097152;
        $config['file_name']            = 'uploads-'.date('ymd').'-'.substr(md5(rand()),0,10);

        $this->load->library('upload', $config);

        $post =  $this->input->post(null, TRUE);

        $kodesub = explode(' | ', $post['kode_subkategori']);
        $kode_subkategori =  $kodesub[0];
    
        $kode_subkatthrowdata = $this->Product_models->printkodeproduct($kode_subkategori);

        if (isset($_POST['add'])) {
            if (@$_FILES['image']['name']) {
                if ($this->upload->do_upload('image'))
                    {
                       $post['image']= $this->upload->data('file_name');

                        $this->Product_models->add($post, $kode_subkatthrowdata);
                        if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('pesan', 'data berhasil di simpan');
                           }
                          redirect('Product'); 
                                             }else {
                                                    $error = $this->upload->display_errors();
                                                    $this->session->set_flashdata('error',$error);
                                                    redirect('Product'); 
                                                  }
            }
        }
        $this->template->load('Template','Product/Product_form_add');
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
 
   }


