<?php
/*
	* M_pef_group.php
    * M_pef_group group data
    * @Jirayut Saifah
    * @Create Date 2564-08-13
*/
defined('BASEPATH') or exit('No direct script access allowed');

include_once("Da_pef_Employee.php");


class M_pef_Employee extends Da_pef_Employee
{ //class M_ttp_login

    public function __construct()
    {
        parent::__construct();
    } //function construct

    /*
*  get_group
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
*/
    function get_assessor()
    { //check User_login and Pass_login in database
        $sql =
            "SELECT *
			FROM pefs_database.pef_assessor AS ass INNER JOIN dbmc.sectioncode AS sec
            ON ass.Sectioncode_ID = sec.Sectioncode
			WHERE ass.position_level =?";
        $query = $this->db->query($sql, array($this->position_level));
        return $query;
    } //end  get_group
    /*
*  get_group
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
*/
    function get_section()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_section
			";
        $query = $this->db->query($sql);
        return $query;
    } //end get_section
    /*
*  get_group
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
*/
    public function get_name_emp()
    {
        $sql =
            "SELECT *
        FROM dbmc.employee INNER JOIN dbmc.sectioncode 
        ON (dbmc.employee.Sectioncode_ID=dbmc.sectioncode.Sectioncode) 
        INNER JOIN dbmc.position 
        ON (dbmc.employee.Position_ID=dbmc.position.Position_ID) 
        WHERE Emp_ID = ? ";
        $query = $this->db->query($sql, array($this->Emp_ID));
        return $query;
    }
    /*
*  get_group
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
*/
    public function get_section_by_emp()
    {
        $sql =
            "SELECT *
        FROM dbmc.sectioncode WHERE Position_Level=?
       ";
        $query = $this->db->query($sql, array($this->Position_Level));
        return $query;
    }
    /*
* get_emp
* get Emp_ID in database
* @input  -
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
*/
    public function get_position()
    {
        $sql =
            "SELECT *
        FROM dbmc.position WHERE Position_Level=?
       ";
        $query = $this->db->query($sql, array($this->Position_Level));
        return $query;
    }
}//end class M_pef_group 