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
    function get_group()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group AS grp INNER JOIN pefs_database.pef_section AS sec
            ON grp.grp_position_group=sec.sec_id
			WHERE grp_date=?
			";
        $query = $this->db->query($sql, array($this->grp_date));
        return $query;
    } //end check_login

}//end class M_pef_login