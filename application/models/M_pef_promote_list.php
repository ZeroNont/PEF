<?php
include_once("Da_pef_promote_list.php");

class M_pef_promote_list extends Da_pef_promote_list
{

    public function get_group()
    {
        $sql =
            "SELECT * 
                FROM  pefs_database.pef_section";
        $query = $this->db->query($sql);
        return $query;
    }

}
// INNER JOIN dbmc.employee AS emp
// ON  pla.pla_emp_id = emp.Emp_ID 