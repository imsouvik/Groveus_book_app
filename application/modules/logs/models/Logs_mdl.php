<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logs_mdl extends CI_Model{
    
    private $table;
    
    function __construct()
    {
        parent::__construct();
        $this->table = "logs";
    }
    
    function add_data($data)
    {
        return $this->db->insert($this->table,$data);
    }
    function view_data($where=null,$select)
    {
        $this->db->select($select);
        if($where)
            $this->db->where($where);
        $this->db->order_by('auto_id',"desc");
        return $this->db->get( $this->table);
    }
    //Copyright @ Groveus (www.groveus.com)
}

?>