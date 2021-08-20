<?php
/*
* Report
* show and get data of report
* @author   Chakrit
* @Create Date 2564-08-13
* @Update Date 2564-08-20
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
	* @Update Date 2564-08-19
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
	* get data report in year
	* @input    year
	* @output   data of report
	* @author   Chakrit
	* @Create Date 2564-08-13
	* @Update Date 2564-08-18
	*/
	public function get_report()
	{
		$year = $this->input->post('year');
		$this->load->model('M_pef_report', 'pef');
		$data = $this->pef->get_data_year($year)->result();
		echo json_encode($data);
	}

	/*
	* get_section
	* get data report in section
	* @input    -
	* @output   data of report
	* @author   Chakrit
	* @Create Date 2564-08-13
	* @Update Date 2564-08-18
	*/
	public function get_section()
	{
		$this->load->model('M_pef_report', 'pef');
		$data = $this->pef->get_all_section()->result();
		echo json_encode($data);
	}

	/*
	* show_report_detail
	* show view report detail
	* @input    sec_id
	* @output   data of report detail
	* @author   Chakrit
	* @Create Date 2564-08-15
	* @Update Date 2564-08-20
	*/
	public function show_report_detail($sec_id)
	{
		$this->load->model('M_pef_report', 'pef');
		$this->pef->sec_id = $sec_id;
		$data['sec_data'] = $this->pef->get_data_by_id()->result();
		$data['ass_data'] = $this->pef->get_ass_by_sec_id()->result();
		$data['point_data'] = $this->pef->get_data_point()->result();
		$this->output('consent/v_report_detail', $data);
	}

	/*
	* show_report_detail_assessor
	* show view report detail assessor
	* @input    grn_id
	* @output   data of report detail assessor
	* @author   Chakrit
	* @Create Date 2564-08-15
	* @Update Date 2564-08-20
	*/
	public function show_report_detail_assessor($grn_id)
	{
		$this->load->model('M_pef_report', 'pef');
		$this->pef->grn_id = $grn_id;
		$data['emp_data'] = $this->pef->get_emp_by_id()->row();
		$data['ass_data'] = $this->pef->get_ass_by_nor_id()->result();
		$data['point_data'] = $this->pef->get_data_point_by_nor_id()->result();
		$this->output('consent/v_report_detail_assessor', $data);
	}
}
