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
        WHERE sec_id = $sec_id";
        $query = $this->db->query($sql);
        return $query;
    }
}