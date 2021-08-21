<!--
    /*
    * Evaluation
    * Controller for Evaluation module
    * @input -
    * @output -
    * @author Phatchara Khongthandee and Pontakon Mujit 
    * @Create date 2564-08-14
    * @Update date 2564-08-15
    * @Update date 2564-08-17
    * @Update date 2564-08-18
    * @Update date 2564-08-19
    */
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

    public function __construct()
    {
        parent::__construct();
    }

    /*
	* show_evaluation
	* แสดงหน้าจอ v_evaluation
	* @input  -
	* @output  Evaluation list
	* @author  Phatchara Khongthandee and Pontakon Mujit
	* @Create  Date 2564-08-14
    * @Update  Date 2564-08-15
    * @Update  Date 2564-08-16
    * @Update  Date 2564-08-17
    * @Update  Date 2564-08-19
	*/
    function show_evaluation()
    {
        $id_ass = $_SESSION['UsEmp_ID'];
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_all'] = $this->pef->get_all_list($id_ass)->result(); //คืนค่าชื่อกรรมการ ชื่อกลุ่ม วันที่ประเมิน จำนวนNominee ชื่อ Nominee ตำแหน่ง แผนก Promote to
        $this->output('consent/v_evaluation', $data);
    } // function show_evaluation

    /*
	* show_evaluation_amsssv_mtssp
	* แสดงหน้าจอ Evaluation Form Promote to AM,Senior Staff,Supervisor
	* @input   id, emp_id
	* @output  แสดงหน้าจอ Evaluation Form Promote to AM,Senior Staff,Supervisor
	* @author  Phatchara Khongthandee and Pontakon Mujit
	* @Create  Date 2564-08-14
    * @Update  Date 2564-08-15
    * @Update  Date 2564-08-16
    * @Update  Date 2564-08-17
    * @Update  Date 2564-08-19
	*/

    function show_evaluation_amsssv_mtssp($id, $emp_id, $position, $grn_emp_id)
    {
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_ass'] = $this->pef->get_group_assessor($id)->result();
        $data['ev_gno'] = $this->pef->get_group_nominee($grn_emp_id)->result();
        $data['ev_no'] = $this->pef->get_nominee($grn_emp_id)->result();
        $data['ev_file'] = $this->pef->get_file_present_nominee($grn_emp_id)->result();
        $data['arr_dis'] = $this->pef->get_all_form_amsssv_mtssp($position)->result();
        $data['pos_pos'] = $this->pef->get_position($position)->row();
        $this->output('consent/v_evaluation_amsssv_mtssp', $data);
    } // function show_evaluation_amsssv_mtssp

    /*
	* show_evaluation_g_agm_gm
	* แสดงหน้าจอ Evaluation Form Promote to AM,Senior Staff,Supervisor
	* @input  id, emp_id, position, status
	* @output แสดงหน้าจอ Evaluation Form Promote to T2 T3 & T4
	* @author Phatchara Khongthandee and Pontakon Mujit
	* @Create Date 2564-08-14
    * @Update Date 2564-08-15
    * @Update Date 2564-08-16
    * @Update Date 2564-08-17
    * @Update Date 2564-08-19
	*/
    function show_evaluation_g_agm_gm($id, $emp_id, $position, $status, $grn_emp_id)
    {
        $this->load->model('M_pef_evaluation', 'pef');
        $id_r = $this->pef->get_ase_id($id)->row();

        $id_ase = $id_r->ase_id;
        $data['ev_ass'] = $this->pef->get_group_assessor($id)->result();
        $data['ev_gno'] = $this->pef->get_group_nominee($grn_emp_id)->result();
        $data['ev_no'] = $this->pef->get_nominee($grn_emp_id)->result();
        $data['ev_file'] = $this->pef->get_file_present_nominee($grn_emp_id)->result();
        $data['arr_dis'] = $this->pef->get_all_form_m_agm_gm($position)->result();
        $data['pos_pos'] = $this->pef->get_position($position)->row();
        if ($status == 0) {
            $data['arr_point'] = $this->pef->get_point_list($id_ase, $emp_id)->result();
            $data['arr_per'] = $this->pef->get_performance($id_ase, $grn_emp_id)->result();
        }
        $this->output('consent/v_evaluation_m_agm_gm', $data);
        // // print_r($data['arr_point']);
        // echo $id_ase;
        // echo '   ';
        // echo $emp_id;
        // echo '   ';
        // echo $id;
    } // function show_evaluation_m_agm_gm


    /*
	* insert_evaluation_form
	* insert evaluation form to database
	* @input  id, emp_id, position, status
	* @output -
	* @author Phatchara Khongthandee and Pontakon Mujit
	* @Create Date 2564-08-14
    * @Update Date 2564-08-15
    * @Update Date 2564-08-16
    * @Update Date 2564-08-17
    * @Update Date 2564-08-19
	*/
    function insert_evaluation_form()
    {
        // echo "<pre>";
        //     print_r($_POST);
        // echo "</pre>";
        $date = date("Y-m-d");
        $id = $_SESSION['UsEmp_ID'];
        $this->load->model('Da_pef_evaluation', 'per');
        $this->per->per_q_and_a = $this->input->post('QnA');
        $this->per->per_comment = $this->input->post('comment');
        $this->per->per_date = $date;
        $this->per->per_ase_id = $this->input->post('ase_id');
        $this->per->per_emp_id = $this->input->post('emp_id');
        $emp = $this->input->post('emp_id');
        $this->load->model('M_pef_evaluation', 'pef');

        $this->per->ptf_point = $this->input->post('form');
        $this->per->ptf_date = $date;
        $this->per->ptf_ase_id = $this->input->post('ase_id');
        $this->per->ptf_for_id = $this->input->post('for_id[]');
        $this->per->ptf_emp_id = $this->input->post('emp_id');
        $this->per->insert_performance_form();
        $max = $this->pef->get_point()->row();
        $this->per->ptf_per_id = $max->max_id;
        $this->per->insert_point();

        $data['get_group'] = $this->pef->get_group_nominee($emp);
        
        print_r($data['get_group']->result());
        $this->per->grn_emp_id = $emp;
        
        if ($get_group->grn_status == -1) {
            $this->per->grn_status = 0;
        } else if ($get_group->grn_status == 0) {
            $this->per->grn_status = 3;
        }
        $group = $get_group->grp_id;
        $this->per->grp_id = $group;
        $this->per->update_status_used($group);
        $this->per->update_status();
        $this->per->update_status_group();

        redirect('Evaluation/Evaluation/show_evaluation');
    }
}
