<?php

class Index_Controller extends CI_Controller {

	public function index()
	{
		//$this->load->view('login');
		redirect('login');
	}
}
