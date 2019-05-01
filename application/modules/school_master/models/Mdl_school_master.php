<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_school_master extends CI_Model
{
   function add($data)
    {
//         print_r($_POST);die();
        $a=$this->db->insert('school_master',$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        
        $this->db->where('school_id',$where);
        $a=$this->db->update('school_master',$data);
      return  $this->db->affected_rows($a); 
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete('school_master');
        return $this->db->affected_rows($a);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('school_id',"desc");
        return $this->db->get('school_master');
    }
    
}
?>