<?php
/*
* Get_assessor
* Get_assessor detail
* @input  -   
* @output Get_assessor detail
* @author Jirayut Saifah
* @Create Date 2564-8-13
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Get_assessor extends MainController
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
	* search_by_employee_idindex
	* search employee detail by emp_id
	* @input emp_id
	* @output employee detail
	* @author Jirayut Saifah
	* @Create Date 2564-7-23
	*/
    function get_assessor_by_sec()
    {

        $level = $this->input->post('pos');
        $this->load->model('M_pef_Employee', 'emp');
        $this->emp->position_level =  $level;

        $data = $this->emp->get_assessor()->result();
        // echo $data['assessor'];
        echo json_encode($data);
    }
    function get_assessor_by_id()
    {
        $group = $this->input->post('group_id');
        $this->load->model('M_pef_group', 'emp');
        $this->emp->gro_grp_id = $group;
        $data = $this->emp->get_assessor_by_group()->result();
        // echo $data['assessor'];
        echo json_encode($data);
    }
}
// 