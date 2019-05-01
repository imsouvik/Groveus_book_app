<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Genre extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_genre');
    }
    function index()
    {
        $this->load->view('form');
    }
    function save_data()
    {
  //      print_r($_POST);die();
        $this->load->library('form_validation');
        $this->form_validation->set_rules("genre_name","genre_name","required|trim");
        $this->form_validation->set_rules("description","description","required|trim");
        
        if ($this->form_validation->run()==TRUE)
        {
            
            $data['genre_name']=$_POST['genre_name'];
            $data['description']=$_POST['description'];
         //   print_r($data);die();
            if (isset($_POST['genre_id']) && $_POST['genre_id'])//update
            {
                $where['genre_id']=$_POST['genre_id'];
                echo $this->mdl_genre->update_data($where,$data);
            }
            else //add
            {
                echo $this->mdl_genre->add($data);
            }
        }
        else
            echo validation_errors();
    }
    
    function view_data()
    {
        $where=null;
        if (isset($_GET['genre_id']))
	         $where['genre_id']=$_GET['genre_id'];
        
        if (isset($_GET['data']))
	        $select=$_GET['data'];
	    else $select="*";
	    
	    $return=$this->mdl_genre->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    }
//     function delete_data()
//     {
//          if (isset($_GET['genre_id']) && $_GET['genre_id'])
//         {
//             $where['genre_id']=$_GET['genre_id'];
//             $object=json_encode($this->mdl_genre->view_data($where,"*")->result());
//             $data_title= "Genre  Delete";
            
//             $this->load->module("logs");
//             if ($this->logs->add_data($data_title,$object)) {
//                 echo $this->mdl_genre->delete_data($where);
//             }
//         }
//     }
    function delete_data()
    {
        if (isset($_GET['genre_id']) && $_GET['genre_id'])
        {
            $where['genre_id']=$_GET['genre_id'];
            $object=json_encode($this->mdl_genre->view_data($where,"*")->result());
            $data_title= "Genre  Delete";
            
            $this->load->module("logs");
            if ($this->logs->add_data($data_title,$object)) {
                echo $this->mdl_genre->delete_data($where);
            }
        }
    }
    
    

}
?>