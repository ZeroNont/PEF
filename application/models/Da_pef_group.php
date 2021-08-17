<?php
/*
	* Da_pef_group.php
    * Da_pef_group group data
    * @Jirayut Saifah 
    * @Create Date 2564-08-13
*/
defined('BASEPATH') or exit('No direct script access allowed');

include_once('pefs_model.php');

class Da_pef_group extends pefs_model
{ //class Da_pef_group


    public function __construct()
    {
        parent::__construct();
    }
    public function delete_group()
    {
        $sql = "DELETE FROM pefs_database.pef_group WHERE grp_id=?";
        $this->db->query(
            $sql,
            array($this->grp_id)
        );
    }
    public function delete_group_assessor()
    {
        $sql = "DELETE FROM pefs_database.pef_group_assessor WHERE gro_grp_id=?";
        $this->db->query(
            $sql,
            array($this->gro_grp_id)
        );
    }
    public function delete_group_nominee()
    {
        $sql = "DELETE FROM pefs_database.pef_group_nominee WHERE grn_grp_id=?";
        $this->db->query(
            $sql,
            array($this->grn_grp_id)
        );
    }
    public function insert_group()
    {
        $sql = "INSERT INTO pefs_database.pef_group(grp_date,grp_position_group) 
                VALUES (?,?)";
        $this->db->query(
            $sql,
            array($this->grp_date, $this->grp_position_group)
        );
    }
    public function insert_assessor()
    {
        $sql = "INSERT INTO pefs_database.pef_group_assessor(gro_grp_id,gro_ase_id) 
                VALUES (?,?)";
        $this->db->query(
            $sql,
            array($this->gro_grp_id, $this->gro_ase_id)
        );
    }
    public function insert_nominee()
    {
        $sql = "INSERT INTO pefs_database.pef_group_nominee(grn_promote_to,grn_status,grn_emp_id,grn_grp_id) 
                VALUES (?,?,?,?)";
        $this->db->query(
            $sql,
            array($this->grn_promote_to, $this->grn_status, $this->grn_emp_id, $this->grn_grp_id)
        );
    }
}//end class Da_pef_group