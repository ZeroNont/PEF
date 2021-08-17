<?php
include_once("pefs_model.php");
class Da_pef_assessor_list extends pefs_model
{
    function construct()
    {
        parent::construct();
    }
    public function insert()
    {
        $sql = "INSERT INTO pefs_database.pef_assessor(ase_emp_id,position_level,ase_date) 
                VALUES (?,?,?)";
        $this->db->query($sql, array($this->ase_emp_id,$this->position_level,$this->ase_date));
}
public function delete()
{
    $sql = "DELETE FROM pefs_database.pef_assessor WHERE ase_emp_id = ?";
    $this->db->query($sql,array($this->ase_emp_id));        
}
}