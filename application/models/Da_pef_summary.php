<?php
/*
*Da_pef_review
*database for reviewer
*@author Nattakorn
*@Create date 2564-08-13
*@Update date 2564-08-19
*/
include_once("pefs_model.php");


class Da_pef_summary extends pefs_model
{
    public $End_date;
    function construct()
    {
        parent::construct();
    }
    /*
    * update_grn_status
    * update group status
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-08-13
    */
    public function update_grn_status()
    {
        $sql = " UPDATE pefs_database.pef_group as up
        SET up.grp_date = ? , up.grp_status = ? 
        WHERE up.grp_id = ? ";
        $this->db->query($sql, array($this->grp_date, $this->grp_status, $this->grp_id));
    }


    /*
    * update_nom_stat
    * update nominee status
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-08-13
    */
    public function update_nom_stat()
    {
        $sql = " UPDATE pefs_database.pef_group_nominee as nom
        SET nom.grn_status = ? 
        WHERE nom.grn_grp_id = ? ";
        $this->db->query($sql, array($this->grn_status, $this->grn_grp_id));
    }
}