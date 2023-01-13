<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_emp extends CI_Controller {

	
	public function index()
	{
        if ($_POST == NULL) {
            # code...
            $this->template->load('template','Data_emp/Data');
        }else {
            # code...
            redirect('Data_emp/add_multiple_post/'.$_POST['banyak_data']);
        }
	}

    public function add_multiple_post($banyak_data=0)
    {
        if ($_POST == NULL) {
            $data['banyak_data'] = $banyak_data;
            $this->template->load('template','Data_emp/add_multiple_post',$data);
        }else {
            foreach($_POST['data'] as $d){
                $this->db->insert('emp',$d);
            }
            redirect('Data_emp');
        }
        }
       
    }

