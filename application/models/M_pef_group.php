<?php
/*
	* M_pef_group.php
    * M_pef_group group data
    * @Jirayut Saifah
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
*  get_group_by_id
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
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
*  get_group
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
*/
    function get_group()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group AS grp INNER JOIN pefs_database.pef_section AS sec
            ON grp.grp_position_group=sec.sec_id
			WHERE CURDATE() <= grp.grp_date AND grp.grp_status=0
			";
        $query = $this->db->query($sql);
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
*  get_group_id
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
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
*  get_group_id
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
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
*  get_group_id
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
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
    
    function  get_assessor_by_group()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group_assessor 
            WHERE gro_grp_id =? 
			";
        $query = $this->db->query($sql, array($this->gro_grp_id));
        return $query;
    } //end  get_group


   
}//end class M_pef_group 