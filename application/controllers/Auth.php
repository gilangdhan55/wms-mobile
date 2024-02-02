<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
        // Construct the parent class
        parent::__construct();  
		$this->load->model('Auth_Model');
    }


	public function login()
	{
		
		check_already_login(); 
		$this->load->view('login');
	}

	public function login_proccess()
	{
		$data 			= json_decode(file_get_contents('php://input'), true);

		$form			= $data['form']; 
		$username		= $form['username'];
		$password		= $form['password'];
	 
		$response		= array();
		$setSession		= array();
		
		$user			= $this->Auth_Model->get_data_login($username);
 
		if(!$user){
			$response	= array(
				"success" 	=> false,
				"message"	=> "Username atau Password salah!"
			);
		}

		if($user){
			if($password != $user->password){
				$response	= array(
					"success" 	=> false,
					"message"	=> "Username atau Password salah!"
				);
			}else{
				$role			= $this->Auth_Model->get_role($user->role_id);

				$setSession = [
					'fullname' 	=> $user->fullname, 
					'role_id' 	=> $user->role_id,
					'role' 		=> $role->role,
					'username'	=> $user->username, 
				];  

				$this->session->set_userdata($setSession);

				$response	= array(
					"success" 	=> true,
					"message"	=> "Berhasil Login"
				);

			} 
		}
	  
		echo json_encode($response);
 
	}

	public function logout()
	{
		$hello = $this->session->sess_destroy();
		  
        redirect('auth');
	}
}
