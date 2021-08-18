<?php
// <!--
// Da_ttp_renewal
// database for renewal
// @input -
// @output -
// @author Nattakorn
// Create date 2564-07-19
// Update date 2564-07-27
// -->
include_once("pefs_model.php");


class Da_pef_review extends pefs_model
{
    public $End_date;
    function construct()
    {
        parent::construct();
    }

    /*
    * update
    * update end date to database
    * @input End_date,Form_ID
    * @output End_date update
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    function update()
    {
        $sql = "UPDATE ttps_database.requested_form 
        SET req_end_date = ?
        WHERE req_form_id = ?";
        $this->db->query($sql, array($this->req_end_date, $this->req_form_id));
    }
    /*
    * update_form
    * update Form_count
    * @input -
    * @output -
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    /*public function update_form()
    {
        $sql = " UPDATE ttps_database.requested_form as up
        SET up.req_form_count = ?
        WHERE req_form_id = ?";
        $this->db->query($sql, array($this->req_form_count, $this->req_form_id));
    }
    /*
    * update_status
    * update Status
    * @input -
    * @output -
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function update_grn_status()
    {
        $sql = " UPDATE pefs_database.pef_group as up
        SET up.grp_date = ? , up.grp_status = ? 
        WHERE up.grp_id = ? ";
        $this->db->query($sql, array($this->grp_date, $this->grp_status, $this->grp_id));
    }

    public function update_nom_stat()
    {
        $sql = " UPDATE pefs_database.pef_group_nominee as nom
        SET nom.grn_status = ? 
        WHERE nom.grn_grp_id = ? ";
        $this->db->query($sql, array($this->grn_status, $this->grn_grp_id));
    }
    /*
    * insert_schedule
    * insert data to schedule table
    * @input -
    * @output -
    * @author Nattkorn
    * @Create date 2564-07-19
    */
}