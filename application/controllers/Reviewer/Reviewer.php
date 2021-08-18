<!--
    Reviewer
    controller of reviewer
    @input -
    @output -
    @author Nattakorn
    Create date 2564-08-13
    Update date 2564-08-
-->
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
		//$id = $_SESSION["UsEmp_ID"];
		// $this->ttp->Status = 4;
		$data['arr_nom'] = $this->pef->get_nom_group()->result();
		$data['arr_ass'] = $this->pef->get_ass_group()->result();
		$data['nom_id'] = $this->pef->get_nom_id($id)->result();

		$this->output('consent/v_review', $data);
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
		$this->load->model('Da_pef_review', 'pef');


		//$grp_id = $this->input->post('grp_id');
		$grp_date = date("Y/m/d", strtotime('today'));
		$this->pef->grp_date = $grp_date;


		//$this->pef->grn_status = 0;
		//$grn_id = $this->pef->grn_id;

		$this->pef->grp_position_group = $this->pef->grn_grp_id;
		$this->pef->grp_status = 0;
		$this->pef->insert_grp_date();
		$this->pef->update_grn_status($grn_id);
		redirect('/Reviewer/Reviewer/show_review');
	}
}