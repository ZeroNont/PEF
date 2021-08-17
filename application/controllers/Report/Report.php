<?php
/*
* Report
* show and get data of report
* @author   Chakrit
* @Create Date 2564-08-13
* @Update Date 
*/  
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Report extends MainController
{

	/*
	* show_report
	* show view report
	* @input    -
	* @output   -
	* @author   Chakrit
	* @Create Date 2564-08-13
	* @Update Date 2564-08-
	*/
	public function show_report()
	{
		$this->load->model('M_pef_report', 'pef');
		$data['nominee'] = $this->pef->get_all_nominee()->result();
		$this->output('consent/v_report', $data);
	}

	/*
	* get_report
	* get data between Start date and End date
	* @input    Start date and End date
	* @output   data of report
	* @author   Chakrit
	* @Create Date 2564-07-26
	* @Update Date 2564-07-28
	*/
	public function get_report()
	{
		$Start_date = $this->input->post('Start_date');
		$End_date = $this->input->post('End_date');
		$this->load->model('M_pef_report', 'ttp');
		$data = $this->ttp->get_department_to_chart($Start_date, $End_date)->result();
		echo json_encode($data);
	}

	/*
	* show_report_detail
	* show view report detail
	* @input    Form_ID
	* @output   -
	* @author   Chakrit
	* @Create Date 2564-08-15
	* @Update Date 2564-08-
	*/
	public function show_report_detail()
	{
		// $promote_to = $this->input->get('promote_to');
		// $this->load->model('M_ttp_report', 'ttp');
		// $this->ttp->req_form_id = $req_form_id;
		// $data['Form_data'] = $this->ttp->get_form_by_id()->row();
		$this->output('consent/v_report_detail');
	}

	/*
	* show_report_export_excel
	* show view export excel
	* @input    -
	* @output   -
	* @author   Chakrit
	* @Create Date 2564-07-28
	*/
	public function show_report_detail_assessor()
	{
	// 	$this->load->model('M_ttp_report', 'ttp');
	// 	$data['Form_data'] = $this->ttp->get_form_to_excel()->result();
		$this->output('consent/v_report_detail_assessor');
	}
}
