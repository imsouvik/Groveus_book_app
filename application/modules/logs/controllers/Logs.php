<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logs extends MX_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('logs_mdl');
    }
	public function index()
	{
		$this->load->view('logs');
	}
	function view_data()
	{
	    $where=null;
	    
	    if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	     
	    $return=$this->logs_mdl->view_data($where,$select);
	    $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
	}
	function get_object(){
	    $return=$this->db->where('auto_id',$_GET['id'])->get('logs')->result();
        print_r($return[0]->data);
	    
	}
	function add_data($title, $object)
	{
	    $data['data']=$object;
	    $data['data_title']=$title;
	    $data['date'] = date("d/m/Y");
	    $data['time'] = date("h:i:s");
	    $data['user']=$this->session->userdata('username');
	   
	    return $this->logs_mdl->add_data($data);
	}
	//Copyright @ Groveus (www.groveus.com)	
}