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

class Summary extends MainController
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
    public function index()
    {
        $this->output('consent/v_score_list');
    }

    public function score_manage($id)
    {
        $this->load->model('M_pef_summary', 'pef');
        // echo $id;
        $num_ass = $this->pef->get_assessor($id)->result();
        $data['assessor'] = $this->pef->get_assessor($id)->result();
        $data['form'] = $this->pef->get_form($id)->result();
        $data['nominee'] = $this->pef->get_nominee($id)->result();
        $data['group'] = $this->pef->get_group_by_id($id)->result();
        // print_r($data['group']);
        $this->output('consent/v_score_summary', $data);
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
    public function get_group()
    {
        $date = $this->input->post('date');
        $this->load->model('M_pef_summary', 'pef');
        $this->pef->grp_date = $date;
        $data = $this->pef->get_group()->result();
        echo json_encode($data);
    }

}