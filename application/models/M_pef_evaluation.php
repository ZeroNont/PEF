<!--
    M_pef_evaluation
    Model for evaluation module
    @author Phatchara Khongthandee and Pontakon Mujit 
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
	* get_assessor
	* คืนค่าชื่อกรรมการ ชื่อกลุ่ม วันที่ประเมิน จำนวนNomineeที่ต้องประเมิน ชื่อ Nominee ตำแหน่ง แผนก Promote to
	* @input 	$id_ass
	* @output 	
	* @author 	Phatchara Khongthandee and Pontakon Mujit 
	* @Create   Date 2564-08-15   
	* @Update   Date 2564-08-16
    * @Update   Date 2564-08-17
	*/
    public function get_assessor($id_ass)
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
                WHERE ass.ase_emp_id = $id_ass";
                
        $query = $this->db->query($sql);
        return $query;
    }//คืนค่าชื่อกรรมการ ชื่อกลุ่ม วันที่ประเมิน จำนวนNomineeที่ต้องประเมิน ชื่อ Nominee ตำแหน่ง แผนก Promote to



    /*
	* get_all_form_T6
	* คืนค่าแบบฟอร์มการประเมิน T6
	* @input 	$position
	* @output 	ข้อมูลแบบฟอร์มการประเมิน T6
	* @author 	Phatchara  
	* @Create   Date 2564-08-15 
	* @Update   Date 2564-08-16
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
   
    /*
	* get_all_form_T5
	* คืนค่าแบบฟอร์มการประเมิน T5
	* @input 	$position
	* @output 	ข้อมูลแบบฟอร์มการประเมิน T5
	* @author 	Phatchara Khongthandee
	* @Create   Date 2564-08-15 
	* @Update   Date 2564-08-16
	*/
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
    * @input    ตำแหน่ง
    * @output   ตารางตำแหน่ง
    * @author   Phatchara Khongthandee and Pontakon Mujit 
    * @Create   Date 2564-08-15
    * @Update   Date 2564-08-16
    */
    public function get_position($position)
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_section
        WHERE pef_section.sec_level = '$position'";

        $query = $this->db->query($sql);
        return $query;
    }

    public function get_group_assessor($id){
        $sql = "SELECT *
        FROM pefs_database.pef_assessor AS ass
        INNER JOIN pefs_database.pef_group_assessor AS groupass
        ON ass.ase_id = groupass.gro_ase_id
        INNER JOIN pefs_database.pef_group AS gr
        ON gr.grp_id = groupass.gro_grp_id
        WHERE ass.ase_id = $id";

        $query = $this->db->query($sql);
        return $query;
    }//คืนค่ากลุ่ม Assessor

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
    function get_group_nominee($emp_id)
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group_nominee AS groupno
                INNER JOIN pefs_database.pef_group AS gr
                WHERE groupno.grn_emp_id = $emp_id";

        $query = $this->db->query($sql);
        return $query;
    }//คืนค่ากลุ่ม Nominee

    /*
    * get_file_presant_nomonee
    * คืนค่าไฟล์นำเสนอ Nominee
    * @input    
    * @output   ไฟล์นำเสนอ Nominee
    * @author   Phatchara Khongthandee and Pontakon Mujit 
    * @Create   Date 2564-08-15
    * @Update   Date 2564-08-16
    */
    public function get_file_presant_nomonee()
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_file AS nofile
                INNER JOIN pefs_database.pef_group_nominee AS groupno
                ON nofile.fil_emp_id = groupno.grn_emp_id";
        $query = $this->db->query($sql);
        return $query;
    }

    public function get_nomonee($emp_id)
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
                WHERE Emp_ID = groupno.grn_emp_id && groupno.grn_emp_id = $emp_id";

        $query = $this->db->query($sql);
        return $query;
    }
}