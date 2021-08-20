<?php
/*
* M_pef_report.php
* get data of report
* @author   Chakrit
* @Create Date 2564-08-16
* @Update date 2564-08-20
*/

include_once("Da_pef_report.php");

class M_pef_report extends Da_pef_report
{

    /*
    * get_all_nominee
    * get data norminee
    * @input    -
    * @output   data of norminee
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

    /*
    * get_year
    * get data group in year
    * @input    -
    * @output   data group in year
    * @author   Chakrit
    * @Create Date 2564-08-16
    */
    public function get_year()
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group
                GROUP BY YEAR(grp_date) ";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_all_section
    * get data section
    * @input    -
    * @output   get data section
    * @author   Chakrit
    * @Create Date 2564-08-16
    */
    public function get_all_section()
    {
        $sql = "SELECT *
                FROM pefs_database.pef_section";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_data_year
    * get data section, group, nominee, position in year
    * @input    -
    * @output   get data section, group, nominee, position in year
    * @author   Chakrit
    * @Create Date 2564-08-18
    */
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

    /*
    * get_data_by_id
    * get data section, group, nominee, position, employee, scetion_code, company
    * @input    -
    * @output   get data section, group, nominee, position, employee, scetion_code, company
    * @author   Chakrit
    * @Create Date 2564-08-18
    */
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
                INNER JOIN dbmc.sectioncode AS scode
                ON emp.Sectioncode_ID = scode.Sectioncode
                INNER JOIN dbmc.company AS com
                ON emp.Company_ID = com.Company_ID
                WHERE sec.sec_id = ?";
        $query = $this->db->query($sql, array($this->sec_id));
        return $query;
    }

    /*
    * get_ass_by_sec_id
    * get data section, assessor, employee
    * @input    -
    * @output   get data section, assessor, employee
    * @author   Chakrit
    * @Create Date 2564-08-18
    */
    public function get_ass_by_sec_id()
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_section AS sec
                INNER JOIN pefs_database.pef_assessor AS ass
                ON ass.position_level = sec.sec_id
                INNER JOIN dbmc.employee AS emp
                ON emp.Emp_ID = ass.ase_emp_id
                WHERE sec.sec_id = ?";
        $query = $this->db->query($sql, array($this->sec_id));
        return $query;
    }

    /*
    * get_data_point
    * get data section, point_form, nominee, group
    * @input    -
    * @output   get data section, point_form, nominee, group
    * @author   Chakrit
    * @Create Date 2564-08-18
    */
    public function get_data_point()
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_point_form AS poi
                INNER JOIN pefs_database.pef_group_nominee AS grn
                ON poi.ptf_emp_id = grn.grn_id
                INNER JOIN pefs_database.pef_group AS grp
                ON grp.grp_id = grn.grn_grp_id
                INNER JOIN pefs_database.pef_section AS sec
                ON sec.sec_id = grp.grp_position_group
                WHERE sec.sec_id = ?";
        $query = $this->db->query($sql, array($this->sec_id));
        return $query;
    }

    /*
    * get_emp_by_id
    * get data group, nominee, section, employee, position, section_code, company
    * @input    -
    * @output   get data group, nominee, section, employee, position, section_code, company
    * @author   Chakrit
    * @Create Date 2564-08-18
    */
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
                WHERE grn.grn_id = ?";
        $query = $this->db->query($sql, array($this->grn_id));
        return $query;
    }

    /*
    * get_ass_by_nor_id
    * get data section, assessor, employee, group, nominee
    * @input    -
    * @output   get data section, assessor, employee, group, nominee
    * @author   Chakrit
    * @Create Date 2564-08-19
    */
    public function get_ass_by_nor_id()
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_section AS sec
                INNER JOIN pefs_database.pef_assessor AS ass
                ON ass.position_level = sec.sec_id
                INNER JOIN dbmc.employee AS emp
                ON emp.Emp_ID = ass.ase_emp_id
                INNER JOIN pefs_database.pef_group AS grp
                ON grp.grp_position_group = sec.sec_id
                INNER JOIN pefs_database.pef_group_nominee AS grn
                ON grn.grn_grp_id = grp.grp_id
                WHERE grn.grn_id = ?";
        $query = $this->db->query($sql, array($this->grn_id));
        return $query;
    }

    /*
    * get_data_point_by_nor_id
    * get data point_form, nominee, group, section
    * @input    -
    * @output   get data point_form, nominee, group, section
    * @author   Chakrit
    * @Create Date 2564-08-19
    */
    public function get_data_point_by_nor_id()
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_point_form AS poi
                INNER JOIN pefs_database.pef_group_nominee AS grn
                ON poi.ptf_emp_id = grn.grn_id
                INNER JOIN pefs_database.pef_group AS grp
                ON grp.grp_id = grn.grn_grp_id
                INNER JOIN pefs_database.pef_section AS sec
                ON sec.sec_id = grp.grp_position_group
                WHERE grn.grn_id = ?";
        $query = $this->db->query($sql, array($this->grn_id));
        return $query;
    }
    
}
