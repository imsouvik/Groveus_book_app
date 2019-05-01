<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends MX_Controller 
{
 	function index()
	{
		$data['heading']="LOGIN";
		$data['title']="Login Section ";
		$this->load->view('login',$data);
	}
	function check_valid_session()
	{
	    if($this->session->userdata('username'))
	        echo "1";
	    else echo "0";
	}
	function check()
	{
		$this->load->library('form_validation');
	
		$this->form_validation->set_rules('user','Username','trim|required');
		$this->form_validation->set_rules('pass','Password','trim|required|min_length[6]');
	
		if($this->form_validation->run()==true)
		{
			$this->load->model('mdl_login');
			if($this->mdl_login->validate()==true)
			{
				redirect('app');
			}
			else
			{
				$data['msg']= "Unauthorise User !!! ";
				$data['heading']="LOGIN";
        		$data['title']="Login Section ";
        		$this->load->view('login',$data);
			}
		}
		else
		{
			$this->index();
		}
	}
	
	
	function change_password()
	{
	   $this->load->view('account');
	}
	
    function change_password_submit()
	{
// 	    echo 34343;die();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('currentpass','Current Password','required|trim');
		$this->form_validation->set_rules('newpass','New Password','required|trim|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('cmpassword','Confirm new Password','required|trim|matches[newpass]');
		
		if($this->form_validation->run()==True)
		{
			$this->load->model('mdl_login');
			if($this->mdl_login->change_pwd()==TRUE)
			{
				echo "<div class='alert alert-success'>Password Changed Successfully</div>";die();
			}
			else
			{
				echo "<div class='alert alert-danger'>Unauthorise User !!!</div>";
			}
		}
		else
		{
			echo "<div class='alert alert-danger'>".validation_errors()."</div>";
		}
	
	}
	 function logout()
	 {	
		$this->session->set_userdata('');
		$this->session->sess_destroy();
		redirect('login');
	}
	//Copyright @ Groveus (www.groveus.com)
}


