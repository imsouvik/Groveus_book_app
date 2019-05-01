<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Class_master extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_class_master');
    }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        //        print_r($_POST);die();
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules("class","class","required|trim");
        $this->form_validation->set_rules("section","section","required|trim");
        $this->form_validation->set_rules("school_id","school_id","required|trim");
        
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['class']=$_POST['class'];
            $data['section']=$_POST['section'];
            $data['school_id']=$_POST['school_id'];
                
            if (isset($_POST['class_id']) && $_POST['class_id'])//update
            {
                $class_id=$_POST['class_id'];
                echo $this->mdl_class_master->update_data($class_id,$data); die();
            }
            else //add
            {
                
                echo $this->mdl_class_master->add($data);
             }
        }
        else
            echo validation_errors();
    }
    
    function view_data()
    {
        $where=null;
        if (isset($_GET['class_id']))
            $where['class_id']=$_GET['class_id'];
            
            if (isset($_GET['data']))
                $select=$_GET['data'];
                else $select="*";
                
                $return=$this->mdl_class_master->view_data($where,$select);
                $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
      //  print_r($_GET);die();
      $where=null;
        if (isset($_GET['class_id']) && $_GET['class_id'])
        {
            $where['class_id']=$_GET['class_id'];
            $object=json_encode($this->mdl_class_master->view_data($where,"*")->result());
            $data_title= "Class  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_class_master->delete_data($where);
            }
        }
    }
    
    
    
}
?>