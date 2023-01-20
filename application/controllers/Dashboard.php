<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		if($this->session->userdata('locked') !=TRUE){
         redirect('Auth/Login');
		};
	}

	public function index()
	{
		$this->template->load('template','Dashboard');
	}
}
