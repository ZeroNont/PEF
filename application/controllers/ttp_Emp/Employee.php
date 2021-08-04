<?php
/*
* Employee
* Employee detail
* @input  -   
* @output Employee detail
* @author Jirayut Saifah
* @Create Date 2564-7-23
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Employee extends MainController
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
    function search_by_employee_id()
    {

        $Emp_id = $this->input->post('Emp_id');
        $this->load->model('M_ttp_Employee', 'emp');
        $this->emp->Emp_ID = $Emp_id;
        $data = $this->emp->get_name_emp()->result();

        echo json_encode($data);
    }
}
// 