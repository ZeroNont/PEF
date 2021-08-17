<?php
/*
* M_pef_result
* Model Result
* @input  -
* @output - 
* @author Apinya Phadungkit
* @Create Date 2564-8-15
* @Update Date 2564-8-16
*/
?>

<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once ('Da_pef_result.php');

class M_pef_result extends Da_pef_result
{

    /*
    * Function __construct
    * @input  -   
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-8-15
    * @Update Date 2564-8-16
    */
    function __construct()
    {
        parent::__construct();
    }

    /*
    * Function get_group
    * @input  -   
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function get_group()
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group AS gro
                INNER JOIN pefs_database.pef_group_assessor AS gass
                ON gro.grp_id = gass.gro_grp_id
                INNER JOIN pefs_database.pef_assessor AS ass
                ON gass.gro_ase_id = ass.ase_id
                INNER JOIN pefs_database.pef_group_nominee AS gnor
                ON gass.gro_grp_id = gnor.grn_grp_id
                INNER JOIN dbmc.employee AS emp
                ON gnor.grn_emp_id = emp.Emp_ID 
                WHERE gnor.grn_status = ?";

        $query = $this->db->query($sql,array($this->grn_status));
        return $query;
    }//get_all_sup ดึงข้อมูลที่อยู่ในตาราง requested_form ที่join กับตาราง approval และตาราง employee

    /*
    * Function get_all
    * @input  -   
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function get_all()
    {
        $sql = "SELECT *
                FROM ttps_database.requested_form
                INNER JOIN dbmc.employee 
                ON  requested_form.req_emp_id = employee.Emp_ID ";

        $query = $this->db->query($sql);
        return $query;
    }//get_all ดึงข้อมูลที่อยู่ในตาราง requested_form ที่join กับตาราง employee 

    /*
    * Function get_all_sup
    * @input  -   
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function get_all_sup()
    {
        $sql = "SELECT *
                FROM ttps_database.requested_form AS form
                INNER JOIN ttps_database.approval AS app
                ON app.app_form_id = form.req_form_id
                INNER JOIN dbmc.employee AS emp
                ON form.req_emp_id = emp.Emp_ID 
                WHERE app.app_supervisor_id = ? AND form.req_status = ?";

        $query = $this->db->query($sql,array($this->app_supervisor_id,$this->req_status));
        return $query;
    }//get_all_sup ดึงข้อมูลที่อยู่ในตาราง requested_form ที่join กับตาราง approval และตาราง employee

    /*
    * Function get_by_id
    * @input  id  
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function get_by_id($id)
    {
        $sql = "SELECT *
                FROM ttps_database.requested_form AS req
                INNER JOIN ttps_database.form_file AS form
                ON  req.req_form_id = form.fil_form_id
                WHERE req.req_form_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }//get_by_id ดึงข้อมูลที่อยู่ในตาราง requested_form ที่join กับตาราง form_file โดยที่ Form_ID ต้องทีค่าเท่ากับค่าในตัวแปร id ที่ถูกส่งมา

    /*
    * Function get_hr_no
    * @input  - 
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function get_hr_no()
    {
        $sql = "SELECT *
                FROM ttps_database.requested_form AS req
                WHERE req.req_hr_no LIKE 'HR%'
                ORDER BY req.req_hr_no DESC LIMIT 1";
        $query = $this->db->query($sql);
        return $query;
    }//get_hr_no ดึงข้อมูล HR_No ที่อยู่ในตาราง requested_form

    /*
    * Function update_app
    * @input  - 
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function update_app()
    {
        $sql = "UPDATE ttps_database.approval AS app
                SET app.app_supervisor_date = CURRENT_TIMESTAMP()
                WHERE app.app_form_id = ? "; 
        $this->db->query($sql, array($this->app_form_id));
    } //update_app อัพเดทข้อมูลในตาราง approval

    /*
    * Function get_history_user
    * @input  $id
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function get_history_user($id)
    {
        $sql = "SELECT *
                FROM ttps_database.requested_form AS req
                INNER JOIN dbmc.employee AS emp
                ON  req.req_emp_id = emp.Emp_ID
                WHERE req.req_form_id = $id";
        $query = $this->db->query($sql);
        return $query;
    } //get_history_user ใช้ดูประวัติว่าผู้ใช้งานคนไหนเป็นผู้ร้องขอแบบฟอร์ม
    
}