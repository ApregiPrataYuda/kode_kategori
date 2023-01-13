<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Multiples extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model(['Multiples_m','ClassDataModels']);
    }

	public function index()
	{
            $this->template->load('template','Multiples/Multiples_data');
	}

    public function add()
    {
        if ($_POST == NULL) {
            $this->template->load('template','Multiples/Multiples_add');
        }else {
            redirect('Multiples/add_multiple_post/'.$_POST['banyak_data']);
        }
    }


    public function add_multiple_post($banyak_data=0)
    {
        if ($_POST == null) {

            $datax = $this->ClassDataModels->getall();
            
            // $data['banyak_data'] = $banyak_data;
             $datay =[
                'banyak_data' => $banyak_data,
                'row' => $datax
             ];

            $this->template->load('template','Multiples/Multiples_form',$datay);
        }else {
            foreach($_POST['data'] as $d){
                $this->Multiples_m->save($d);
            }
            $this->session->set_flashdata('pesan', 'Saved');
            redirect('Multiples');
        }
    }
}
