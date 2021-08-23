<?php
/*
	* M_pef_login.php
    * M_pef_login เข้าสู่ระบบ
    * @author : Niphat Kuhokciw
    * @Create : Date 2564-08-12
*/
defined('BASEPATH') or exit('No direct script access allowed');

include_once("Da_pef_summary.php");


class M_pef_summary extends Da_pef_summary
{ //class M_pef_login

    public function __construct()
    {
        parent::__construct();
    } //function construct
    /*
* check_login
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/
    function get_evaluation($id)
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_performance_form
			WHERE per_emp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    } //end check_login
    /*
    /*
* check_login
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/
    function get_group()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group AS grp 
            INNER JOIN pefs_database.pef_section AS sec
            ON grp.grp_position_group = sec.sec_id
			WHERE grp_date = ?";
        $query = $this->db->query($sql, array($this->grp_date));
        return $query;
    } //end check_login
    /*
* check_login
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/
    function get_group_by_id($id)
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group AS grp INNER JOIN pefs_database.pef_section AS sec
            ON grp.grp_position_group=sec.sec_id
			WHERE grp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    } //end check_login
    function get_assessor($id)
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group_assessor 
			WHERE gro_grp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    } //end check_login
    function get_nominee($id)
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group_nominee AS nom
            INNER JOIN dbmc.employee AS emp
            ON nom.grn_emp_id=emp.Emp_ID
			WHERE nom.grn_grp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    } //end check_login
    function get_nominee_by_id($id)
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group_nominee AS nom 
            INNER JOIN pefs_database.pef_performance_form AS per
            ON nom.grn_emp_id=per.per_emp_id
           
			WHERE grn_emp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    } //end check_login
    function get_form($id)
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group_nominee AS nom 
            INNER JOIN pefs_database.pef_performance_form AS per
            ON nom.grn_emp_id=per.per_emp_id
			WHERE grn_grp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    } //end check_login

    /*
    * get_ass_by_nor_id
    * get data section, assessor, employee, group, nominee
    * @input    -
    * @output   get data section, assessor, employee, group, nominee
    * @author   Chakrit
    * @Create Date 2564-08-19
    */
    public function get_ass_by_grp_id($id)
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_assessor AS ass
                INNER JOIN pefs_database.pef_group_assessor AS gro
                ON ass.ase_emp_id = gro.gro_ase_id 
                INNER JOIN pefs_database.pef_group AS grp
                ON grp.grp_id = gro.gro_grp_id
                WHERE grp.grp_id = $id";
        $query = $this->db->query($sql);
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
    public function get_data_point_by_grp_id($id)
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_point_form AS poi
                INNER JOIN pefs_database.pef_group_nominee AS grn
                ON poi.ptf_emp_id = grn.grn_id
                INNER JOIN pefs_database.pef_group AS grp
                ON grp.grp_id = grn.grn_grp_id
                WHERE grp.grp_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }
}//end class M_pef_login