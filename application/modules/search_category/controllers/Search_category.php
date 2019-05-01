<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class search_category extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_search_category');
    }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
        //        print_r($_POST);die();
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules("search_category","search_category","required|trim");
        $this->form_validation->set_rules("description","description","required|trim");
        
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['search_category']=$_POST['search_category'];
            $data['description']=$_POST['description'];
            
            //             print_r($data);die();
            
            if (isset($_POST['search_id']) && $_POST['search_id'])//update
            {
                $shelf_id=$_POST['search_id'];
                echo $this->mdl_search_category->update_data($search_id,$data); die();
            }
            else //add
            {
                
                echo $this->mdl_search_category->add($data);
            }
        }
        else
            echo validation_errors();
    }
    
    function view_data()
    {
        $where=null;
        if (isset($_GET['search_id']))
            $where['search_id']=$_GET['search_id'];
            
            if (isset($_GET['data']))
                $select=$_GET['data'];
                else $select="*";
                
                $return=$this->mdl_search_category->view_data($where,$select);
                $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        //  print_r($_GET);die();
        $where=null;
        if (isset($_GET['search_id']) && $_GET['search_id'])
        {
            $where['search_id']=$_GET['search_id'];
            $object=json_encode($this->mdl_search_category->view_data($where,"*")->result());
            $data_title= "Search Category  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_search_category->delete_data($where);
            }
        }
    }
    
    
    
}
?>