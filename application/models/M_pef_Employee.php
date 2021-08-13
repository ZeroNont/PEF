<?php
/*
	* M_pef_group.php
    * M_pef_group group data
    * @Jirayut Saifah
    * @Create Date 2564-08-13
*/
defined('BASEPATH') or exit('No direct script access allowed');

include_once("Da_pef_group.php");


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
    function get_assessor($level)
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_assessor AS ass
			WHERE ass.position_level=$level
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

}//end class M_pef_group 