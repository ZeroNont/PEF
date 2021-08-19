<?php


defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Reviewer extends MainController
{

	/*
	* show_renewal
	* show list of request form
	* @input -
	* @output list of request form
	* @author 	Nattakorn
	* @Create Date 2564-7-19
	*/
	function show_review()
	{
		$this->load->model('M_pef_review', 'pef');
		$data['arr_sec'] = $this->pef->get_section()->result();
		$this->output('consent/v_review', $data);
	}

	function get_show()
	{
		$date_search = $this->input->post('date_search');
		$promote = $this->input->post('promote');

		if ($promote != 0  && $date_search != "") {
			$this->load->model('M_pef_review', 'pef');
			$this->pef->grp_date = $date_search;
			$this->pef->grp_position_group = $promote;
			$data = $this->pef->get_group_by_T_DATE()->result();
			echo json_encode($data);
		} else if ($promote == 0  && $date_search != "") {
			$this->load->model('M_pef_review', 'pef');
			$this->pef->grp_date = $date_search;
			$data = $this->pef->get_group_by_DATE()->result();
			echo json_encode($data);
		} else if ($promote != 0  && $date_search == "") {
			$this->load->model('M_pef_review', 'pef');
			$this->pef->grp_position_group = $promote;
			$data = $this->pef->get_group_by_T()->result();
			echo json_encode($data);
		}
	}


	function get_data()
	{
		$date = $this->input->post('grp_date');
		$grp_id = $this->input->post('grp_id');
		$promote_to = $this->input->post('grn_promote_to');
		$this->load->model('M_pef_review', 'pef');
		$data = $this->pef->get_searh_data($date, $grp_id, $promote_to)->result();
		echo json_encode($data);
	}

	function add_data()
	{
		$grp_date = $this->input->post('date_review');
		$grp_id = $this->input->post('grp_data');
		$this->load->model('Da_pef_review', 'pef');
		$this->pef->grp_date = $grp_date;
		$this->pef->grp_id = $grp_id;
		$this->pef->grp_status = 0;
		$this->pef->update_grn_status();
		$this->load->model('Da_pef_review', 'ped');
		$this->ped->grn_status = -1;
		$this->ped->grn_grp_id = $grp_id;
		$this->ped->update_nom_stat();
		redirect('/Reviewer/Reviewer/show_review');
	}
}