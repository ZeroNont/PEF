<?php
/*
	* M_ttp_login.php
    * M_ttp_login เข้าสู่ระบบ
    * @Niphat Kuhokciw
    * @Create Date 2564-04-27
*/
defined('BASEPATH') OR exit('No direct script access allowed');

include_once("Da_pef_login.php");


class M_pef_login extends Da_pef_login 
{//class M_ttp_login

	public function __construct()
	{
		parent::__construct();
	}//function construct

/*
* check_login
* Check User_login and Pass_login in database
* @input User_login and Pass_loginn
* @output - 
* @author Niphat Kuhokciw
* @Create Date 2564-07-28
*/
	function check_login($User_login,$Pass_login)
	{//check User_login and Pass_login in database
		$sql="SELECT *
			FROM pefs_database.user_login AS ulog 
			WHERE User_login='$User_login' 
			AND Pass_login = '$Pass_login'
			";
		$query = $this->db->query($sql);
        return $query;
	}//end check_login

}//end class M_ttp_login