<?php
/*
	* Da_pef_assessor_list.php
    * Da_pef_assessor_list Assessor Management
    * @author : Niphat Kuhokciw
    * @Create : Date 2564-08-12
*/

include_once("pefs_model.php");
class Da_pef_assessor_list extends pefs_model
{//class Da_pef_assessor_list
    
/*
* construct
* construct
* @input  -
* @output -
* @author Niphat Kuhokciw
* @Create Date 2564-08-12
*/
    function construct()
    {//construct
        parent::construct();
    }//end construct

/*
* insert
* insert assessor data into model
* @input  ase_emp_id position_level ase_date
* @output insert assessor to the database
* @author 	Niphat Kuhoksiw
* @Create Date 2564-08-12
*/
    public function insert()
    {//insert
        $sql = "INSERT INTO pefs_database.pef_assessor(ase_emp_id,position_level,ase_date) 
                VALUES (?,?,?)";
        $this->db->query($sql, array($this->ase_emp_id,$this->position_level,$this->ase_date));
}//end insert

/*
* delete
* delete assessor data into model
* @input  ase_id
* @output insert delete to the database
* @author 	Niphat Kuhoksiw
* @Create Date 2564-08-12
*/
public function delete()
{//delete
    $sql = "DELETE FROM pefs_database.pef_assessor WHERE ase_id = ?";
    $this->db->query($sql,array($this->ase_id));  
}//end delete

}//end class Da_pef_assessor_list