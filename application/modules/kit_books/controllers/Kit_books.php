<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kit_books extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_kit_books');
    }
    function index()
    {
        $this->load->view('form');
    }
    function add_data(){
        if ($this->input->get('name')){
            $data['kit_name']=$this->input->get('name');
            $data['user']=1;
            $kit['kit_id']=$this->mdl_kit_books->add($data);
            foreach ($this->db->get('kit_temp')->result() as $k){
                $kit['b_id']=$k->book_id;
                $kit['quantity']=$k->qty;
                $this->db->insert('kit_books',$kit);
            }
            
            $this->db->query('truncate kit_temp');
            echo 1;
        }
    }
    function master_save()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules("kit_name","kit_name","required|trim");
        
        if ($this->form_validation->run()==TRUE)
        {
            $user=rand(10, 99);
            $data['kit_name']=$_POST['kit_name'];
            $data['user']=$user;
            
            if (isset($_POST['kit_id']) && $_POST['kit_id'])//update
            {
                $shelf_id=$_POST['kit_id'];
                echo $this->mdl_kit_books->update_data($shelf_id,$data); die();
            }
            else //add
            {
                
                echo $this->mdl_kit_books->add($data);
            }
        }
        else
            echo validation_errors();
            
    }
    function save_data()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("kit_id","Kit Name","required|trim");
        $this->form_validation->set_rules("book_id","Book name","required|trim");
        $this->form_validation->set_rules("quantity","Quantity","required|trim");
//         print_r($_POST);die();
        if ($this->form_validation->run()==TRUE)
        {
            $data['kit_id']=$_POST['kit_id'];
            $data['book_id']=$_POST['book_id'];
            $data['quantity']=$_POST['quantity'];
            //             print_r($data);die();
            
            if (isset($_POST['kit_book_id']) && $_POST['kit_book_id'])//update
            {
                $kit_id=$_POST['kit_id'];
                $kit_id = null;
                echo $this->mdl_kit_books->update_data($kit_id,$data); die();
            }
            else //add
            {
                
                echo $this->mdl_kit_books->add_kit_books($data);
            }
        }
        else
            echo validation_errors();
    }
    
    function view_data()
    {
        $where=null;
        if (isset($_GET['kit_id']))
            $where['kit_id']=$_GET['kit_id'];
            
            if (isset($_GET['data']))
                $select=$_GET['data'];
                else $select="*";
                
                $return=$this->mdl_kit_books->view_data($where,$select);
                $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    
    function kit_view_data()
    {
        $where=null;
        if (isset($_GET['kit_book_id']))
            $where['kit_book_id']=$_GET['kit_book_id'];
        
            
        if (isset($_GET['data']))
                $select=$_GET['data'];
                else $select="kit_books.kit_book_id,kit_books.quantity,kit_master.kit_name as kname,book_details.book_name as bname";
                
                $return=$this->mdl_kit_books->kit_view_data($where,$select);
                $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
    
    function delete_data()
    {
      //  print_r($_GET);die();
      $where=null;
        if (isset($_GET['kit_id']) && $_GET['kit_id'])
        {
            $where['kit_id']=$_GET['kit_id'];
            $object=json_encode($this->mdl_kit_books->view_data($where,"*")->result());
            $data_title= "Kit  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_kit_books->delete_data($where);
            }
        }
    }
    
    
    
}
?>