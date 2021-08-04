<?php
/*
* Check_out
* check form status and edit form
* @input  Emp_ID,Form_ID 
* @output 
* @author Jirayut Saifah
* @Create Date 2564-7-21
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Check_out_form extends MainController
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
	* Show a form list
	* @input 
	* @output form detail
	* @author 	Jirayut Saifah
	* @Create Date 2564-7-21
	*/
    function index()
    {
        $id = $_SESSION['UsEmp_ID'];
        $this->load->model('M_ttp_licence', 'ttp');
        $data['obj_form'] = $this->ttp->get_form($id)->result();
        $this->output('consent/v_check_out', $data);
    }
    /*
	* check_out
	* update form status
	* @input Form_ID
	* @output 
	* @author 	Jirayut Saifah
	* @Create Date 2564-7-23
	*/
    function check_out($id)
    {
        $num = 5;
        $this->load->model('Da_ttp_licence', 'ttp');
        $this->ttp->req_form_id = $id;
        $this->ttp->req_status = $num;
        $this->ttp->check_out();
        redirect('Check_out_form/Check_out_form/index');
    }
}
// 