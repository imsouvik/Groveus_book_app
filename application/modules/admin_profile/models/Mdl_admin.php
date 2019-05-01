<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_admin extends CI_Model
{
   function add($data)
    {
        $a=$this->db->insert('admin_profile',$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        
        $this->db->where('id',$where);
        $a=$this->db->update('admin_profile',$data);
      return  $this->db->affected_rows($a); 
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete($this->table);
        return $this->db->affected_rows($a);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('id',"desc");
        return $this->db->get('admin_profile');
    }
    
}
?>