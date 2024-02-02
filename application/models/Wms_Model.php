<?php 

class Wms_Model extends CI_Model
{ 

     public function get_all_put()
     {
        $sql        = "SELECT Grpo as NoPo, PaletNo as NoPal, auto, bin FROM wms_put";

        $query      = $this->db->query($sql);
        $result     = $query->result(); 

        return $result;
     }

     public function get_all_po($id)
     {
        $sql        = "SELECT Grpo as NoPo, PaletNo as NoPal, auto, bin FROM wms_put where Grpo = '$id' ";

        $query      = $this->db->query($sql);
        $result     = $query->result(); 

        return $result;
     }

     public function find_scan_nopal($json_input)
     {
         $Grpo       = $json_input['nopo'];
         $no         = $json_input['result'];

         $sql        = "SELECT PaletNo, Bin, WmsRead, auto FROM wms_put WHERE Grpo = '$Grpo' AND PaletNo = '$no'";

         $query      = $this->db->query($sql);
       
         $result     = $query->row(); 

         return $result; 
     }

     public function find_scan_bin($json_input)
     {
      
         $Grpo       = $json_input['nopo'];
         $nopal      = $json_input['nopal'];
         $bin        = $json_input['result'];

         $sql        = "SELECT PaletNo, Bin, WmsRead, auto FROM wms_put WHERE Grpo = '$Grpo' AND PaletNo = '$nopal' AND bin = '$bin'";

         $query      = $this->db->query($sql);
        
         $result     = $query->row(); 
       
         return $result; 
     }
}