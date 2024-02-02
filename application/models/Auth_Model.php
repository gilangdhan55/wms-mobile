<?php 

class Auth_Model extends CI_Model
{ 
    public function get_data_login($username)
     {
        $sql        = "SELECT * FROM master_user WHERE username = '$username' ";
     
        $query      = $this->db->query($sql);
        $result     = $query->row(); 

        return $result;
     }
    
     public function get_role($role_id)
     {
        $sql        = "SELECT * FROM master_role WHERE id = '$role_id' ";
     
        $query      = $this->db->query($sql);
        $result     = $query->row(); 

        return $result;
     }

}