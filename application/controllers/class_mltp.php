<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class class_mltp extends CI_Controller {


	function __construct(){
		parent::__construct();
		$this->load->model('class_mltp_models');
	}

	public function index()
	{
		$this->template->load('template','class_mltp/class_mltpData');
	}


	public function formChose()
	{
		if ($_POST == NULL) {
			$this->template->load('template','class_mltp/class_mltpChose');
        }else {
            redirect('class_mltp/addForm/'.$_POST['banyak_data']);
        }
	}


	public function addForm($banyak_data=0)
	{
		if ($_POST == null) {

            $kodeClass = $this->class_mltp_models->kodeClass();
            
             $datay =[
                'banyak_data' => $banyak_data,
                'kodeClass' => $kodeClass
             ];

			 $this->template->load('template','class_mltp/addForm', $datay);
        }else {

			foreach($_POST['data'] as $d){
                $this->class_mltp_models->save($d);
            }
            $this->session->set_flashdata('pesan', 'Saved');
            redirect('class_mltp');
		}
		
	}
}


















