<?php
/*
* ttps_database.requested_form, ttps_database.approval, dbmc.department, ttps_database.plant, dbmc.company, dbmc.employee, dbmc.sectioncode
* get data of report
* @author   Chakrit
* @Create Date 2564-08-16
*/ 

include_once("Da_pef_report.php");

class M_pef_report extends Da_pef_report
{
    
    /*
    * get_department
    * get data department
    * @input    -
    * @output   data of department
    * @author   Chakrit
    * @Create Date 2564-08-16
    */
    public function get_all_nominee()
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group_nominee";
        $query = $this->db->query($sql);
        return $query;
    }
    
    public function get_year()
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group
                GROUP BY YEAR(grp_date) ";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_all_section()
    {
        $sql = "SELECT *
                FROM pefs_database.pef_section";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_data_year($year)
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group AS grp
                INNER JOIN pefs_database.pef_group_nominee AS grn
                ON grp.grp_id = grn.grn_grp_id
                INNER JOIN pefs_database.pef_section AS sec
                ON sec.sec_id = grp.grp_position_group
                INNER JOIN dbmc.position AS pos
                ON pos.Position_ID = grn.grn_promote_to
                WHERE YEAR(grp_date) = $year 
                ORDER BY sec.sec_id";
        $query = $this->db->query($sql);
        return $query;
    }
   
    public function get_data_by_id()
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_group AS grp
                INNER JOIN pefs_database.pef_group_nominee AS grn
                ON grp.grp_id = grn.grn_grp_id
                INNER JOIN pefs_database.pef_section AS sec
                ON sec.sec_id = grp.grp_position_group
                INNER JOIN dbmc.employee AS emp
                ON emp.Emp_ID = grn.grn_emp_id
                INNER JOIN dbmc.position AS pos
                ON pos.Position_ID = emp.Position_ID
                WHERE sec.sec_id = ?";
        $query = $this->db->query($sql, array($this->sec_id));
        return $query;
    }
    
    public function get_emp_by_id()
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_group AS grp
                INNER JOIN pefs_database.pef_group_nominee AS grn
                ON grn.grn_grp_id = grp.grp_id
                INNER JOIN pefs_database.pef_section AS sec
                ON sec.sec_id = grp.grp_position_group
                INNER JOIN dbmc.employee AS emp
                ON emp.Emp_ID = grn.grn_emp_id
                INNER JOIN dbmc.position AS pos
                ON pos.Position_ID = emp.Position_ID
                INNER JOIN dbmc.sectioncode AS scode
                ON emp.Sectioncode_ID = scode.Sectioncode
                INNER JOIN dbmc.company AS com
                ON emp.Company_ID = com.Company_ID
                WHERE grn.grn_emp_id = ?";
        $query = $this->db->query($sql, array($this->grn_emp_id));
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
}