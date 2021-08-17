<?php

// File_present_management
// Controller_for_add_file_present 
// @input -
// @output -
// @author Ponprapai  and Thitima
// Create date 13/8/2564 
// Update date 14/8/2564


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
        $data['emp_nominee'] = $this->list->get_nominee()->result();

        $this->load->model('M_pef_file_present', 'file');
        $data['emp_file'] = $this->file->get_all()->result();

        $this->output('consent/v_add_file_present', $data);
    }

    /*
	* insert_file_nominee
	* แนบไฟล์นำเสนอผลงานของผู้ถูกประเมิน โดยการเพิ่มไฟล์
	* @input : 	file type pdf
	* @output :	status file
	* @author : Ponprapai  and Thitima
	* @Create Date : 2564-08-13 
	* @Update Date : 2564-08-14 
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
	* แก้ไขการแนบไฟล์นำเสนอผลงานของผู้ถูกประเมิน
	* @input : 	file type pdf
	* @output :	status file
	* @author : Ponprapai  and Thitima
	* @Create Date : 2564-08-14 
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

    // function show_file_pdf($id_nominee)
    // {
    //             // $id_nominee = "00009";
    //             // $file_name = '';
    //             // $this->load->model('M_pef_file_present', 'pef');
    //             // $data['file_emp'] = $this->pef->get_by_id($id_nominee)->result();
    //             // $file_name = $this->pef->$fil_location;


    //     // $filename = "upload/$file_name";
    //     // $len = filesize($filename);
    //     // header("Content-type: application/pdf");
    //     // header("Content-Length: $len");
    //     // header("Content-Disposition: inline; filename=foo.pdf");
    //     // readfile($filename);

    //     $this->output('consent/v_test_read_file', $data);
    // }
    function show_file_pdf($id_nominee = "00009")
    {
        $file_name = '';
        $data['file_emp'] = "http://localhost/PEF/upload/00009_เธฃเธฒเธขเธเธฒเธฃเธ•เธฃเธงเธเธชเธญเธเธเธ—เธ—เธตเน 7.pdf";
     
        $this->output('consent/v_test_read_file', $data);
    }
}