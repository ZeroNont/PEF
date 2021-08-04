<!--
    M_ttp_check_schedule
    Model for schedule module
    @author Phatchara and Pontakon
    Create date 22/7/2564   
    Update date 25/7/2564
-->
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("Da_ttp_check_schedule.php");


class M_ttp_check_schedule extends Da_ttp_check_schedule
{

	public function __construct()
	{
		parent::__construct();
	}

        /*
	* get_all
	* คืนค่าใบคำขอทั้งหมด
	* @input 	-
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 22/7/2564   
	* @Update   Date 26/7/2564
	*/
    public function get_all()
    {
        $sql = "SELECT *
                FROM ttps_database.requested_form";

        $query = $this->db->query($sql);
        return $query;
    }

     /*
	* get_by_id
	* คืนค่าใบคำขอที่มี $id (รหัสพนักงาน) ตรงกัน
	* @input 	รหัสพนักงาน
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 22/7/2564   
	* @Update   Date 26/7/2564
	*/
    public function get_by_id($id)
    {
        $sql = "SELECT *
                FROM ttps_database.requested_form AS requested
                WHERE requested.req_emp_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }

     /*
	* get_employee
	* คืนค่าตาราง employee ที่มี  $id(รหัสพนักงาน) ตรงกัน
	* @input 	รหัสพนักงาน
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 29/7/2564   
	* @Update   Date 30/7/2564
	*/
    public function get_employee($id)
    {
        $sql = "SELECT *
        FROM dbmc.employee
        WHERE $id = employee.Emp_ID";

        $query = $this->db->query($sql);
        return $query;
    }
    /*
	* get_form_list
	* คืนค่าใบคำขอที่มี  $id(รหัสพนักงาน) ตรงกัน
	* @input 	-
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    public function get_form_list($id)
    {
        $sql = "SELECT * 
        FROM ttps_database.requested_form AS req
        INNER JOIN dbmc.employee AS emp
        ON  req.req_emp_id = emp.Emp_ID 
        INNER JOIN ttps_database.approval 
        ON  req.req_form_id = approval.app_form_id
        WHERE req.req_emp_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }
}