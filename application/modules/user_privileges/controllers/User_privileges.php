<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_privileges extends MX_Controller
{
    private $type;
    function __construct()
	{
		parent::__construct();
		$this->load->model('mdl_user_privileges');
		$this->type=$this->session->userdata('type');
		if ($this->type!="A")
		{
		    echo "<br><pre><h3 align='center'>Sorry! you are not an Administrator...</h3></pre>";
		    die();
		}
	}
	function index(){
	    $this->load->view('index');
	}
	
	function check_privilege($module,$function)
	{
// 	    if ($this->session->userdata('oldsession') && $function!='view_data'){
// 	        $data=array(
// 	            "type"=>1,
// 	            "error"=>"Old Session changes are not allowed. You are logged in the Old Session.<br><small>Change to new session from the top right corner dowpdown menu."
// 	        );
// 	        echo json_encode($data);die();
// 	    }
        $where=array(
            "com_id"=>$this->data['com_id'],
            "user_id"=>$this->session->userdata('user_id'),
            "module"=>$module,
            $function=>1
        );
//         print_r($where);die();
        $this->db->where($where);
        if($this->db->get('user_privileges')->num_rows()<1)
        {
            if ($function=='view_data') {
                echo json_encode(array());die();
            }else{
                echo "Privilege Not Assigned";die();
            }
        }
        else
            return true;
	}	
	
	
	function privileges_module()//static modules assigned for privileges
	{
	    return $module=array(
	        "album"=>"Albums",
	        "blocks"=>"Blocks",
	        "category"=>"Category",
	        "subcategory"=>"Sub Category",
	        "change_logo"=>"Change Logo",
	        "filemanager"=>"File Manager",
	        "formbuilder"=>"Supplier",
	        "gallery"=>"Vehicle Master",
	        "vehicle_reg"=>"Vehicle Registration",//
	        "weight_details"=>"Weight Entry",
	        "incentives"=>"Incentives",
	    );
	}
	
	function view_privileges_json(){
	    $this->output->set_content_type('application/json')->set_output(json_encode($this->privileges_module()));
	}
	
    function add_default_privileges($user_id,$usertype="U")
    {
        if ($usertype=="A")
            return $this->admin_default_privileges($user_id);
        else 
            return $this->user_default_privileges($user_id);
    }
    function user_default_privileges($user_id)
    {
        $data['com_id']=$this->data['com_id'];
        $data['user_id']=$user_id;
        $module=$this->privileges_module();
        
        foreach ($module as $mod)
        {
            $data['module']=$mod;
            $this->mdl_user_privileges->add_data($data);
        }
        return true;
    }
    function admin_default_privileges($user_id)
    {
        $data['com_id']=$this->data['com_id'];
        $data['user_id']=$user_id;
        $module=$this->privileges_module();
        
        foreach ($module as $mod=>$val)
        {
            $data['add']=1;
            $data['view']=1;
            $data['update']=1;
            $data['delete']=1;
            $data['module']=$mod;
            $this->mdl_user_privileges->add_data($data);
        }
        return true;
    }

	function update_data()
	{
	    $data['user_id']=$_POST['user_id'];
	    $data['com_id']=$this->data['com_id'];
	    
	    $result = $this->mdl_user_privileges->view_data($data);
	    if($result->num_rows()>0)
	    {
    	    foreach ($result->result() as $row)
    	    {
    	        $id=$row->auto_id;
    	        //add_data
    	        if (isset($_POST["add$id"]))
    	            $add_data=array(
    	                "add"=>1
    	            );
    	        else
    	            $add_data=array(
    	                "add"=>0
    	            );
    	        //view_data
	            if (isset($_POST["view$id"]))
	                $view_data=array(
	                    "view"=>1
	                );
                else
                    $view_data=array(
                        "view"=>0
                    );
                //update_data
                if (isset($_POST["update$id"]))
                    $update_data=array(
                        "update"=>1
                    );
                else
                    $update_data=array(
                        "update"=>0
                    );
                //delete_data
                if (isset($_POST["delete$id"]))
                    $delete_data=array(
                        "delete"=>1
                    );
                else
                    $delete_data=array(
                        "delete"=>0
                    );
    	        $data=array_merge($add_data,$update_data,$view_data,$delete_data);//merging all the values of array
    	        $where['auto_id']=$id;
    	        $where['user_id']=$_POST['user_id'];
    	        if($this->mdl_user_privileges->update_data($where,$data)==false)
    	        {
    	            $data=array(
    	                "type"=>1,
    	                "error"=>"Oops Process Terminated due to some technical issue..."
    	            );
    	            echo json_encode($data);
    	            die(0);
    	        } 
    	    }
    	    $data=array(
    	        "type"=>0,
    	        "error"=>"<img src='".base_url('assets/icons/ok.svg')."' height=20px ><span style='display:inline-block'> Privileges Assigned Successfully.
	             </span><br><br>"
    	    );
	    }
	    else
	    {
	        $data=array(
	            "type"=>1,
	            "error"=>"User not Found for this School ID!!!"
	        );
	    }
	    echo json_encode($data);
	}
	function view_data()
	{   
	    if (isset($_GET['id']) && $_GET['id']){
	        $data['user_id']=$_GET['id'];
	        $result = $this->mdl_user_privileges->view_data($data);
	        $this->output->set_content_type('application/json')->set_output(json_encode($result->result_array()));
	    }
	}
	function check_module_privileges($module)//based on view_data status
	{
	    $data['module']=$module;
	    $data['view_data']=1;
	    $data['username']=$this->session->userdata('username');
	    return $this->mdl_user_privileges->check_module_privileges($data);
	}
}
?>