<?php
/*
	* M_pef_promote_list.php
    * M_pef_promote_list Promote Management
    * @Niphat Kuhokciw
    * @Create Date 2564-08-12
*/
include_once("Da_pef_promote_list.php");

class M_pef_promote_list extends Da_pef_promote_list
{//class M_pef_promote_list

/*
* get_group
* get_group in database
* @output - 
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/
    public function get_group()
    {// get_group
        $sql =
            "SELECT * 
                FROM  pefs_database.pef_section";
        $query = $this->db->query($sql);
        return $query;
    }//end get_group

}//end M_pef_promote_list