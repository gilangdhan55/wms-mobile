<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wms extends CI_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();  
		$this->load->model('Wms_Model'); 
    }


	public function index()
	{
       
        $allPut             = $this->Wms_Model->get_all_put();
        
        $data["allput"]     = $allPut;
		$this->load->view('put/index', $data);
	}

    public function put($id = 0)
    {
         $getALLPO          = $this->Wms_Model->get_all_po($id);
        
         $data['allpo']     = $getALLPO; 
		$this->load->view('put/list_po', $data);
    }
}
