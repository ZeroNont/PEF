<!--
    M_pef_evaluation
    Model for evaluation module
    @author Phatchara and Pontakon
    Create date 13/08/2564   
    Update date 26/7/2564
-->
<?php
include_once("Da_pef_evaluation.php");

class M_pef_evaluation extends Da_pef_evaluation
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
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    public function get_all()
    {
        $sql = "SELECT *
                FROM pefs_database.requested_form AS requested
                INNER JOIN dbmc.employee AS emp
                ON requested.req_emp_id = emp.Emp_ID";

        $query = $this->db->query($sql);
        return $query;
    }
    
    /*
	* get_by_id
	* คืนค่าใบคำขอที่ตรงกับ $id(เลขใบคำขอ)
	* @input 	เลขใบคำขอ
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
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
	* get_by_id
	* คืนค่าใบคำขอที่ตรงกับ $id(เลขพนักงาน)
	* @input 	เลขพนักงาน
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    public function get_by_id($id)
    {
            $sql = "SELECT *
                    FROM ttps_database.requested_form AS requested
                    WHERE requested.req_form_ID = $id";
            $query = $this->db->query($sql);
            return $query;

    }
/*
	* get_history_em
	* คืนค่าใบคำขอที่ตรงกับ $id(เลขพนักงาน)
	* @input 	เลขพนักงาน
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    public function get_history_em($id)
    {
            $sql = "SELECT * 
                    FROM ttps_database.requested_form AS requested
                    WHERE requested.req_emp_id = $id";
            $query = $this->db->query($sql);
            return $query;
    }
/*
	* get_history_approve
	* คืนค่าใบคำขอที่ตรงกับ $id(เลขพนักงาน)
	* @input 	เลขพนักงาน
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    function get_history_approve($id)
    {
        $sql = "SELECT *
                FROM ttps_database.approval AS app
                INNER JOIN dbmc.employee AS emp
                ON  app.app_supervisor_id = emp.Emp_ID
                WHERE app.app_form_ID = $id";
        $query = $this->db->query($sql);
        return $query;
    }
/*
	* get_history_approve_hr
	* คืนค่าใบคำขอที่ตรงกับ $id(เลขพนักงาน)
	* @input 	เลขพนักงาน
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    function get_history_approve_hr($id)
    {
        $sql = "SELECT *
                FROM ttps_database.approval AS app
                INNER JOIN dbmc.employee AS emp
                ON  app.app_hr_ID = emp.Emp_ID
                WHERE app.app_form_ID = $id";
        $query = $this->db->query($sql);
        return $query;
    }
/*
	* get_history_approve_plant
	* คืนค่าใบคำขอที่ตรงกับ $id(เลขพนักงาน)
	* @input 	เลขพนักงาน
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    function get_history_approve_plant($id)
    {
        $sql = "SELECT *
                FROM ttps_database.approval AS app
                INNER JOIN dbmc.employee AS emp
                ON  app.app_approve_plant_ID = emp.Emp_ID
                WHERE app.app_form_ID = $id";
        $query = $this->db->query($sql);
        return $query;
    }
/*
	* get_form_list
	* คืนค่าใบคำขอ
	* @input 	-
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    public function get_form_list()
    {
        $sql = "SELECT * 
        FROM ttps_database.requested_form AS req
        INNER JOIN dbmc.employee AS emp
        ON  req.req_emp_id = emp.Emp_ID 
        INNER JOIN ttps_database.approval 
        ON  req.req_form_id = approval.app_form_id ";
        $query = $this->db->query($sql);
        return $query;
    }
/*
	* get_form_file
	* คืนค่าตาราง ไฟล์
	* @input 	เลขใบคำขอ
	* @output 	ข้อมูลตาราง ไฟล์
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    public function get_form_file($id)
    {
        $sql = "SELECT * 
                FROM ttps_database.form_file
                where $id = form_file.fil_form_id ";
        $query = $this->db->query($sql);
        return $query;
    }

}