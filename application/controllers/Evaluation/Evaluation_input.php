<!--
    Check_schedule
    Controller for check schedule module
    @input -
    @output -
    @author Phatchara and Pontakon 
    Create date 18/7/2564 
    Update date 25/7/2564
-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Evaluation extends MainController
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
	* show_evaluation
	* แสดงหน้าจอ v_evaluation
	* @input  -
	* @output   
	* @author 	Phatchara Khongthandee   
	* @Create Date 13/08/2564 
    * @author   Pontakon Mujit
    * @Update Date 25/7/2564
	*/
    public function __construct(){
        parent::__construct();
    }

    function insert_performance_form()
    {
        print_r($_POST);
        // $date = date("Y-m-d");
        // $id = $_SESSION['UsEmp_ID'];
        // $this->load->model('Da_pef_evaluation', 'per');
        // $this->per->per_q_and_a = $this->input->post('QnA');
        // $this->per->per_comment = $this->input->post('comment');
        // $this->per->per_date = $date;
        // // $this->per->per_emp_id = $id;
        // // $this->per->per_ase_id = $this->input->post('Officer');
        // $this->point->ptf_point = $this->input->post('point');
        // $this->point->pef_row = $this->input->post('row');
        // $this->point->ptf_for_id = 1;
        // $this->ttp->insert_performance_form();

        redirect('Evaluation/Evaluation/show_evaluation');
    }
}
