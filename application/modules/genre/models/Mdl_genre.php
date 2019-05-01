<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_genre extends CI_Model
{
    function add($data)
    {
        $a=$this->db->insert('genre',$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        
        $this->db->where('genre_id',$where);
        $a=$this->db->update('genre',$data);
        return  $this->db->affected_rows($a);
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete('genre');
        return $this->db->affected_rows($a);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
            $this->db->order_by('genre_id',"desc");
            return $this->db->get('genre');
    }
    
}
?>