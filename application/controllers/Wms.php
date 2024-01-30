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

    public function findScanNoPal()
    {
        $response       = array();
        $json_input 	= json_decode(file_get_contents('php://input'), true);
        $no             = $json_input['result'];
        $result         = $this->Wms_Model->find_scan_nopal($json_input);
        
        if($result){
            $response   = array(
                "success"   => true,
                "message"   => "Data berhasil di dapatkan",
                "data"      => $result
            );
        }else{
            $response   = array(
                "success"   => false,
                "Nopal"     => $no,
                "message"   => "Data tidak ditemukan"
            );
        }

        echo json_encode($response); 
    }

    public function findScanBin()
    {
        $response       = array();
        $json_input 	= json_decode(file_get_contents('php://input'), true);
        $bin            = $json_input['result'];
        $result         = $this->Wms_Model->find_scan_bin($json_input);

        if($result){
            $response   = array(
                "success"   => true,
                "message"   => "Data berhasil di dapatkan",
                "data"      => $result
            );
        }else{
            $response   = array(
                "success"   => false,
                "bin"       => $bin,
                "message"   => "Data tidak ditemukan"
            );
        }

        echo json_encode($response);  
    }
}
