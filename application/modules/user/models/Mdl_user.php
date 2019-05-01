<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_user extends CI_Model
{
    private $table;
    
    function __construct()
    {
        parent::__construct();
        $this->table = "users";
        
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('user_id',"name");
        return $this->db->get( $this->table);
    }
    function add_data($data)
    {
        $a=$this->db->insert($this->table,$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        $this->db->where($where);
        $a=$this->db->update($this->table,$data);
        return $this->db->affected_rows($a);
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete($this->table);
        return $this->db->affected_rows($a);
    }
    
}
?>