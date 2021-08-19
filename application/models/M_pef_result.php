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
                ON gass.gro_ase_id = ass.ase_emp_id
                INNER JOIN pefs_database.pef_group_nominee AS gnor
                ON gass.gro_grp_id = gnor.grn_grp_id
                INNER JOIN dbmc.employee AS emp
                ON gnor.grn_emp_id = emp.Emp_ID 
                INNER JOIN dbmc.position AS pos
                ON emp.Position_ID = pos.Position_ID
                WHERE gnor.grn_status = ? AND gass.gro_ase_id = ?";

        $query = $this->db->query($sql,array($this->grn_status,$this->gro_ase_id));
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
                FROM pefs_database.pef_group_nominee AS gnor
                INNER JOIN pefs_database.pef_point_form AS pform
                ON  gnor.grn_emp_id = pform.ptf_emp_id
                WHERE pform.ptf_emp_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }//get_by_id ดึงข้อมูลที่อยู่ในตาราง requested_form ที่join กับตาราง form_file โดยที่ Form_ID ต้องทีค่าเท่ากับค่าในตัวแปร id ที่ถูกส่งมา

    public function get_nomonee($id)
    {
        $sql = "SELECT employee.Emp_ID,employee.Empname_eng,employee.Empsurname_eng,position.Position_name,position.Pos_shortName,sectioncode.Department,company.Company_name
                FROM pefs_database.pef_group_nominee AS groupno
                INNER JOIN dbmc.employee
                ON groupno.grn_emp_id = employee.Emp_ID 
                INNER JOIN dbmc.position 
                ON position.Position_ID = employee.Position_ID 
                INNER JOIN dbmc.sectioncode 
                ON sectioncode.Sectioncode = employee.Sectioncode_ID
                INNER JOIN dbmc.company
                ON employee.Company_ID = company.Company_ID
                WHERE Emp_ID = groupno.grn_emp_id && groupno.grn_emp_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }

    public function get_group_assessor($id){
        $sql = "SELECT *
        FROM pefs_database.pef_assessor AS ass
        INNER JOIN pefs_database.pef_group_assessor AS groupass
        ON ass.ase_emp_id = groupass.gro_ase_id
        INNER JOIN pefs_database.pef_group AS gr
        ON gr.grp_id = groupass.gro_grp_id
        INNER JOIN dbmc.employee AS emp
        ON groupass.gro_ase_id = emp.Emp_ID 
        WHERE ass.ase_emp_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }//คืนค่ากลุ่ม Assessor

    public function get_position($position)
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_group_nominee AS gnor
        INNER JOIN dbmc.position AS pos
        ON gnor.grn_promote_to = pos.Position_ID
        INNER JOIN pefs_database.pef_section AS sec
        ON pos.position_level_id = sec.sec_id
        WHERE pos.Position_ID = '$position'";

        $query = $this->db->query($sql);
        return $query;
    }

    public function get_all_form($id) //t5
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_format_form
        INNER JOIN pefs_database.pef_description_form
        ON pef_description_form.des_id=pef_format_form.for_des_id
        INNER JOIN pefs_database.pef_item_form
        ON pef_description_form.des_itm_id= pef_item_form.itm_id
        INNER JOIN pefs_database.pef_point_form AS poi
        ON pef_item_form.itm_id = poi.ptf_row

        WHERE pef_format_form.for_pos_level= 'T5' AND poi.ptf_emp_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_comment($id){
        $sql = "SELECT *
        FROM pefs_database.pef_point_form AS poi
        INNER JOIN pefs_database.pef_performance_form AS per
        ON poi.ptf_emp_id = per.per_emp_id
        WHERE poi.ptf_emp_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }//คืนค่ากลุ่ม Assessor

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