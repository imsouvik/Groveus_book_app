<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Book_details extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
         $this->load->model('mdl_book_details');
    }
    function index()
    {
        $this->load->view('form');
    }
    function add()
    {
//         print_r($_POST['search_id']);die();
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules("book_name","Book Name","required|trim");
        $this->form_validation->set_rules("author_name","Author Name","required|trim");
        $this->form_validation->set_rules("pub_name","Publisher Name","required|trim");
        $this->form_validation->set_rules("genre_id","Genre Id","required|trim");
        $this->form_validation->set_rules("isbn","ISBN","required|trim");
        $this->form_validation->set_rules("total_quant","Total Quantity","required|numeric|trim");
        $this->form_validation->set_rules("pur_rate","Purchase Rate","required|trim");
        $this->form_validation->set_rules("sell_rate","Selling Rate","required|trim");
        $this->form_validation->set_rules("shelf_id","Shelf ID","required|numeric|trim");
        
        
        if ($this->form_validation->run()==TRUE)
        {
            $data['book_name']=$_POST['book_name'];
            $data['author_name']=$_POST['author_name'];
            $data['pub_name']=($_POST['pub_name']);
            $data['genre_id']=$_POST['genre_id'];
            $data['isbn']=$_POST['isbn'];
            $data['quantity']=$_POST['total_quant'];
            $data['pur_rate']=$_POST['pur_rate'];
            $data['sell_rate']=$_POST['sell_rate'];
            $data['shelf_id']=$_POST['shelf_id'];
            $data['supplier_id']=1;
         
        if (isset($_POST['id']) && $_POST['id'])//update
            {
                $id=$_POST['id']; 
                echo $this->mdl_book_details->update_data($id,$data); die();
            }
            else //add
            {
                $dd['book_id']=$this->mdl_book_details->add($data);
               foreach ($_POST['search_id'] as $s){
                   $dd['search_id']=$s;
                   $a=$this->db->insert('book_tag',$dd);
               }
               echo 1;
            }
        }
        else
            echo validation_errors();
}
    
    function view()
    {
        $where=null;
        if (isset($_GET['id']))
            $where['id']=$_GET['id'];
    
        if (isset($_GET['data']))
            $select=$_GET['data'];
        else $select="*";
         
        $return=$this->mdl_book_details->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
  
          
}
?>