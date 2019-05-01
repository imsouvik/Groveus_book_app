<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_profile extends MX_Controller
{
    //wGtRkO8VoEyUjS
    function __construct()
    {
        parent::__construct();
        $this->load->model('mdl_admin');
        $this->db->query("CREATE TABLE IF NOT EXISTS `admin_profile` (
  `id` int(11) NOT NULL auto_increment,
  `business_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `logo` text NOT NULL,
  `phone` int(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gst_no` int(50) NOT NULL,
  `bank_acc` int(50) NOT NULL,
  `ifsc_code` int(50) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `whatsapp` int(12) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `gplus` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;");
       
    }
    function index()
    {
        $this->load->view('form');
    }
    function add()
    {
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules("name","Name","required|trim");
        $this->form_validation->set_rules("username","UserName","required|trim|is_unique[users.username]");
        $this->form_validation->set_rules("password","Password","required|trim");
        $this->form_validation->set_rules("business_name","Business Name","required|trim");
        $this->form_validation->set_rules("admin_email","Email","required|trim");
        $this->form_validation->set_rules("phone","Phone","required|numeric|trim");
        $this->form_validation->set_rules("address","Address","required|trim");
        $this->form_validation->set_rules("gst_no","Gst No","required|trim");
        $this->form_validation->set_rules("bank_acc","Bank Ac No","required|numeric|trim");
        $this->form_validation->set_rules("ifsc_code","Ifsc Code","required|trim");
        if ($this->form_validation->run()==TRUE)
        {
            $data['name']=$_POST['name'];
            $data['username']=$_POST['username'];
            $data['password']=md5($_POST['password']);
            $data['business_name']=$_POST['business_name'];
            $data['admin_email']=$_POST['admin_email'];
            $data['phone']=$_POST['phone'];
            $data['address']=$_POST['address'];
            $data['gst_no']=$_POST['gst_no'];
            $data['ifsc_code']=$_POST['ifsc_code'];
            $data['bank_acc']=$_POST['bank_acc'];
            
            
        if (isset($_POST['id']) && $_POST['id'])//update
            {
                $id=$_POST['id']; 
                echo $this->mdl_admin->update_data($id,$data); die();
            }
            else //add
            {
                
               echo $this->mdl_admin->add($data);
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
         
        $return=$this->mdl_admin->view_data($where,$select);
        $this->output->set_content_type('application/json')->set_output(json_encode($return->result_array()));
    } 

}
?>