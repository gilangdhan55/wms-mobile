<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	function __construct()
    {
        // Construct the parent class
        parent::__construct();  
		check_not_login();
    }

	public function index()
	{ 
		$this->load->view('index');
	}
}
