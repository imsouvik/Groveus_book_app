<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Supplier extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
         $this->load->model('mdl_supplier');       
    }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
//        print_r($_POST);die();
        $this->load->library('form_validation');
       
        $this->form_validation->set_rules("supplier_name","supplier_name","required|trim");
        $this->form_validation->set_rules("phone","phone","required|numeric|trim");
        $this->form_validation->set_rules("email","email","required|trim");
        $this->form_validation->set_rules("address","address","required|trim");
                
        if ($this->form_validation->run()==TRUE)
        {
            $data['supplier_name']=$_POST['supplier_name'];
            $data['email']=$_POST['email'];
            $data['phone']=$_POST['phone'];
            $data['address']=strip_tags($_POST['address']);            
            
//             print_r($data);die();
            
        if (isset($_POST['supplier_id']) && $_POST['supplier_id'])//update
            {
                $supplier_id=$_POST['supplier_id']; 
                echo $this->mdl_supplier->update_data($supplier_id,$data); die();
            }
            else //add
            {
                
               echo $this->mdl_supplier->add($data);
            }
        }
        else
            echo validation_errors();
}
    
    function view_data()
    {
        $where=null;
        if (isset($_GET['supplier_id']))
            $where['supplier_id']=$_GET['supplier_id'];
    
        if (isset($_GET['data']))
            $select=$_GET['data'];
        else $select="*";
         
        $return=$this->mdl_supplier->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    function delete_data()
    {
        if (isset($_GET['supplier_id']) && $_GET['supplier_id'])
        {
            $where['supplier_id']=$_GET['supplier_id'];
            $object=json_encode($this->mdl_supplier->view_data($where,"*")->result());
            $data_title= "Supplier  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_supplier->delete_data($where);
            }
        }
    }
    
    

}
?>