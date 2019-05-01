<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class App extends MX_Controller
{
    function index()
    {
        if ($this->session->userdata('username'))
        {
            $this->load->view('header');
            $this->load->view('navigation');
            $this->load->view('body');
            $this->load->view('footer');
        }
        else redirect('login');
    }
    function login_layout($data)
    {
        $this->load->view('header',$data);
        $this->load->view('body');
        $this->load->view('footer');
    }
    
    function app_main()
    {
		
        if ($this->session->userdata('username'))
        {
            //app
            $this->load->view('main/main.js');
            //controllers
			
                $this->load->view('login/ctrl_login.js');
                 $this->load->view('dashboard/ctrl_dashboard.js');
                 $this->load->view('admin_profile/ctrl_admin.js');
                 $this->load->view('book_details/ctrl_book_details.js');
                 $this->load->view('user/ctrl_user.js');
                 $this->load->view('supplier/ctrl_supplier.js');
                 $this->load->view('shelf/ctrl_shelf.js');
                 $this->load->view('search_category/ctrl_search_category.js');
                 $this->load->view('genre/ctrl_genre.js');
                 $this->load->view('kit_books/ctrl_kit_books.js');
                 $this->load->view('school_master/ctrl_school_master.js');
                 $this->load->view('class_master/ctrl_class_master.js');
                 $this->load->view('kit_assign/ctrl_kit_assign.js');
                 
        }
        
        else redirect('login');
    }
    function pagination()
    {
        $this->load->view('dirPagination.tpl.html');
    }
    function help()
    {
        $this->load->view('help/help');
    }
    
}