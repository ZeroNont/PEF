<!--
    File_present_management
    Controller_for_add_file_present 
    @input *
    @output -
    @author Ponprapai  and Thitima
    Create date 13/8/2564 
    Update date 14/8/2564
-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class File_present_management extends MainController
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


    function index()
    {
        $this->output('consent/v_add_file_present');
    }

    /*
	* show_list_nominee
	* เรียกหน้าจอ v_add_file_present
	* @input 	-
	* @output 	list_nominee
	* @author 	Ponprapai  and Thitima
	* @Create   Date 13/8/2564 
	* @Update   Date 13/8/2564 
	*/

    function show_list_nominee()
    {
        // $id = $_SESSION['UsEmp_ID'];
        $this->load->model('M_pef_file_present', 'list');
        $data['emp_nominee'] = $this->list->get_all_nominee()->result();
        $this->output('consent/v_add_file_present', $data);
    }

    function insert_file_nominee()
    {
        $this->load->model('Da_pef_file_present', 'pef');

        move_uploaded_file($pef_file, 'assets/file/present' . $fil_name);
        $this->pef->fil_location = $fil_name;
        $this->pef->insert_file();
    }
}