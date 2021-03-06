<!--
    /*
    * Evaluation
    * Controller for Evaluation module
    * @author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-14
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
        $data['check'] = $this->pef->get_file_nominee()->result();
        $data['ev_all'] = $this->pef->get_all_list($id_ass)->result(); //คืนค่าชื่อกรรมการ ชื่อกลุ่ม วันที่ประเมิน จำนวนNominee ชื่อ Nominee ตำแหน่ง แผนก Promote to
        $data['ev_ass'] = $this->pef->get_ase_id($id_ass)->result();
        $data['ev_per'] = $this->pef->get_performance_form()->result();
        // echo "<pre>";
        //     print_r($data['ev_all']);
        // echo "</pre>";
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

    function show_evaluation_amsssv_mtssp($id, $emp_id, $position, $status, $grn_emp_id)
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
    function show_evaluation_g_agm_gm($id, $emp_id, $position, $status, $grn_emp_id,$date)
    {
        $this->load->model('M_pef_evaluation', 'pef');
        $id_r = $this->pef->get_ase_id($id)->row();

        $id_ase = $id_r->ase_id;
        $data['ev_ass'] = $this->pef->get_group_assessor($id)->result();
        $data['ev_gno'] = $this->pef->get_group_nominee_final($grn_emp_id,$date)->result();
        $data['ev_no'] = $this->pef->get_nominee($grn_emp_id)->result();
        $data['ev_file'] = $this->pef->get_file_present_nominee($grn_emp_id)->result();
        $data['arr_dis'] = $this->pef->get_all_form_m_agm_gm($position)->result();
        $data['pos_pos'] = $this->pef->get_position($position)->row();
        if ($status == 3) {
            
            $data['arr_per'] = $this->pef->get_performance($id_ase, $grn_emp_id,$date)->result();
            $per_get = $this->pef->get_performance($id_ase, $grn_emp_id,$date)->result();
            $per  = $per_get[0]->per_id;
            
            $data['arr_point'] = $this->pef->get_point_list( $per)->result();
            
        }
        $this->output('consent/v_evaluation_m_agm_gm', $data);
        
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
        $this->per->ptf_emp_id = $this->input->post('nor_id');
        $this->per->insert_performance_form();
        $max = $this->pef->get_point()->row();
        $this->per->ptf_per_id = $max->max_id;
        // print_r( $this->per->ptf_per_id);
        $this->per->insert_point();
        $this->per->grn_emp_id = $emp;
        $status = $this->input->post('grn_status');
        
            $this->per->grn_status = 0;

        $get_group['data']=$this->pef->get_group_nominee($emp)->result();
        $group= $get_group['data'][0]->grp_id;
        $this->per->update_status_used($group);
        $this->per->update_status();

        redirect('Evaluation/Evaluation/show_evaluation');
    }
}
