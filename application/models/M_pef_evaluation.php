<!--
    M_pef_evaluation
    Model for evaluation module
    @author Phatchara and Pontakon
    Create date 13/08/2564   
    Update date 26/7/2564
-->
<?php
include_once("Da_pef_evaluation.php");

class M_pef_evaluation extends Da_pef_evaluation
{
    public function __construct()
    {
        parent::__construct();
    }
    /*
	* get_all
	* 
	* @input 	-
	* @output 	
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    public function get_nominee($id)
    {
        $sql = "SELECT employee.Emp_ID,employee.Empname_eng,employee.Empsurname_eng,position.Pos_shortName,sectioncode.Department 
        FROM dbmc.employee 
        INNER JOIN pefs_database.pef_group_nominee AS nominee 
        ON nominee.grn_emp_id = employee.Emp_ID 
        INNER JOIN dbmc.position 
        ON position.Position_ID = employee.Position_ID 
        INNER JOIN dbmc.sectioncode 
        ON sectioncode.Sectioncode = employee.Sectioncode_ID 
        WHERE Emp_ID = nominee.grn_emp_id AND nominee.grn_grp_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }//คืนค่า Nominee

    /*
	* get_all
	* 
	* @input 	-
	* @output 	
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/
    public function get_assessor($id_ss)
    {
        $sql = "SELECT *
                FROM pefs_database.pef_assessor AS ass
                INNER JOIN pefs_database.pef_group_assessor AS groupass
                ON ass.ase_id = groupass.gro_ase_id
                INNER JOIN pefs_database.pef_group AS gr
                ON gr.grp_id = groupass.gro_grp_id
                INNER JOIN pefs_database.pef_group_nominee AS groupno
                ON gr.grp_id = groupno.grn_grp_id
                INNER JOIN dbmc.employee
                ON groupno.grn_emp_id = employee.Emp_ID 
                INNER JOIN dbmc.position 
                ON position.Position_ID = employee.Position_ID 
                INNER JOIN dbmc.sectioncode 
                ON sectioncode.Sectioncode = employee.Sectioncode_ID 
                WHERE ass.ase_emp_id = $id_ss";
                
        $query = $this->db->query($sql);
        return $query;
    }//คืนค่ากลุ่ม Assessor

    public function get_group($id){
        $sql = "SELECT * FROM pefs_database.pef_group AS gr
                INNER JOIN pefs_database.pef_group_assessor AS groupass
                ON gr.grp_id = groupass.gro_grp_id
                WHERE gr.grp_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }//คืนค่ากลุ่มประเมิน

    function get_group_nominee($id)
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group_nominee AS groupno
                INNER JOIN pefs_database.pef_group AS gr
                WHERE groupno.grn_grp_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }//คืนค่ากลุ่ม Nominee

    /*
	* get_by_id
	* คืนค่าใบคำขอที่ตรงกับ $id(เลขพนักงาน)
	* @input 	เลขพนักงาน
	* @output 	ข้อมูลตารางใบคำขอ
	* @author 	Phatchara  
	* @Create   Date 18/7/2564   
	* @author   Pontakon
	* @Update   Date 26/7/2564
	*/

    public function get_all_form_T6($position)
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
    }
   
    public function get_all_form_T5($position)
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
    }

    /*
    * get_position
    * คืนค่าตารางตำแหน่งที่มีตำแหน่งตรงกัน
    * @input     ตำแหน่ง
    * @output     ตารางตำแหน่ง
    * @author     Pontakon
    * @Create   Date 17/8/2564
    */
    public function get_position($position)
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_section
        WHERE pef_section.sec_level = '$position'";

        $query = $this->db->query($sql);
        return $query;
    }
}