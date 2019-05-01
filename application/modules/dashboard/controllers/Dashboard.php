<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends MX_Controller
{
    //wGtRkO8VoEyUjS   
    function index()
    {
        
    }
    function admin()
    {
        $this->load->view('view');
    }
    function fetch_cards_data()
    {
        $data=array(
            "admin_profile"=>$this->db->get('Admin_profile')->num_rows(),
            "assign_group"=>$this->db->get('assign_group')->num_rows(),
            "Book"=>$this->db->get('Book')->num_rows(),
            "genre"=>$this->db->get('genre')->num_rows(),
            "search_category"=>$this->db->get('search_category')->num_rows(),
            "Shelf"=>$this->db->get('Shelf')->num_rows(),
            "supplier"=>$this->db->get('supplier')->num_rows(),
            "users"=>$this->db->get('users')->num_rows(),
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
    
}