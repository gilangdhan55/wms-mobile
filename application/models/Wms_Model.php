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
}