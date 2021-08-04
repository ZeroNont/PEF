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
include_once("ttps_model.php");


class Da_ttp_renewal extends ttps_model
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
    public function update_form()
    {
        $sql = " UPDATE ttps_database.requested_form as up
        SET up.req_form_count = ?
        WHERE req_form_id = ?";
        $this->db->query($sql, array($this->req_form_count,$this->req_form_id));
    }
    /*
    * update_status
    * update Status
    * @input -
    * @output -
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function update_status()
    {
        $sql = " UPDATE ttps_database.requested_form as up
        SET up.req_status = ?
        WHERE req_form_id = ?";
        $this->db->query($sql, array($this->req_status,$this->req_form_id));
    }
    /*
    * insert_schedule
    * insert data to schedule table
    * @input -
    * @output -
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function insert_schedule()
    {
        $sql = "INSERT INTO ttps_database.schedule(sch_form_id,sch_start_date,sch_end_date) 
                VALUES (?,?,?)";
        $this->db->query($sql, array($this->sch_form_id,$this->sch_start_date, $this->sch_end_date));
    }

/*
        public function update_sec()
        {
            $sql = " UPDATE ttps_database.schedule 
            SET Start_date = ? AND End_date = ?
            WHERE Form_ID= ?";
            $this->db->query($sql, array($this->Start_date,$this->End_date,$this->Form_ID));
        */
}