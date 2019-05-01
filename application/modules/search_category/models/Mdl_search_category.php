<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_search_category extends CI_Model
{
    function add($data)
    {
        $a=$this->db->insert('search',$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        
        $this->db->where('search_id',$where);
        $a=$this->db->update('search',$data);
        return  $this->db->affected_rows($a);
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete('search');
        return $this->db->affected_rows($a);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
            $this->db->order_by('search_id',"desc");
            return $this->db->get('search');
    }
    
}
?>