<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Shelf extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_shelf');
    }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        //        print_r($_POST);die();
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules("shelf_number","shelf_number","required|trim");
        $this->form_validation->set_rules("shelf_name","shelf_name","required|trim");
        $this->form_validation->set_rules("shelf_row","shelf_row","required|trim");
        
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['shelf_number']=$_POST['shelf_number'];
            $data['shelf_name']=$_POST['shelf_name'];
            $data['shelf_row']=$_POST['shelf_row'];
            
            //             print_r($data);die();
            
            if (isset($_POST['shelf_id']) && $_POST['shelf_id'])//update
            {
                $shelf_id=$_POST['shelf_id'];
                echo $this->mdl_shelf->update_data($shelf_id,$data); die();
            }
            else //add
            {
                
                echo $this->mdl_shelf->add($data);
            }
        }
        else
            echo validation_errors();
    }
    
    function view_data()
    {
        $where=null;
        if (isset($_GET['shelf_id']))
            $where['shelf_id']=$_GET['shelf_id'];
            
            if (isset($_GET['data']))
                $select=$_GET['data'];
                else $select="*";
                
                $return=$this->mdl_shelf->view_data($where,$select);
                $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
      //  print_r($_GET);die();
      $where=null;
        if (isset($_GET['shelf_id']) && $_GET['shelf_id'])
        {
            $where['shelf_id']=$_GET['shelf_id'];
            $object=json_encode($this->mdl_shelf->view_data($where,"*")->result());
            $data_title= "Shelf  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_shelf->delete_data($where);
            }
        }
    }
    
    
    
}
?>