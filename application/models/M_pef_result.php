<?php
/*
* M_pef_result
* Model Result
* @input  -
* @output - 
* @author Apinya Phadungkit
* @Create Date 2564-8-15
* @Update Date 2564-8-16
* @Update Date 2564-8-17
* @Update Date 2564-8-18
* @Update Date 2564-8-19
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
    * @Create Date 2564-8-16
    * @Update Date 2564-8-18
    * @Update Date 2564-8-19
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
                ON gnor.grn_promote_to = pos.Position_ID
                INNER JOIN pefs_database.pef_section AS sec
                ON pos.position_level_id = sec.sec_id
                WHERE gnor.grn_status = ? AND gass.gro_ase_id = ?";

        $query = $this->db->query($sql,array($this->grn_status,$this->gro_ase_id));
        return $query;
    }//get_group ดึงข้อมูลที่ใช้แสดงใน Result list

    /*
    * Function get_by_id
    * @input  id  
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-8-16
    * @Update Date 2564-8-18
    * @Update Date 2564-8-19
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
    }//get_by_id ดึงข้อมูลที่อยู่ในตาราง group_nominee ที่join กับตาราง point_form โดยที่ ptf_emp_id ต้องมีค่าเท่ากับค่าในตัวแปร id ที่ถูกส่งมา

    /*
    * Function get_nomonee
    * @input  id  
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-8-16
    * @Update Date 2564-8-18
    * @Update Date 2564-8-19
    */
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
    }//get_nomonee ดึงข้อมูล nominee

    /*
    * Function get_position
    * @input  position  
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-8-16
    * @Update Date 2564-8-18
    * @Update Date 2564-8-19
    */
    public function get_position($position)
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_group_nominee AS gnor
        INNER JOIN dbmc.position AS pos
        ON gnor.grn_promote_to = pos.Position_ID
        INNER JOIN pefs_database.pef_section AS sec
        ON pos.position_level_id = sec.sec_id
        WHERE sec.sec_level = '$position'";

        $query = $this->db->query($sql);
        return $query;
    }//get_position ดึงข้อมูล position 

    /*
	* get_group_assessor
	* คืนค่ากลุ่มประเมินของ assessor
	* @input 	$=id (รหัส assessor)
	* @output 	กลุ่มประเมินของ assessor
	* @author 	Apinya Phadungkit
    * @Update   Date 2564-08-16
	* @Create   Date 2564-08-17 
	* @Update   Date 2564-08-18
	*/
    public function get_group_assessor($id){
        $sql = "SELECT *
            FROM pefs_database.pef_assessor AS ass
            INNER JOIN pefs_database.pef_group_assessor AS groupass
            ON ass.ase_emp_id = groupass.gro_ase_id
            INNER JOIN pefs_database.pef_group AS gr
            ON gr.grp_id = groupass.gro_grp_id
            INNER JOIN dbmc.employee
            ON ass.ase_emp_id = employee.Emp_ID 
            INNER JOIN dbmc.position 
            ON position.Position_ID = employee.Position_ID 
            INNER JOIN dbmc.sectioncode 
            ON sectioncode.Sectioncode = employee.Sectioncode_ID
            INNER JOIN dbmc.company
            ON employee.Company_ID = company.Company_ID
            WHERE Emp_ID = ass.ase_emp_id && ass.ase_emp_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }//ดึงข้อมูลกลุ่ม Assessor

    /*
	* get_group_nominee
	* คืนค่ากลุ่มประเมินของ nominee
	* @input 	$emp_id (รหัส Nominee)
	* @output 	กลุ่มประเมินของ Nominee
	* @author 	Apinya Phadungkit
    * @Update   Date 2564-08-16
	* @Create   Date 2564-08-17 
	* @Update   Date 2564-08-18
	*/
    public function get_group_nominee($emp_id)
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group_nominee AS groupno
                INNER JOIN dbmc.employee
                ON groupno.grn_emp_id = employee.Emp_ID 
                INNER JOIN dbmc.position 
                ON position.Position_ID = employee.Position_ID 
                INNER JOIN dbmc.sectioncode 
                ON sectioncode.Sectioncode = employee.Sectioncode_ID
                INNER JOIN dbmc.company
                ON employee.Company_ID = company.Company_ID
                WHERE Emp_ID = groupno.grn_emp_id && groupno.grn_emp_id = $emp_id";

        $query = $this->db->query($sql);
        return $query;
    }//ดึงข้อมูลกลุ่ม nominee

    /*
	* get_all_form
	* คืนค่ากลุ่มประเมินของ nominee
	* @input 	$id (รหัส Nominee),$position
	* @output 	ประเมินของ Nominee
	* @author 	Apinya Phadungkit
    * @Update   Date 2564-08-16
	* @Create   Date 2564-08-17 
	* @Update   Date 2564-08-18
	*/
    public function get_all_form($id,$position) //t5-6
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_format_form
        INNER JOIN pefs_database.pef_description_form
        ON pef_description_form.des_id=pef_format_form.for_des_id
        INNER JOIN pefs_database.pef_item_form
        ON pef_description_form.des_itm_id= pef_item_form.itm_id
        INNER JOIN pefs_database.pef_point_form AS poi
        ON pef_item_form.itm_id = poi.ptf_row

        WHERE pef_format_form.for_pos_level= '$position' AND poi.ptf_emp_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }//ประเมินของ Nominee T5,T6

    /*
	* get_all_M_AGM_GM
	* คืนค่ากลุ่มประเมินของ nominee
	* @input 	$position
	* @output 	ประเมินของ Nominee
	* @author 	Apinya Phadungkit
    * @Update   Date 2564-08-16
	* @Create   Date 2564-08-17 
	* @Update   Date 2564-08-18
	*/
    public function get_all_M_AGM_GM($position) //t2-4
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_format_form
        INNER JOIN pefs_database.pef_description_form
        ON pef_description_form.des_id=pef_format_form.for_des_id
        INNER JOIN pefs_database.pef_item_form
        ON pef_description_form.des_itm_id= pef_item_form.itm_id
        WHERE pef_format_form.for_pos_level= '$position';";
        $query = $this->db->query($sql);
        return $query;
    }//ประเมินของ Nominee T2,T3,T4

    /*
	* get_comment
	* คืนค่ากลุ่มประเมินของ nominee
	* @input 	$id
	* @output 	commentประเมินของ Nominee
	* @author 	Apinya Phadungkit
    * @Update   Date 2564-08-16
	* @Create   Date 2564-08-17 
	* @Update   Date 2564-08-18
	*/
    public function get_comment($id){
        $sql = "SELECT *
        FROM pefs_database.pef_point_form AS poi
        INNER JOIN pefs_database.pef_performance_form AS per
        ON poi.ptf_emp_id = per.per_emp_id
        WHERE poi.ptf_emp_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }//commentประเมินของ Nominee

    /*
	* get_score
	* คืนค่ากลุ่มประเมินของ nominee
	* @input 	$id
	* @output 	คะแนนประเมินของ Nominee
	* @author 	Apinya Phadungkit
    * @Update   Date 2564-08-16
	* @Create   Date 2564-08-17 
	* @Update   Date 2564-08-18
	*/
    public function get_score($id){
        $sql = "SELECT *
        FROM pefs_database.pef_point_form AS poi
        WHERE poi.ptf_emp_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }//คะแนนประเมินของ Nominee

    /*
	* get_all_form_M_AGM_GM
	* คืนค่าแบบฟอร์มการประเมิน T2-4
	* @input 	$position
	* @output 	ข้อมูลแบบฟอร์มการประเมิน T2-4
	* @author 	Phatchara Khongthandee
	* @Create   Date 2564-08-15 
	* @Update   Date 2564-08-16
	*/
    public function get_all_form_M_AGM_GM($position)
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_format_form
        INNER JOIN pefs_database.pef_description_form
        ON pef_description_form.des_id=pef_format_form.for_des_id
        INNER JOIN pefs_database.pef_item_form
        ON pef_description_form.des_itm_id= pef_item_form.itm_id
        WHERE pef_format_form.for_pos_level= '$position';";
        $query = $this->db->query($sql);
        return $query;
    }//ข้อมูลแบบฟอร์มการประเมิน T2-4
    
}