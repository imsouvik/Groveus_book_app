<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_shelf extends CI_Model
{
   function add($data)
    {
        $a=$this->db->insert('shelf',$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        
        $this->db->where('shelf_id',$where);
        $a=$this->db->update('shelf',$data);
      return  $this->db->affected_rows($a); 
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete('shelf');
        return $this->db->affected_rows($a);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('shelf_id',"desc");
        return $this->db->get('shelf');
    }
    
}
?>