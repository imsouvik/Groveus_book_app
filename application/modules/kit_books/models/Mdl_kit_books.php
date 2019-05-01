<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_kit_books extends CI_Model
{
   function add($data)
    {
        $a=$this->db->insert('kit_master',$data);
        return $this->db->insert_id($a);
    }
    function add_kit_books($data)
    {
        $a=$this->db->insert('kit_books',$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        
        $this->db->where('kit_id',$where);
        $a=$this->db->update('kit_master',$data);
      return  $this->db->affected_rows($a); 
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete('kit_master');
        return $this->db->affected_rows($a);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('kit_id',"desc");
        return $this->db->get('kit_master');
    }
    function kit_view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
            $this->db->join('kit_master','kit_id');
            $this->db->join('book_details','b_id');
            $this->db->order_by('kit_book_id',"desc");
            return $this->db->get('kit_books');
    }
    
}
?>