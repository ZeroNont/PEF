<?php
include_once("ttps_model.php");


class Da_ttp_licence extends ttps_model
{
    // Table Name:ttps_database.requested_form
    // Describtion:Requested Form
    // @author:Jirayut
    // @Create Date:16/07/2021
    function construct()
    {
        parent::construct();
    }
    public function insert_form()
    {
        $sql = "INSERT INTO ttps_database.requested_form(req_emp_id,req_start_date,req_end_date,req_requested_date,req_item,req_tel,req_officer,req_reason,req_company_id,req_form_count,req_status) 
                VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $this->db->query($sql, array($this->req_emp_id, $this->req_start_date, $this->req_end_date, $this->req_requested_date, $this->req_item, $this->req_tel, $this->req_officer, $this->req_reason, $this->req_company_id, $this->req_form_count, $this->req_status));
    }
    // *insert_form
    // *insert form in database
    // *@input Emp_ID,Start_date,End_date,Requested_date,Item,Tell,Officer,Reason,Company_ID,Form_count
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 17/07/2021
    public function insert_date()
    {
        $sql = "INSERT INTO ttps_database.schedule(sch_form_id,sch_start_date,sch_end_date) 
                VALUES (?,?,?)";
        $this->db->query($sql, array($this->sch_form_id, $this->sch_start_date, $this->sch_end_date));
    }
    // *insert_date
    // *insert date in database
    // *@input Form_ID,Start_date,End_date
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 29/07/2021
    public function update_form($id)
    {
        $sql = " UPDATE ttps_database.requested_form
        SET req_emp_id=?,req_start_date=?,req_end_date=?,req_requested_date=?,req_item=?,req_tel=?,req_officer=?,req_reason=?,req_company_id=?,req_form_count=?
        WHERE req_form_id=$id;";
        $this->db->query($sql, array($this->req_emp_id, $this->req_start_date, $this->req_end_date, $this->req_requested_date, $this->req_item, $this->req_tel, $this->req_officer, $this->req_reason, $this->req_company_id, $this->req_form_count));
    }
    // *update_form
    // *update form to database
    // *@input Emp_ID,Start_date,End_date,Requested_date,Item,Tell,Officer,Reason,Company_ID,Form_count
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 18/07/2021
    public function update_date($id)
    {
        $sql = " UPDATE ttps_database.schedule
        SET sch_start_date=?,sch_end_date=?
        WHERE sch_form_id=$id;";
        $this->db->query($sql, array($this->sch_start_date, $this->sch_end_date));
    }
    // *update_form
    // *update form to database
    // *@input Emp_ID,Start_date,End_date,Requested_date,Item,Tell,Officer,Reason,Company_ID,Form_count
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 18/07/2021
    public function insert_approve()
    {
        $sql = "INSERT INTO ttps_database.approval(app_supervisor_id,app_approve_plant_id) 
                VALUES (?,?)";
        $this->db->query($sql, array($this->app_supervisor_id, $this->app_approve_plant_id));
    }
    // *insert_approve
    // *insert approval in database
    // *@input Supervisor_ID,Approve_Plant_ID
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 18/07/2021

    public function update_approve($id)
    {
        $sql = " UPDATE ttps_database.approval
        SET app_supervisor_id=?,app_approve_plant_id=?
        WHERE app_form_id=$id;";
        $this->db->query($sql, array($this->app_supervisor_id, $this->app_approve_plant_id));
    }
    // *update_approve
    // *update approve to database
    // *@input Supervisor_ID,Approve_Plant_ID
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 19/07/2021

    public function insert_file()
    {
        $sql = "INSERT INTO ttps_database.form_file(fil_layout_location,fil_plan_location) 
                VALUES (?,?)";

        $this->db->query($sql, array($this->fil_layout_location, $this->fil_plan_location));
    }
    // *insert_file
    // *insert file in database
    // *@input Layout_location,Plan_location
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 19/07/2021

    public function update_file($id)
    {
        $sql = " UPDATE ttps_database.form_file
        SET fil_layout_location=?,fil_plan_location=?
        WHERE fil_form_id=$id;";
        $this->db->query($sql, array($this->fil_layout_location, $this->fil_plan_location));
    }
    // *update_file
    // *update file to database
    // *@input Layout_location,Plan_location
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 19/07/2021

    public function check_out()
    {
        $sql =
            " UPDATE ttps_database.requested_form
        SET req_status=?
        WHERE req_form_id=?;";
        $this->db->query($sql, array($this->req_status, $this->req_form_id));
    }
    // *check_out
    // *update status in database
    // *@input Status
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 20/07/2021

    public function status_print()
    {
        $sql =
            " UPDATE ttps_database.requested_form
        SET req_print_status=?
        WHERE req_form_id=?;";
        $this->db->query($sql, array($this->req_print_status, $this->req_form_id));
    }
    public function status_update($k)
    {
        $sql =
            " UPDATE ttps_database.requested_form
        SET req_status=1
        WHERE req_form_id=$k ";
        $this->db->query($sql, array($this->req_status, $this->req_form_id));
    }
    // *status_print
    // *update status in database
    // *@input print_status
    // *@output -
    // *@author Jirayut Saifah
    // *@Create Date 20/07/2021
}