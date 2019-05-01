<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_book_details extends CI_Model
{
   function add($data)
    {
        $a=$this->db->insert('book_details',$data);
        return $this->db->insert_id($a);
    }
    function update_data($where,$data)
    {
        
        $this->db->where('b_id',$where);
        $a=$this->db->update('book_details',$data);
      return  $this->db->affected_rows($a); 
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete('book_details');
        return $this->db->affected_rows($a);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('b_id',"desc");
        return $this->db->get('book_details');
    }
    
}
?>