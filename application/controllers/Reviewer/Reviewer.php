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
		//$this->load->model('M_ttp_renewal', 'ttp');
		//$id = $_SESSION["UsEmp_ID"];
		// $this->ttp->Status = 4;
		// $data['arr_renew'] = $this->ttp->get_all($id)->result();
		//$data['arr_sec'] = $this->ttp->get_schedule($id)->result();
		$this->output('consent/v_review', $data);
	}
}