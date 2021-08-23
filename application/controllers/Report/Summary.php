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
        $data['count'] = '';
        $num_ass = $this->pef->get_assessor($id)->result();
        $data['assessor'] = $this->pef->get_assessor($id)->result();
        $data['form'] = $this->pef->get_form($id)->result();
        $data['nominee'] = $this->pef->get_nominee($id)->result();
        $data['group'] = $this->pef->get_group_by_id($id)->result();
        $data['ass_data'] = $this->pef->get_ass_by_grp_id($id)->result();
		$data['point_data'] = $this->pef->get_data_point_by_grp_id($id)->result();

        for ($i = 0; $i < count($data['nominee']); $i++) {
            // echo $data['nominee'][$i]->Emp_ID;
            $data['per'] = $this->pef->get_evaluation($data['nominee'][$i]->Emp_ID)->result();
            // print_r($data['per']);
            // echo " ";
            $num = 0;
            // echo count($data['per']);
            for ($j = 0; $j < count($data['per']); $j++) {

                if ($data['nominee'][$i]->Emp_ID == $data['per'][$j]->per_emp_id && $data['group'][0]->grp_date == $data['per'][$j]->per_date) {
                    $num++;
                }
            }
            $data['count'][$i] = $num;
        }
        // print_r($data['count']);

        // print_r($data['group']);
        $this->output('consent/v_score_summary', $data);
    }
    public function review()
    {
        $date = $this->input->post('date');
        $emp  = $this->input->post('emp_id');
        $grp_id = $this->input->post('grp_id');
        $pos = $this->input->post('pos');
        $group = $this->input->post('group');
        echo $group;
        $this->load->model('Da_pef_group', 'pefd');
        $this->load->model('M_pef_group', 'pef');
        $this->load->model('M_pef_summary', 'pefs');
        $this->pefd->grp_date = $date;
        $this->pefd->grp_position_group = $group;
        $this->pefd->insert_group();
        $group_id = $this->pef->get_group_id()->result();
        $data['assessor'] = $this->pefs->get_assessor($grp_id)->result();
        // print_r($data['assessor']);
        $this->pefd->grn_grp_id = $group_id[0]->grp_id;
        $this->pefd->grn_emp_id = $emp;
        $this->pefd->grn_status = -1;
        $this->pefd->grn_promote_to = $pos;
        $this->pefd->insert_nominee();
        for ($i = 0; $i < count($data['assessor']); $i++) {
            $this->pefd->gro_grp_id = $group_id[0]->grp_id;
            $this->pefd->gro_ase_id = $data['assessor'][$i]->gro_id;
            $this->pefd->insert_assessor();
        }
        $this->pefd->grn_grp_id = $grp_id;
        $this->pefd->grn_emp_id = $emp;
        $this->pefd->delete_nominee();
        // $this->load->model('M_pef_summary', 'pef');

        Redirect('/Report/Summary/score_manage/' . $grp_id);
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
    public function update_pass($grp_id, $emp_id)
    {
        $this->load->model('Da_pef_summary', 'pef');
        $this->pef->grn_grp_id = $grp_id;
        $this->pef->grn_emp_id = $emp_id;
        $this->pef->grn_status = 1;
        $this->pef->update_pass();
        Redirect('/Report/Summary/score_manage/' . $grp_id);
    }
    public function update_fail($grp_id, $emp_id)
    {
        $this->load->model('Da_pef_summary', 'pef');
        $this->pef->grn_grp_id = $grp_id;
        $this->pef->grn_emp_id = $emp_id;
        $this->pef->grn_status = 2;
        $this->pef->update_pass();
        Redirect('/Report/Summary/score_manage/' . $grp_id);
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
    public function get_evaluation()
    {
        $id = $this->input->post('emp');
        $this->load->model('M_pef_summary', 'pef');
        $data = $this->pef->get_evaluation($id)->result();
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