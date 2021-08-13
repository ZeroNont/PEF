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
* check_login
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
*/
    function get_group()
    { //check User_login and Pass_login in database
        $sql = "SELECT *
			FROM pefs_database.pef_group 
			WHERE CURDATE() <= pef_group.grp_date
			";
        $query = $this->db->query($sql);
        return $query;
    } //end check_login

}//end class M_pef_group 