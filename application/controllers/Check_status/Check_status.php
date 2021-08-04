<?php
/*
* Check_status
* check form status and edit form
* @input  Emp_ID,Start_date,End_date,Requested_date,Item,Tell,Officer,Reason,Company_ID,Form_count   
* @output form status
* @author Jirayut Saifah
* @Create Date 2564-7-20
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Check_status extends MainController
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
	* index
	* Show a form status
	* @input 
	* @output employee,plant,company detail
	* @author 	Jirayut Saifah
	* @Create Date 2564-7-16
	*/
    function index()
    {
        // echo $_SESSION['UsEmp_ID'];
        $id = $_SESSION['UsEmp_ID'];
        // echo  $id;
        $this->load->model('M_ttp_licence', 'ttp');
        $data['obj_status'] = $this->ttp->get_status($id)->result();
        // // print_r($_SESSION['Emp_ID']);
        $this->output('consent/v_check_status', $data);
    }
}
// 