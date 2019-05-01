<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class user extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_user');
    }
    function index()
    {
        $this->load->view('data');
    }

    
    function view_data()
    {
        $where=null;
        if (isset($_GET['id']))
	         $where['user_id']=$_GET['id'];
        
        if (isset($_GET['met']))
            $where['name']=$_GET['met'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="users.name,users.username,users.b_type,users.email,user_id,users.phone,users.city,users.zip,users.status";
	  
	    
        $return=$this->mdl_user->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['id']) && $_GET['id'])
        {
            $where['user_id']=$_GET['id'];
            $object=json_encode($this->mdl_user->view_data($where,"*")->result());
            $data_title= "user  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_user->delete_data($where);
            }
        }
    }
}
?>