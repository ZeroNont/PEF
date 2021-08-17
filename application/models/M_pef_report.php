<?php
/*
* ttps_database.requested_form, ttps_database.approval, dbmc.department, ttps_database.plant, dbmc.company, dbmc.employee, dbmc.sectioncode
* get data of report
* @author   Chakrit
* @Create Date 2564-08-16
*/ 

include_once("Da_ttp_report.php");

class M_pef_report extends Da_ttp_report
{
    
    /*
    * get_department
    * get data department
    * @input    -
    * @output   data of department
    * @author   Chakrit
    * @Create Date 2564-07-25
    */
    public function get_all_nominee()
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group_nominee";
        $query = $this->db->query($sql);
        return $query;
    }
    
    /*
    * get_form_by_id
    * get data requested form by Form_ID
    * @input    -
    * @output   data of requested_form by Form_ID
    * @author   Chakrit
    * @Create Date 2564-07-26
    */
    public function get_form_by_id()
    {
        $sql = "SELECT * 
                FROM ttps_database.requested_form AS req
                INNER JOIN ttps_database.approval AS app
                ON app.app_form_id = req.req_form_id
                INNER JOIN ttps_database.plant AS pla
                ON pla.pla_emp_id = app.app_approve_plant_id
                INNER JOIN dbmc.company AS com
                ON com.Company_ID = req.req_company_id
                INNER JOIN dbmc.employee AS emp
                ON emp.Emp_ID = req.req_emp_id
                WHERE req.req_form_id = ?";
        $query = $this->db->query($sql, array($this->req_form_id));
        return $query;
    }

    /*
    * get_form_to_excel
    * get data requested form to excel
    * @input    -
    * @output   data of requested form to excel
    * @author   Chakrit
    * @Create Date 2564-07-28
    */
    public function get_form_to_excel()
    {
        $sql = "SELECT * 
                FROM ttps_database.requested_form AS req
                INNER JOIN ttps_database.approval AS app
                ON app.app_form_id = req.req_form_id
                INNER JOIN ttps_database.plant AS pla
                ON pla.pla_emp_id = app.app_approve_plant_id
                INNER JOIN dbmc.company AS com
                ON com.Company_ID = req.req_company_id
                INNER JOIN dbmc.employee AS emp
                ON emp.Emp_ID = req.req_emp_id";
        $query = $this->db->query($sql);
        return $query;
    }
   
    /*
    * get_department_to_chart
    * get data department to chart
    * @input    Start date and End date
    * @output   data of department between Start date and End date
    * @author   Chakrit
    * @Create Date 2564-07-27
    */
    public function get_department_to_chart($Start_date, $End_date)
    {
        $sql = "SELECT * 
                FROM ttps_database.requested_form AS req
                INNER JOIN dbmc.employee AS emp
                ON emp.Emp_ID = req.req_emp_id
                INNER JOIN dbmc.sectioncode AS sec
                ON sec.Sectioncode = emp.Sectioncode_ID
                WHERE req.req_requested_date 
                BETWEEN '$Start_date' AND '$End_date'
                ORDER BY sec.Sectioncode";
        $query = $this->db->query($sql);
        return $query;
    }
}