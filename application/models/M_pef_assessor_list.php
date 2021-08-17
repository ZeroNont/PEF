<?php
include_once("Da_pef_assessor_list.php");

class M_pef_assessor_list extends Da_pef_assessor_list
{
    public function get_sec_level($sec_id)
    {
        $sql ="SELECT * FROM  pefs_database.pef_section
        WHERE sec_id = $sec_id";
        $query = $this->db->query($sql);
        return $query;
        
    }
    function get_assessor($sec_id){
        $sql ="SELECT * FROM pefs_database.pef_assessor as asse
        LEFT JOIN   pefs_database.pef_section as psec ON asse.position_level = psec.sec_id
        INNER JOIN dbmc.employee as dem
        ON dem.Emp_ID =  asse.ase_emp_id
        INNER JOIN dbmc.group_secname AS gsec 
        ON gsec.Sectioncode = dem.Sectioncode_ID
        INNER JOIN dbmc.position AS pos
        ON pos.Position_ID = dem.Position_ID
        WHERE sec_id = $sec_id AND ase_date = YEAR(CURDATE())" ;
        $query = $this->db->query($sql);
        return $query;
    }
    function get_addassessor($Emp_ID){
        $sql ="SELECT * 
        FROM dbmc.employee as emp
        WHERE Emp_ID = $Emp_ID";
        $query = $this->db->query($sql);
        return $query;
    }
}