<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_kit_assign extends CI_Model
{
   function add($data)
    {
//         print_r($_POST);die();
        $a=$this->db->insert('kit_assign',$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        
        $this->db->where('class_id',$where);
        $a=$this->db->update('kit_assign',$data);
      return  $this->db->affected_rows($a); 
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete('kit_assgn_id');
        return $this->db->affected_rows($a);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('kit_assgn_id',"desc");
        return $this->db->get('kit_assign');
    }
    
}
?>