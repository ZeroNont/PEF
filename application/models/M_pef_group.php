<?php
/*
	* M_pef_group.php
    * M_pef_group group data
    * @author Jirayut Saifah
    * @Create Date 2564-08-13
*/
defined('BASEPATH') or exit('No direct script access allowed');

include_once("Da_pef_group.php");
class M_pef_group extends Da_pef_group
{ //class M_ttp_login

    public function __construct()
    {
        parent::__construct();
    } //function construct

    /*
* get_group_by_id
* get group detail from database
* @input grp_id
* @output group detail 
* @author Jirayut Saifah
* @Create Date 2564-08-13
*/
    function get_group_by_id()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group 
			WHERE grp_id=?
			";
        $query = $this->db->query($sql, array($this->grp_id));
        return $query;
    } //end  get_group
    /*
* get_group
* get group detail list from database
* @input -
* @output group detail list
* @author Jirayut Saifah
* @Create Date 2564-08-13
*/
    function get_group()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group AS grp INNER JOIN pefs_database.pef_section AS sec
            ON grp.grp_position_group=sec.sec_level
			WHERE CURDATE() <= grp.grp_date 
			";
        $query = $this->db->query($sql);
        return $query;
    } //end  get_group
/*
* get_section
* get section detail from database
* @input -
* @output section detail
* @author Jirayut Saifah
* @Create Date 2564-08-13
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
* get_group_id
* get group detail from database
* @input -
* @output last group in database 
* @author Jirayut Saifah
* @Create Date 2564-08-13
*/
    function get_group_id()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group 
			ORDER BY pefs_database.pef_group.grp_id DESC LIMIT 1 
			";
        $query = $this->db->query($sql);
        return $query;
    } //end  get_group
    /*
* get_nominee_by_group
* get nominee detail from database
* @input grn_grp_id
* @output nominee detail 
* @author Jirayut Saifah
* @Create Date 2564-08-13
*/
    function get_nominee_by_group()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group_nominee AS nom INNER JOIN dbmc.employee AS emp 
            ON emp.Emp_ID=nom.grn_emp_id
            INNER JOIN dbmc.sectioncode AS sec
            ON emp.Sectioncode_ID=sec.Sectioncode
            INNER JOIN dbmc.position AS pos
            ON pos.Position_ID = nom.grn_promote_to
            WHERE grn_grp_id =? 
			";
        $query = $this->db->query($sql, array($this->grn_grp_id));
        return $query;
    } //end  get_group
    /*
* get_pos_nominee_by_group
* get nominee detail from database
* @input grn_grp_id
* @output nominee detail 
* @author Jirayut Saifah
* @Create Date 2564-08-13
*/
    function get_pos_nominee_by_group()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group_nominee AS nom INNER JOIN dbmc.employee AS emp 
            ON emp.Emp_ID=nom.grn_emp_id
            INNER JOIN dbmc.sectioncode AS sec
            ON emp.Sectioncode_ID=sec.Sectioncode
            INNER JOIN dbmc.position AS pos
            ON pos.Position_ID = emp.Position_ID AND emp.Position_ID=pos.Position_ID
            WHERE grn_grp_id =? 
			";
        $query = $this->db->query($sql, array($this->grn_grp_id));
        return $query;
    } //end  get_group
     /*
* get_assessor_by_group
* get assessor detail from database
* @input gro_grp_id
* @output assessor detail 
* @author Jirayut Saifah
* @Create Date 2564-08-13
*/
    function  get_assessor_by_group()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group_assessor 
            WHERE gro_grp_id =? 
			";
        $query = $this->db->query($sql, array($this->gro_grp_id));
        return $query;
    } //end  


   
}//end class M_pef_group 