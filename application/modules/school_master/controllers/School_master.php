<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class School_master extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_school_master');
    }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        //        print_r($_POST);die();
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules("school_name","school_name","required|trim");
        $this->form_validation->set_rules("board","board","required|trim");
        $this->form_validation->set_rules("address","address","required|trim");
        $this->form_validation->set_rules("email","email","required|trim");
        $this->form_validation->set_rules("phone","phone","required|trim");
        
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['school_name']=$_POST['school_name'];
            $data['board']=$_POST['board'];
            $data['address']=$_POST['address'];
            $data['email']=$_POST['email'];
            $data['phone']=$_POST['phone'];
                
            if (isset($_POST['school_id']) && $_POST['school_id'])//update
            {
                $school_id=$_POST['school_id'];
                echo $this->mdl_school_master->update_data($school_id,$data); die();
            }
            else //add
            {
                
               echo $this->mdl_school_master->add($data);
             }
        }
        else
            echo validation_errors();
    }
    
    function view_data()
    {
        $where=null;
        if (isset($_GET['school_id']))
            $where['school_id']=$_GET['school_id'];
            
            if (isset($_GET['data']))
                $select=$_GET['data'];
                else $select="*";
                
                $return=$this->mdl_school_master->view_data($where,$select);
                $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
      //  print_r($_GET);die();
      $where=null;
        if (isset($_GET['school_id']) && $_GET['school_id'])
        {
            $where['school_id']=$_GET['school_id'];
            $object=json_encode($this->mdl_school_master->view_data($where,"*")->result());
            $data_title= "Shelf  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_school_master->delete_data($where);
            }
        }
    }
    
    
    
}
?>