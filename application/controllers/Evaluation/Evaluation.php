<!--
    Check_schedule
    Controller for check schedule module
    @input -
    @output -
    @author Phatchara and Pontakon 
    Create date 18/7/2564 
    Update date 25/7/2564
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
        $id_ss = '00279';
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_ass'] = $this->pef->get_assessor($id_ss)->result(); //คืนค่าชื่อกรรมการ ชื่อกลุ่ม วันที่ประเมิน จำนวนNominee ชื่อ Nominee ตำแหน่ง แผนก Promote to
        // $data['ev_group'] = $this->pef->get_group($id)->result(); //คืนค่าชื่อกลุ่ม วันที่ประเมิน
        // $data['ev_groupno'] = $this->pef->get_group_nominee($id)->result();//คืนค่าชื่อกลุ่ม วันที่ประเมิน
        // $data['emp'] = $this->pef->get_nominee($id = 1)->result();//คืนค่าชื่อ Nominee ชื่อกลุ่ม ตำแหน่ง แผนก
        $this->output('consent/v_evaluation', $data);
    }// function show_evaluation

    /*
	* show_evaluation_mts
	* แสดงหน้าจอ v_evaluation_mts
	* @input  -
	* @output   
	* @author 	Phatchara Khongthandee   
	* @Create Date 13/08/2564 
    * @author   Pontakon Mujit
    * @Update Date 25/7/2564
	*/
    function show_evaluation_mts()
    {
        $id_ss = '00279';
        $position="T4";
        $data['arr_dis'] = $this->pef->get_all_dis_maneger($position)->result();
        $this->load->model('M_pef_evaluation', 'pef');
        $data['ev_ass'] = $this->pef->get_assessor($id_ss)->result();
        $this->output('consent/v_evaluation_mts');
    }// function show_evaluation_mts

    function show_evaluation_test()
    {
        $id_ss = '00279';
        $position="T4";
        $this->load->model('M_pef_evaluation', 'pef');
        // $data['ev_ass'] = $this->pef->get_assessor($id_ss)->result();
        $data['arr_dis'] = $this->pef->get_all_dis_maneger($position)->result();
        $this->output('consent/v_evaluation_test', $data);
    }// function show_evaluation_mts

}