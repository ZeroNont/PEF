<!-- 
Table Name:ttps_database.requested_form
Describtion:Requested Form
@author:Jirayut
@Create Date:16/07/2021


 -->
<?php
include_once("pefs_model.php");


class Da_ttp_plant_list extends pefs_model
{
    // Table Name:ttps_database.plant
    // Describtion:Approve Plant management
    // @author:Jirayut
    // @Create Date:20/07/2021


    function construct()
    {
        parent::construct();
    }
    public function insert()
    {
        $sql = "INSERT INTO ttps_database.plant(pla_emp_id,pla_plant_name,pla_plant_no) 
                VALUES (?,?,?)";
        $this->db->query($sql, array($this->pla_emp_id, $this->pla_plant_name, $this->pla_plant_no));
    }
    // *insert
    // *insert approve plant in database
    // *@input Emp_ID,Plant_name,Plant_No
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 20/07/2021
    public function update()
    {
        $sql =
            "UPDATE ttps_database.plant 
        SET pla_emp_id=?,pla_plant_name=?,pla_plant_no=?
        WHERE pla_plant_id=?;";
        $this->db->query($sql, array($this->pla_emp_id, $this->pla_plant_name, $this->pla_plant_no, $this->pla_plant_id));
    }
    // *update
    // *update approve plant in database
    // *@input Emp_ID,Plant_name,Plant_No
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 20/07/2021

}