<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_user_privileges extends MX_Controller
{
	private $table;
	
	function __construct()
	{
		parent::__construct();
		$this->table = "user_privileges";
	}
    
    function add_data($data)
	{
	   return $this->db->insert($this->table,$data);
	}
	
	function update_data($where,$values)
	{
	    $this->db->where($where);
	    return $this->db->update($this->table,$values);
	}
	
	
    function view_data($data)
	{
	    $this->db->where($data);
	    $this->db->order_by('auto_id',"desc");
		return $this->db->get($this->table);
	}
	function delete_data($data)
	{
	    $this->db->where($data);
	    return $this->db->delete($this->table);
	}
    function check_module_privileges($where)
	{
	    $this->db->where($where);
	    if($this->db->get($this->table)->num_rows()>0)
	       return true;
	    else return false;
	}
	
}