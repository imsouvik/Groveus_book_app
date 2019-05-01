<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_supplier extends CI_Model
{
   function add($data)
    {
        $a=$this->db->insert('supplier',$data);
        return $this->db->affected_rows($a);
    }
    function update_data($where,$data)
    {
        
        $this->db->where('supplier_id',$where);
        $a=$this->db->update('supplier',$data);
      return  $this->db->affected_rows($a); 
    }
    function delete_data($where)
    {
        $this->db->where($where);
        $a=$this->db->delete('supplier');
        return $this->db->affected_rows($a);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('supplier_id',"desc");
        return $this->db->get('supplier');
    }
    
}
?>