<?php
/*
* Report
* show and get data of report
* @author   Chakrit
* @Create Date 2564-07-24
* @Update Date 2564-07-28
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
	* @Create Date 2564-07-24
	* @Update Date 2564-07-27
	*/
	public function show_report()
	{
		$this->load->model('M_ttp_report', 'ttp');
		$data['requested'] = $this->ttp->get_all_requested_form()->result();
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
		$this->load->model('M_ttp_report', 'ttp');
		$data = $this->ttp->get_department_to_chart($Start_date, $End_date)->result();
		echo json_encode($data);
	}

	/*
	* show_report_detail
	* show view report detail
	* @input    Form_ID
	* @output   -
	* @author   Chakrit
	* @Create Date 2564-07-26
	* @Update Date 2564-07-27
	*/
	public function show_report_detail()
	{
		$req_form_id = $this->input->get('req_form_id');
		$this->load->model('M_ttp_report', 'ttp');
		$this->ttp->req_form_id = $req_form_id;
		$data['Form_data'] = $this->ttp->get_form_by_id()->row();
		$this->output('consent/v_report_detail', $data);
	}

	/*
	* show_report_export_excel
	* show view export excel
	* @input    -
	* @output   -
	* @author   Chakrit
	* @Create Date 2564-07-28
	*/
	public function show_report_export_excel()
	{
		$this->load->model('M_ttp_report', 'ttp');
		$data['Form_data'] = $this->ttp->get_form_to_excel()->result();
		$this->output('consent/v_report_export_excel', $data);
	}
}
