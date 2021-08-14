<?php
/*
	* Da_pef_file_present.php
    * add file present nominee
    * @Author : Ponprapai and Thitima
    * @Create Date : 2564-08-13
    * @Update Date : 2564-08-14 
*/
defined('BASEPATH') or exit('No direct script access allowed');

include_once('pefs_model.php');

class Da_pef_file_present extends pefs_model
{ //class Da_pef_addfile


    public function __construct()
    {
        parent::__construct();
    }

    function insert_file()
    {
        $sql = "INSERT INTO pefs_database.pef_file(fil_location,fil_emp_id) 
        VALUES (?,?)";

        $this->db->query($sql, array($this->fil_location, $this->fil_emp_id));
    }

    function update_file()
    {
        $sql = "UPDATE pefs_database.pef_file
        SET fil_location= ?
        WHERE fil_emp_id = ?";

        $this->db->query($sql, array($this->fil_location, $this->fil_emp_id));
    }
}//end class Da_pef_addfile