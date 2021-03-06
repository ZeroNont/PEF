<?php
/*
* Result
* Controller Result
* @author Apinya Phadungkit
* @Create Date 2564-8-15
* @Update Date 2564-8-16
* @Update Date 2564-8-18
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Result extends MainController
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
    * @input  -   
    * @output show v_request_form.php
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function index()
    {
        $this->output('consent/v_result');
    } // function index()
    public function get_result()
    {
        $date = $this->input->post('date');
        $this->load->model('M_pef_result', 'mpef');
        $this->mpef->gro_ase_id = $_SESSION["UsEmp_ID"];
        $this->mpef->grn_status = 0;
        $this->mpef->grp_date = $date;
        $data = $this->mpef->get_group_date()->result();
        echo json_encode($data);
    }
    /*
    * show_result_list
    * @input  -   
    * @output show v_request_form.php
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    * @Update Date 2564-8-18
    */
    function show_result_list() 
    {
        $this->load->model('M_pef_result', 'mpef');
        $this->mpef->gro_ase_id = $_SESSION["UsEmp_ID"];
        $this->mpef->grn_status = 0;
        $data['arr_gro'] = $this->mpef->get_group()->result();
        $this->output('consent/v_result', $data);

    } //show result list แสดงผลการประเมินของหัวหน้าคนนั้นๆประเมิน

    /*
    * show_request_detail
    * @input  $nor_id,$ass_id,$promote  
    * @output show v_request_form_detail.php
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function show_result_detail($nor_id,$ass_id,$promote,$grn_id)
	{
        $this->load->model('M_pef_result', 'mpef');
        $this->mpef->ptf_emp_id = $nor_id;
        $data['ev_no'] = $this->mpef->get_nomonee($nor_id)->result();
        $data['ev_ass'] = $this->mpef->get_group_assessor($ass_id)->result();
        $data['ev_gno'] = $this->mpef->get_group_nominee($nor_id)->result();
        $data['arr_his'] = $this->mpef->get_by_id($nor_id)->row();
        $data['pos_pos'] = $this->mpef->get_position($promote)->row();
        $data['arr_dis'] = $this->mpef->get_all_AMSSSV_MTSSP($promote)->result();
        $data['arr_dis_m'] = $this->mpef->get_all_M_AGM_GM($promote)->result();
        $data['arr_com'] = $this->mpef->get_comment($nor_id)->row();
        
        if($promote=='5'||$promote=='6'){
            $data['arr_sco'] = $this->mpef->get_score_T5($nor_id)->result();
            $this->output('consent/v_history_T5',$data);
        }else if($promote=='4'|| $promote=='3' || $promote=='2'){
            $data['arr_sco'] = $this->mpef->get_score($nor_id)->result();
            $this->output('consent/v_history_M_AGM_GM',$data);
        }
        // echo $nor_id;
        // echo '  ';
        // echo $grn_id;
        // echo '  ';

        // print_r($data['arr_sco']);

	} //show result detail แสดงรายละเอียดเพิ่มเติมของผลการประเมิน

}
// 