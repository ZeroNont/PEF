<?php
/*
* Result
* Controller Result
* @input  - 
* @output - Show Result List
          - Show Result Detail
* @author Apinya Phadungkit
* @Create Date 2564-8-15
* @Update Date 2564-8-16
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
    * Function index
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

    /*
    * Function show_request_list
    * @input  -   
    * @output show v_request_form.php
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function show_result_list() 
    {
        $this->load->model('M_pef_result', 'mpef');
        // $this->mreq->ase_emp_id = $_SESSION["UsEmp_ID"];
        $this->mpef->grn_status = 1;
        $data['arr_gro'] = $this->mpef->get_group()->result();
        $this->output('consent/v_result', $data);
    } //show request list แสดงายการคำขอทั้งหมด สำหรับหัวหน้างานคนนั้นๆ

    /*
    * Function show_request_detail
    * @input  $id   
    * @output show v_request_form_detail.php
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function show_result_detail($id)
	{
        // $this->load->model('M_ttp_request', 'mreq');
        // $data['arr_req'] = $this->mreq->get_by_id($id)->row();
        // $data['arr_emp'] = $this->mreq->get_all()->row();
        // $data['arr_user'] = $this->mreq->get_history_user($id)->row();
        // $this->output('consent/v_request_form_detail',$data);
	} //show request detail แสดงรายละเอียดเพิ่มเติมของรายการคำขอ

    /*
    * Function reject_form
    * @input  $id   
    * @output show_request_form_list.php
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function reject_form($id)
    {
        $this->load->model('Da_ttp_request','dain');
        $this->dain->app_reject_reason =  $this->input->post('app_reject_reason');  
        $this->dain->app_form_id = $id; 
        $this->dain->update_reject();

        // ปฏิเสธแล้วให้ Status = 0
        $this->dain->req_status = 0;
        $this->dain->req_form_id = $id;   
        $this->dain->update_form();

        redirect('/request/Request_form/show_request_form_list');
    } //reject form ใช้ในการปฏิเสธแบบฟอร์ม

    /*
    * Function update_request_form
    * @input  $id   
    * @output show_request_form_list.php
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function update_request_form($id) 
    {
        $this->load->model('Da_ttp_request', 'dreq');
        $this->dreq->req_status = 2;
        $this->dreq->req_form_id = $id;   
        $this->dreq->update_form();

        $this->load->model('M_ttp_request', 'mreq');
        $this->mreq->app_form_id = $id;   
        $this->mreq->update_app();
        redirect('/request/Request_form/show_request_form_list');
    } //update request form เปลี่ยนสถานะของคำขอที่ถูกอนุมัติแล้ว ให้มี Status = 2

}
// 