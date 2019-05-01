<?php if ( !defined('BASEPATH')) exit('No direct script access allowed');
class Mdl_login extends CI_Model
{
    
	public function validate()
	{
	    $where=array(
	        "username"=>$this->input->post('user'),
	        "password"=>md5($this->input->post('pass')),
	    );
	    
	    $query=$this->db->where($where)->get('admin_profile');
	    if($query->num_rows()>0){
	        $res=$query->result();
	        $ses_data=array(
	            'name'=>$res[0]->name,
	            'username'=>$res[0]->username,
	            'user_id'=>$res[0]->id,
	            //'type'=>$res[0]->usertype,
	        );
	        $this->session->set_userdata($ses_data);
	        return true;
	    }else{
	        return false;
	    }
	}
    function change_pwd()
	{
		$where['username']=$this->session->userdata('username');
		$old_password=$_POST['currentpass'];
		$new_password=$_POST['newpass'];
		
		$this->load->helper('security');
		$new_pwd=do_hash($new_password,'md5');
		$old_pwd=do_hash($old_password,'md5');
		
		$where['password']=$old_pwd;
		
		$this->db->where($where);
		$query=$this->db->get('login');
		$row = $query->num_rows();
		if($row>0)
		{
			$data=array(
						"password"=>$new_pwd
					);
			$this->db->where($where);
			return $this->db->update('login',$data);
		}
		else
		{
			return false;
		}
	}
	//Copyright @ Groveus (www.groveus.com)
}