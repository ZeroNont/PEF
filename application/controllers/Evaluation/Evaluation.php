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

    /*
	* show_evaluation
	* แสดงหน้าจอ v_evaluation
	* @input  -
	* @output   
	* @author 	Phatchara Khongthandee   
	* @Create Date 13/08/2564 
    * @author   Pontakon Mujit
    * @Update Date 25/7/2564
	*/
    public function __construct(){
        parent::__construct();
    }

    function show_evaluation()
    {
        $id_ass = '00066';
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_ass'] = $this->pef->get_assessor($id_ass)->result(); //คืนค่าชื่อกรรมการ ชื่อกลุ่ม วันที่ประเมิน จำนวนNominee ชื่อ Nominee ตำแหน่ง แผนก Promote to
        $data['ev_no'] = $this->pef->get_nominee_list($id_ass)->result();
        $this->output('consent/v_evaluation', $data);
    }// function show_evaluation

    /*
	* show_evaluation_T6
	* แสดงหน้าจอ Evaluation Form Promote to AM,Senior Staff,Supervisor
	* @input  -
	* @output   
	* @author 	Phatchara Khongthandee and Pontakon Mujit
	* @Create Date 2564-08-14
    * @Update Date 2564-08-15
    * @Update Date 2564-08-16
    * @Update Date 2564-08-17
	*/
    function show_evaluation_T6($id, $emp_id)
    {
        $position="T6";
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_ass'] = $this->pef->get_group_assessor($id)->result();
        $data['ev_gno'] = $this->pef->get_group_nominee($emp_id)->result();
        $data['ev_no'] = $this->pef->get_nominee($emp_id)->result();
        $data['ev_file'] = $this->get_file_present_nominee($emp_id)->result();
        $data['arr_dis'] = $this->pef->get_all_form_T5($position)->result();
        $data['pos_pos'] = $this->pef->get_position($position)->row();
        $this->output('consent/v_evaluation_T6', $data);
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
	*/
    function show_evaluation_T5($id, $emp_id)
    {
        $position = "T5";
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_ass'] = $this->pef->get_group_assessor($id)->result();
        $data['ev_gno'] = $this->pef->get_group_nominee($emp_id)->result();
        $data['ev_no'] = $this->pef->get_nominee($emp_id)->result();
        $data['ev_file'] = $this->pef->get_file_present_nominee($emp_id)->result();
        $data['arr_dis'] = $this->pef->get_all_form_T5($position)->result();
        $data['pos_pos'] = $this->pef->get_position($position)->row();
        $this->output('consent/v_evaluation_T5', $data);
    }// function show_evaluation_T5

}