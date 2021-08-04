<?php
/*
* Login.php
* Login เข้าสู่ระบบ
* @Niphat Kuhokciw
* @Create Date 2564-07-28
*/
defined('BASEPATH') or exit('No direct script access allowed');

require_once(dirname(__FILE__) . "/../MainController.php");
// require 'CRS_controller.php'เรียกใช้ controller หลัก

class Login extends MainController
{//class Login
    public function __construct()
	{
		parent::__construct();
		$this->load->library('excel');
		date_default_timezone_set('Asia/Bangkok');
	}//function construct

/*
* show_user_login
* show login
* @input -
* @output show display login for user
* @Niphat Kuhokciw
* @Create Date 2564-07-28
*/
    public function show_user_login()
    {//show login
        $this->output_login("login/v_user_login");
    }//end show_user_login

/*
* show_user_home
* show login
* @input Enp_ID
* @output show display home for user
* @Niphat Kuhokciw
* @Create Date 2564-07-28
*/	
	public function show_user_home($Enp_ID)
	{//show home
		$this->load->model('M_ttp_Employee','meng');
		$this->meng->Emp_ID = $Enp_ID;
		$data['Emp_ID'] = $this->meng->get_emp()->row();
		
		$temp = $data['Emp_ID'];
		$this->session->set_userdata('UsEmp_ID', $temp->Emp_ID);
		$this->session->set_userdata('UsName_EN', $temp->Empname_eng." ".$temp->Empsurname_eng);
		$this->session->set_userdata('UsName_TH', $temp->Empname_th." ".$temp->Empsurname_th);
		$this->session->set_userdata('UsDepartment', $temp->Department);
		$this->session->set_userdata('Usrole', $temp->User_Role);
		$this->check_role();
	}//end show_user_home

/*
* login
* Login for user
* @input User_login and Pass_login
* @output -
* @Niphat Kuhokciw
* @Create Date 2564-07-28
*/	
    public function login()
	{//login for user
		$User_login = $this->input->POST('User_login');
		$Pass_login = $this->input->POST('Pass_login');
		
		$this->load->model('M_ttp_login','mlog');

		$userlogin = $this->mlog->check_login($User_login,$Pass_login)->row();
		if(count($userlogin)==1){
			$data = $userlogin;
			echo json_encode($data);
		}else{
			$data = [];
			echo json_encode($data);
		}
	}//end login

/*
* check_role
* check role for user
* @input UsEmp_ID  and Usrole
* @output show display home for role
* @Niphat Kuhokciw
* @Create Date 2564-07-28
*/	
	public function check_role()
    {// check role
        if (!empty($this->session->userdata('UsEmp_ID'))) {
			if($_SESSION['Usrole']==1){
            	redirect('Main/Main/show_main', 'refresh');
			}else if($_SESSION['Usrole']==2){
				redirect('Main/Main/show_main', 'refresh');
			}else if($_SESSION['Usrole']==3){
				redirect('Main/Main/show_main', 'refresh');
			}else if($_SESSION['Usrole']==4){
				redirect('Main/Main/show_main', 'refresh');
			}
        }
        // if
        else {
            redirect('Login/Login/show_user_login', 'refresh');
        }
        // else
    }//end check_role
    
/*
* main
* Login for user
* @input User_login and Pass_login
* @output -
* @Niphat Kuhokciw
* @Create Date 2564-07-28
*/	
    public function logout()
    {//logout to user login page
        $this->session->unset_userdata('UsEmp_ID');
        $this->session->unset_userdata('UsName_EN');
        $this->session->unset_userdata('UsName_TH');
        $this->session->unset_userdata('UsDepartment');
        redirect('Login/Login/show_user_login', 'refresh');
    }//end logout
}//end class Login 