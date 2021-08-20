<!--
    Evaluation
    Controller for Evaluation module
    @input -
    @output -
    @author Phatchara and Pontakon 
    Create date 2564-08-14
    Update date 2564-08-15
    Update date 2564-08-17
    Update date 2564-08-18
    Update date 2564-08-19
-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Evaluation extends MainController
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

    public function __construct(){
        parent::__construct();
    }

    /*
	* show_evaluation
	* แสดงหน้าจอ v_evaluation
	* @input  -
	* @output   
	* @author 	Phatchara Khongthandee and Pontakon Mujit
	* @Create Date 2564-08-14
    * @Update Date 2564-08-15
    * @Update Date 2564-08-16
    * @Update Date 2564-08-17
    * @Update Date 2564-08-19
	*/
    function show_evaluation()
    {
        $id_ass = $_SESSION['UsEmp_ID'];
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_all'] = $this->pef->get_all_list($id_ass)->result();//คืนค่าชื่อกรรมการ ชื่อกลุ่ม วันที่ประเมิน จำนวนNominee ชื่อ Nominee ตำแหน่ง แผนก Promote to
        $this->output('consent/v_evaluation', $data);
    }// function show_evaluation

    /*
	* show_evaluation_T6
	* แสดงหน้าจอ Evaluation Form Promote to AM,Senior Staff,Supervisor
	* @input  $id, $emp_id
	* @output   Evaluation Form Promote to T6
	* @author 	Phatchara Khongthandee and Pontakon Mujit
	* @Create Date 2564-08-14
    * @Update Date 2564-08-15
    * @Update Date 2564-08-16
    * @Update Date 2564-08-17
    * @Update Date 2564-08-19
	*/
    function show_evaluation_AMSSSV_MTSSP($id, $emp_id, $position)
    {
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_ass'] = $this->pef->get_group_assessor($id)->result();
        $data['ev_gno'] = $this->pef->get_group_nominee($emp_id)->result();
        $data['ev_no'] = $this->pef->get_nominee($emp_id)->result();
        $data['ev_file'] = $this->pef->get_file_present_nominee($emp_id)->result();
        $data['arr_dis'] = $this->pef->get_all_form_AMSSSV_MTSSP($position)->result();
        $data['pos_pos'] = $this->pef->get_position($position)->row();
        $this->output('consent/v_evaluation_AMSSSV_MTSSP', $data);
    }// function show_evaluation_T6

    /*
	* show_evaluation_T5
	* แสดงหน้าจอ Evaluation Form Promote to AM,Senior Staff,Supervisor
	* @input  -
	* @output   
	* @author 	Phatchara Khongthandee and Pontakon Mujit
	* @Create Date 2564-08-14
    * @Update Date 2564-08-15
    * @Update Date 2564-08-16
    * @Update Date 2564-08-17
    * @Update Date 2564-08-19
	*/
    function show_evaluation_M_AGM_GM($id, $emp_id, $position)
    {
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_ass'] = $this->pef->get_group_assessor($id)->result();
        $data['ev_gno'] = $this->pef->get_group_nominee($emp_id)->result();
        $data['ev_no'] = $this->pef->get_nominee($emp_id)->result();
        $data['ev_file'] = $this->pef->get_file_present_nominee($emp_id)->result();
        $data['arr_dis'] = $this->pef->get_all_form_M_AGM_GM($position)->result();
        $data['pos_pos'] = $this->pef->get_position($position)->row();
        $this->output('consent/v_evaluation_M_AGM_GM', $data);
    }// function show_evaluation_T5

    function insert_evaluation_form()
    {
        echo "<pre>";
            print_r($_POST);
        echo "</pre>";
        $date = date("Y-m-d");
        $id = $_SESSION['UsEmp_ID'];
        $this->load->model('Da_pef_evaluation', 'per');
        $this->per->per_q_and_a = $this->input->post('QnA');
        $this->per->per_comment = $this->input->post('comment');
        $this->per->per_date = $date;
        $this->per->per_ase_id = $this->input->post('ase_id');
        $this->per->per_emp_id = $this->input->post('emp_id');
        $emp = $this->per->per_emp_id;
        $this->load->model('M_pef_evaluation', 'pef');
        
        $this->per->ptf_point = $this->input->post('form');
        $this->per->ptf_date = $date; 
        $this->per->ptf_ase_id = $this->input->post('ase_id');
        $this->per->ptf_for_id = $this->input->post('for_id[]');
        $this->per->ptf_emp_id = $this->input->post('emp_id');
        $this->per->insert_performance_form();
        $max = $this->pef->get_point()->row();
        $this->per->ptf_per_id = $max->max_id;
        print_r( $this->per->ptf_per_id);
        $this->per->insert_point();
        $this->per->grn_emp_id = $emp;
        $this->per->grn_status = 1;
        $this->per->update_status();

        redirect('Evaluation/Evaluation/show_evaluation');
    }

}