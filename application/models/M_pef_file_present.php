<?php
/*
	* M_pef_file_present.php
    * M add file present nominee
    * @Author : Ponprapai And Thitima
    * @Create Date : 2564-08-13
    * @Update Date : 2564-08-15 
*/
defined('BASEPATH') or exit('No direct script access allowed');

include_once('Da_pef_file_present.php');


class M_pef_file_present extends Da_pef_file_present
{ //class M_pef_addfile

    public function __construct()
    {
        parent::__construct();
    } //function construct

    function get_nominee()
    { //call data group nominee list
        $sql = "SELECT employee.Emp_ID,employee.Empname_eng,employee.Empsurname_eng,position.Pos_shortName,sectioncode.Department 
        FROM dbmc.employee 
        INNER JOIN pefs_database.pef_group_nominee AS nominee 
        ON nominee.grn_emp_id = employee.Emp_ID 
        INNER JOIN dbmc.position 
        ON position.Position_ID = employee.Position_ID 
        INNER JOIN dbmc.sectioncode 
        ON sectioncode.Sectioncode = employee.Sectioncode_ID 
        WHERE Emp_ID = nominee.grn_emp_id ";
        $query = $this->db->query($sql);
        return $query;
    } //end get_all_nominee

    function get_all()
    { //call all nominee list 
        $sql = "SELECT * FROM pefs_database.pef_file";
        $query = $this->db->query($sql);
        return $query;
    } //end get_all_nominee

}//end class M_pef_group 