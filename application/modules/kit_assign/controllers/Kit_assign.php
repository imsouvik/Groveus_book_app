<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kit_assign extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_kit_assign');
    }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        //        print_r($_POST);die();
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules("school_id","school_id","required|trim");
        $this->form_validation->set_rules("class_id","class_id","required|trim");
        $this->form_validation->set_rules("section","section","required|trim");
        $this->form_validation->set_rules("kit_id","kit_id","required|trim");
        
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['school_id']=$_POST['school_id'];
            $data['class_id']=$_POST['class_id'];
            $data['section']=$_POST['section'];
            $data['kit_id']=$_POST['kit_id'];
            
            if (isset($_POST['kit_assgn_id']) && $_POST['kit_assgn_id'])//update
            {
                $kit_assgn_id=$_POST['kit_assgn_id'];
                echo $this->mdl_kit_assign->update_data($kit_assgn_id,$data); die();
            }
            else //add
            {
                
                echo $this->mdl_kit_assign->add($data);
             }
        }
        else
            echo validation_errors();
    }
    
    function view_data()
    {
        $where=null;
        if (isset($_GET['kit_assgn_id']))
            $where['kit_assgn_id']=$_GET['kit_assgn_id'];
            
            if (isset($_GET['data']))
                $select=$_GET['data'];
                else $select="*";
                
                $return=$this->mdl_kit_assign->view_data($where,$select);
                $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
      //  print_r($_GET);die();
      $where=null;
        if (isset($_GET['kit_assgn_id']) && $_GET['kit_assgn_id'])
        {
            $where['kit_assgn_id']=$_GET['kit_assgn_id'];
            $object=json_encode($this->mdl_kit_assign->view_data($where,"*")->result());
            $data_title= "Class  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_kit_assign->delete_data($where);
            }
        }
    }
    
    
    
}
?>