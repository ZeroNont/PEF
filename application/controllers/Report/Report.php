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
		$data['obj_year'] = $this->pef->get_year()->result();
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
		$year = $this->input->post('year');
		$this->load->model('M_pef_report', 'pef');
		$data = $this->pef->get_data_year($year)->result();
		echo json_encode($data);
	}

	public function get_section()
	{
		$this->load->model('M_pef_report', 'pef');
		$data = $this->pef->get_all_section()->result();
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
	public function show_report_detail($sec_id)
	{
		$this->load->model('M_pef_report', 'pef');
		$this->pef->sec_id = $sec_id;
		$data['sec_data'] = $this->pef->get_data_by_id()->result();
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
	public function show_report_detail_assessor($grn_emp_id)
	{
		$this->load->model('M_pef_report', 'pef');
		$this->pef->grn_emp_id = $grn_emp_id;
		$data['emp_data'] = $this->pef->get_emp_by_id()->row();
		$data['ass_data'] = $this->pef->get_ass_by_id()->result();
		$this->output('consent/v_report_detail_assessor', $data);
	}
}
