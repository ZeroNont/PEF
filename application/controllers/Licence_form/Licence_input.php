<?php
/*
* Licence_input
* Form Management
* @input  Emp_ID,req_start_date,End_date,Requested_date,req_item,req_tel,req_officer,req_reason,req_company_id,req_form_count   
* @output -
* @author Jirayut Saifah
* @Create Date 2564-7-16
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Licence_input extends MainController
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    /*
	* index
	* Show a form to get information 
	* @input 
	* @output employee,plant,company detail
	* @author 	Jirayut Saifah
	* @Create Date 2564-7-16
	*/
    function index()
    {
        $id = $_SESSION['UsEmp_ID'];
        $this->load->model('M_ttp_licence', 'ttp');
        $data['obj_company'] = $this->ttp->get_company()->result();
        $data['obj_plan'] = $this->ttp->get_plant()->result();
        $data['obj_emp'] = $this->ttp->get_employee($id)->result();
        $data['obj_level'] = $this->ttp->get_position_id($id)->result();
        $data['obj_supervisor'] = $this->ttp->get_supervisor()->result();
        $this->load->model('M_ttp_Employee', 'det');
        $data['detail'] = $this->det->get_emp_detail($id)->result();
        // print_r($data['obj_supervisor']);
        // print_r($data['detail']);
        // echo $data['detail'][0]->Emp_ID;
        $this->output('consent/v_licence_form', $data);
    }
    /*
	* edit_form
	* show form detail 
	* @input  Form_ID
	* @output 
	* @author 	Jirayut Saifah
	* @Create Date 2564-7-22
	*/
    function edit_form($id)
    {
        // echo $id;
        $k = $_SESSION['UsEmp_ID'];
        $this->load->model('M_ttp_licence', 'ttp');
        $data['obj_form'] = $this->ttp->get_form_by_id($id)->result();
        $data['obj_file'] = $this->ttp->get_file_by_id($id)->result();
        $data['obj_company'] = $this->ttp->get_company()->result();
        $data['obj_com'] = $this->ttp->get_company_by_id($id)->result();
        $data['obj_plan'] = $this->ttp->get_plant()->result();
        $data['obj_level'] = $this->ttp->get_position_id($k)->result();
        $data['obj_app'] = $this->ttp->get_plant_by_id($id)->result();
        $data['obj_supervisor'] = $this->ttp->get_supervisor()->result();

        // echo $id;
        // print_r($data['obj_file']);
        $data['obj_sup'] = $this->ttp->get_supervisor_by_id($id)->result();
        // print_r($data);
        $this->load->model('M_ttp_Employee', 'det');
        $data['detail'] = $this->det->get_emp_detail($k)->result();
        $this->output('consent/v_form_edit', $data);
    }
    /*
	* insert
	* insert form data into model
	* @input  Emp_ID,req_start_date,End_date,Requested_date,req_item,req_tel,req_officer,req_reason,req_company_id,req_form_count
	* @output 
	* @author 	Jirayut Saifah
	* @Create Date 2564-7-16
	*/


    function insert()
    {
        $date = date("Y-m-d");
        $status = 1;
        $j = 1;
        $id = $_SESSION['UsEmp_ID'];
        $Layout_name =  $_FILES['Layout']['name'];
        $tmp_Layout =  $_FILES['Layout']['tmp_name'];
        $Plan_name =  $_FILES['Plan']['name'];
        $tmp_Plan =  $_FILES['Plan']['tmp_name'];

        $this->load->model('Da_ttp_licence', 'ttp');
        $this->ttp->req_emp_id = $id;
        // $i = $this->input->post('Emp_ID');
        $this->ttp->req_item = $this->input->post('Item');
        $this->ttp->req_start_date = $this->input->post('Start_date');

        $this->ttp->req_requested_date = $date;
        $this->ttp->req_reason = $this->input->post('Reason');
        $this->ttp->req_officer = $this->input->post('Officer');
        $this->ttp->req_tel = $this->input->post('Tell');
        $this->ttp->app_supervisor_id = $this->input->post('Supervisor');
        $this->ttp->req_company_id = $this->input->post('Company_ID');
        $this->ttp->app_approve_plant_id = $this->input->post('Approve_Plant');
        $this->ttp->req_form_count = $j;
        $this->ttp->req_status = $status;
        $set_date =  $this->input->post('Start_date');
        $add_date =  $this->input->post('End_date');
        //บวกวันที่ 
        $date1 = str_replace('-', '/', $set_date);
        $Update = date('Y-m-d', strtotime($date1 . "+" . $add_date . " days"));
        $this->ttp->req_end_date = $Update;

        $this->ttp->insert_form();
        $this->ttp->insert_approve();


        move_uploaded_file($tmp_Layout, 'assets/file/Layout/' . $Layout_name);
        $this->ttp->fil_layout_location = $Layout_name;
        move_uploaded_file($tmp_Plan, 'assets/file/Plan/' . $Plan_name);
        $this->ttp->fil_plan_location = $Plan_name;
        $this->ttp->insert_file();

        // echo  $id;
        $this->load->model('M_ttp_licence', 'get');
        $data['obj_status'] = $this->get->get_status($id)->result();
        // // print_r($_SESSION['Emp_ID']);
        $data['form'] = $this->get->get_form_id()->result();
        $form_id = $data['form'][0]->req_form_id;
        $this->ttp->sch_form_id = $data['form'][0]->req_form_id;
        $this->ttp->sch_end_date = $data['form'][0]->req_end_date;
        $this->ttp->sch_start_date = $data['form'][0]->req_start_date;
        $this->ttp->insert_date($form_id);
        $this->output('consent/v_check_status', $data);
        // $this->output('consent/v_check_status', $i);
        // redirect('licence_form/licence_input/index');
    }
    /*
	* edit
	* update form data into model 
	* @input  Emp_ID,req_start_date,End_date,Requested_date,req_item,req_tel,req_officer,req_reason,req_company_id,req_form_count
	* @output 
	* @author 	Jirayut Saifah
	* @Create Date 2564-7-22
	*/
    function edit()
    {
        $date = date("Y-m-d");


        $id = $_SESSION['UsEmp_ID'];
        $Layout_name =  $_FILES['Layout']['name'];
        $tmp_Layout =  $_FILES['Layout']['tmp_name'];
        $Plan_name =  $_FILES['Plan']['name'];
        $tmp_Plan =  $_FILES['Plan']['tmp_name'];
        $num = 1;
        $this->load->model('Da_ttp_licence', 'ttp');
        $this->ttp->req_emp_id = $id;
        $j =   $this->input->post('count');
        $k  = $this->input->post('form');
        // $i = $this->input->post('Emp_ID');
        $this->ttp->req_item = $this->input->post('Item');
        $this->ttp->req_start_date = $this->input->post('Start_date');
        $this->ttp->sch_start_date = $this->input->post('Start_date');
        // echo    $this->input->post('form');
        $this->ttp->req_requested_date = $date;
        $this->ttp->req_reason = $this->input->post('Reason');
        $this->ttp->req_officer = $_SESSION['UsEmp_ID'];
        $this->ttp->req_tel = $this->input->post('Tell');
        $this->ttp->app_supervisor_id = $this->input->post('Supervisor');
        $this->ttp->req_company_id = $this->input->post('Company_ID');
        $this->ttp->app_approve_plant_id = $this->input->post('Approve_Plant');
        $this->ttp->req_form_count =   $j + 1;
        $set_date =  $this->input->post('Start_date');
        $add_date =  $this->input->post('End_date');
        //บวกวันที่ 
        $date1 = str_replace('-', '/', $set_date);
        $Update = date('Y-m-d', strtotime($date1 . "+" . $add_date . " days"));
        $this->ttp->req_end_date = $Update;
        $this->ttp->sch_end_date = $Update;
        $this->ttp->req_status = 1;
        $this->ttp->req_form_id = $this->input->post('form');
        $this->ttp->update_date($k);
        $this->ttp->status_update($k);
        $this->ttp->update_form($k);
        $this->ttp->update_approve($k);
        move_uploaded_file($tmp_Layout, 'assets/file/Layout/' . $Layout_name);
        $this->ttp->fil_layout_location = $Layout_name;
        move_uploaded_file($tmp_Plan, 'assets/file/Plan/' . $Plan_name);
        $this->ttp->fil_plan_location = $Plan_name;
        $this->ttp->fil_form_id = $this->input->post('from');
        $this->ttp->update_file($k);

        // echo  $id;
        $this->load->model('M_ttp_licence', 'get');
        $data['obj_status'] = $this->get->get_status($id)->result();
        // // print_r($_SESSION['Emp_ID']);
        $this->output('consent/v_check_status', $data);
        // $this->output('consent/v_check_status', $i);
        // redirect('licence_form/licence_input/index');
    }
}
// 