<!--
    History
    Controller for history schedule module
    @input -
    @output -
    @author Phatchara  and Pontakon 
    Create date 18/7/2564  
    Update date 26/7/2564
-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class History extends MainController
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


    function index()
    {
        $this->output('consent/v_history_user');
    }
    
        /*
	* show_history_employee
	* เรียกหน้าจอ v_history_user
	* @input 	-
	* @output 	หน้าจอประวัติใบคำขอ
	* @author 	Phatchara  Khongthandee
	* @Create   Date 18/7/2564   
	* @Update   Date 26/7/2564
	*/
    
    function show_history_employee(){
        $id = $_SESSION['UsEmp_ID'];
        $this->load->model('M_ttp_history', 'ttp');
        $data['em_form'] = $this->ttp->get_history_em($id)->result();
        $data['arr_emp'] = $this->ttp->get_employee($id)->result();
        $this->output('consent/v_history_user', $data);
    }// function show_history_em()
        /*
	* show_history_employee
	* เรียกหน้าจอ show_history_detail
	* @input 	เลขใบคำขอ
	* @output 	หน้าจอรายละเอียดประวัติใบคำขอ
	* @author 	Phatchara  Khongthandee
	* @Create   Date 18/7/2564   
    * @author 	Pontakon Munjit
	* @Update   Date 26/7/2564
	*/
    public function show_history_detail($id)
	{
        $id_emp = $_SESSION['UsEmp_ID'];
        $this->load->model('M_ttp_history', 'ttp');
        $data['arr_emp'] = $this->ttp->get_employee($id_emp)->result();
        $data['arr_form'] = $this->ttp->get_by_id($id)->row();
        $data['arr_his'] = $this->ttp->get_history_approve($id)->row();
        $data['arr_his_hr'] = $this->ttp->get_history_approve_hr($id)->row();
        $data['arr_his_ap'] = $this->ttp->get_history_approve_plant($id)->row();
        $data['arr_list'] = $this->ttp->get_form_list()->row();
        $data['arr_file'] = $this->ttp->get_form_file($id)->result();
        $this->output('consent/v_history_detail', $data);
	}// function show_history_detail()

}