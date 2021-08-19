<?php

// File_present_management
// Controller of  management file present 
// @author Ponprapai  and Thitima
// @Create date 1 :2564-08-13 
// @Update date : 2564-08-14


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


    /*
	* index
	* display v_add_file_present
    * input    -
    * output    display view
	* @author   Ponprapai and Thitima
	* @Create Date 2564-08-13
	* @Update Date 2564-08-13 
	*/

    function index()
    {
        $this->output('consent/v_add_file_present');
    }

    /*
	* show_list_nominee
	* show list nominee in group nominee
	* @input    -
	* @output   total list nominee in group nominee
	* @author   Ponprapai and Thitima
	* @Create Date 2564-08-13 
	* @Update Date 2564-08-13
	*/

    function show_list_nominee()
    {
        // $id = $_SESSION['UsEmp_ID'];
        $this->load->model('M_pef_file_present', 'list');
        $data['emp_nominee'] = $this->list->get_nominee()->result();

        $this->load->model('M_pef_file_present', 'file');
        $data['emp_file'] = $this->file->get_all()->result();

        $this->output('consent/v_add_file_present', $data);
    }

    /*
	* insert_file_nominee
	* insert fil_location, fil_em_id to model and save file to folder upload
	* @input    file name (fil_name) and Id nominee (Emp_ID) 
	* @output   status upload file
	* @author   Ponprapai  and Thitima
	* @Create Date 2564-08-13 
	* @Update Date 2564-08-14 
	*/
    function insert_file_nominee()
    {
        $pefs_file =  $_FILES['fil']['tmp_name'];
        $fil_name =  $_FILES['fil']['name'];
        $Emp_ID = $this->input->post("Emp_ID");

        $this->load->model('Da_pef_file_present', 'pef');
        $this->pef->fil_location = $Emp_ID . "_" . $fil_name;
        $this->pef->fil_emp_id = $Emp_ID;

        $this->pef->insert_file(); // add file to table pef_file
        copy($pefs_file, 'upload/' . $Emp_ID . "_" . $fil_name); // add file to floder upload
        $this->show_list_nominee();
    }

    /*
	* edit_file_nominee
	* edit fil_name to model and save file in folder upload
	* @input    file name (fil_name) and Id nominee (Emp_ID)
	* @output   status file
	* @author   Ponprapai and Thitima
	* @Create Date 2564-08-14 
	*/
    function edit_file_nominee()
    {
        $pefs_file =  $_FILES['fil']['tmp_name'];
        $fil_name =  $_FILES['fil']['name'];
        $Emp_ID = $this->input->post("Emp_ID");

        $this->load->model('Da_pef_file_present', 'pef');
        $this->pef->fil_location = $Emp_ID . "_" . $fil_name;
        $this->pef->fil_emp_id = $Emp_ID;

        $this->pef->update_file(); // update file to table pef_file
        copy($pefs_file, 'upload/' . $Emp_ID . "_" . $fil_name); // add file to floder upload
        $this->show_list_nominee();
    }
}