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
        $sql = "INSERT INTO pefs_database.pef_group_assessor(gro_ase_id) 
                VALUES (?)";
        $this->db->query($sql, array($this->gro_ase_id));
}
}