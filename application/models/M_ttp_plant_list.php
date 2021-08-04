<?php
include_once("Da_ttp_plant_list.php");

class M_ttp_plant_list extends Da_ttp_plant_list
{
    // Table Name:ttps_database.plant
    // Describtion:Approve Plant management
    // @author:Jirayut
    // @Create Date:20/07/2021

    public function get_plant()
    {
        $sql =
            "SELECT * 
                FROM  ttps_database.plant AS pla 
                INNER JOIN dbmc.employee AS emp
                ON  pla.pla_emp_id = emp.Emp_ID ";
        $query = $this->db->query($sql);
        return $query;
    }
    // *get_plan
    // *get plant detail from database
    // *@input 
    // *@output plant detail
    // *@author Jirayut Saifah
    // *@Create Date 20/07/2021
}