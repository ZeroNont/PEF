<!--
    Da_ttp_renewal
    database for renewal
    @input -
    @output -
    @author Nattakorn
    Create date 2564-07-19
    Update date 2564-07-27
-->
<?php
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
    public function update_grn_status($grn_id)
    {
        $sql = " UPDATE pefs_database.pef_group_nominee as up
        SET up.grn_status = ?
        WHERE grn_id = $grn_id";
        $this->db->query($sql, array($this->grn_id, $this->grn_status));
    }
    /*
    * insert_schedule
    * insert data to schedule table
    * @input -
    * @output -
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function insert_grp_date()
    {
        $sql = "INSERT INTO pefs_database.pef_group(grp_date,grp_position_group,grp_status) 
                VALUES (?,?,?)";
        $this->db->query($sql, array($this->grp_date, $this->grp_position_group, $this->grp_status));
    }
}