<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kit_temp extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_kit_temp');
    }
    function add_data($id,$qty)
    {
        $data['book_id']=$id;
        $data['qty']=$qty;
        return $this->mdl_kit_temp->add($data);
    }
    
    function view_data()
    {
        $return=$this->db->get('kit_temp');
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    
    
    
}
?>