<!--
    /* 
    * M_pef_evaluation
    * Model for evaluation module
    * @author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-14  
    */
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
	* get_all_list
	* คืนค่าชื่อกรรมการ, ชื่อกลุ่ม, วันที่ประเมิน, จำนวน Nominee ที่ต้องประเมิน, ชื่อ Nominee, ตำแหน่ง, แผนก, Promote to
	* @input   id_ass
	* @output  ชื่อกรรมการ, ชื่อกลุ่ม, วันที่ประเมิน, จำนวน Nominee ที่ต้องประเมิน, ชื่อ Nominee, ตำแหน่ง, แผนก, Promote to
	* @author  Phatchara Khongthandee and Pontakon Mujit 
	* @Create  Date 2564-08-15   
	* @Update  Date 2564-08-16
    * @Update  Date 2564-08-17
	*/
    public function get_all_list($id_ass)
    {
        $sql = "SELECT * 
        FROM pefs_database.pef_assessor AS ass
        INNER JOiN pefs_database.pef_group_assessor AS groupass
        ON ass.ase_emp_id = groupass.gro_ase_id
        INNER JOIN pefs_database.pef_group AS gr
        ON gr.grp_id = groupass.gro_grp_id
        INNER JOIN pefs_database.pef_group_nominee AS groupno
        ON groupno.grn_grp_id = gr.grp_id
        INNER JOIN dbmc.position 
        ON position.Position_ID = groupno.grn_promote_to 
        INNER JOIN pefs_database.pef_section AS sec
        ON sec.sec_id = gr.grp_position_group 
        INNER JOIN dbmc.employee AS employee
        ON groupno.grn_emp_id = employee.Emp_ID 
		INNER JOIN dbmc.position AS pos 
        ON pos.Position_ID = groupno.grn_promote_to 
        WHERE  ass.ase_emp_id =  '$id_ass'";
        $query = $this->db->query($sql);
        return $query;
    } //คืนค่าชื่อกรรมการ, ชื่อกลุ่ม, วันที่ประเมิน, จำนวน Nominee ที่ต้องประเมิน, ชื่อ Nominee, ตำแหน่ง, แผนก, Promote to

    /*
	* get_group_assessor
	* คืนค่ากลุ่มประเมินของ assessor
	* @input   emp_id (รหัส Nominee)
	* @output  กลุ่มประเมินของ Nominee
	* @author  Phatchara Khongthandee and Pontakon Mujit 
    * @Update  Date 2564-08-16
	* @Create  Date 2564-08-17 
	* @Update  Date 2564-08-18
	*/
    public function get_group_assessor($id)
    {
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
    } //คืนค่ากลุ่ม Assessor

    /*
	* get_group_nominee
	* คืนค่ากลุ่มประเมินของ Nominee
	* @input   emp_id (รหัส Nominee)
	* @output  กลุ่มประเมินของ Nominee
	* @author  Phatchara Khongthandee and Pontakon Mujit 
    * @Update  Date 2564-08-16
	* @Create  Date 2564-08-17 
	* @Update  Date 2564-08-18
	*/

    function get_group_nominee($emp_id)
    {
        $sql = "SELECT *
                FROM pefs_database.pef_group_nominee AS groupno
                INNER JOIN pefs_database.pef_group AS gr
                ON gr.grp_id = groupno.grn_grp_id
                -- INNER JOIN pefs_database.pef_section AS sec
                -- ON sec.sec_level = gr.grp_position_group
                -- INNER JOIN dbmc.position AS po
                -- ON groupno.grn_promote_to = po.Position_ID
                WHERE groupno.grn_emp_id = $emp_id";

        $query = $this->db->query($sql);
        return $query;
    } //คืนค่ากลุ่ม Nominee

    /*
    * get_file_present_nominee
    * คืนค่าไฟล์นำเสนอ Nominee
    * @input    $emp_id (รหัส Nominee)
    * @output   ไฟล์นำเสนอ Nominee
    * @author   Phatchara Khongthandee and Pontakon Mujit 
    * @Create   Date 2564-08-15
    * @Update   Date 2564-08-16
    */
    public function get_file_present_nominee($grn_emp_id)
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_file AS nofile
                INNER JOIN pefs_database.pef_group_nominee AS groupno
                ON nofile.fil_emp_id = groupno.grn_emp_id
                WHERE groupno.grn_emp_id = $grn_emp_id";

        $query = $this->db->query($sql);
        return $query;
    }

    /*
	* get_nominee
	* คืนค่าข้อมูลของ Nominee
	* @input 	$emp_id (รหัส Nominee)
	* @output 	รหัสพนักงาน, ชื่อ-นามสกุล, ตำแหน่ง, แผนก, ชื่อบริษัท
	* @author 	Phatchara Khongthandee and Pontakon Mujit 
	* @Create   Date 2564-08-15 
	* @Update   Date 2564-08-16
	*/
    public function get_nominee($grn_emp_id)
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
                WHERE Emp_ID = groupno.grn_emp_id && groupno.grn_emp_id = $grn_emp_id";

        $query = $this->db->query($sql);
        return $query;
    }

    public function get_file_nominee()
    {
        $sql = "SELECT *
                FROM pefs_database.pef_file";
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

    /*
	* get_all_form_m_agm_gm
	* คืนค่าแบบฟอร์มการประเมิน ของ Promote T2 T3 & T4
	* @input 	position
	* @output 	ข้อมูลแบบฟอร์มการประเมิน ของ Promote T2 T3 & T4
	* @author 	Phatchara Khongthandee and Pontakon Mujit 
	* @Create   Date 2564-08-15 
	* @Update   Date 2564-08-16
	*/
    public function get_all_form_m_agm_gm($position)
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_format_form
        INNER JOIN pefs_database.pef_description_form
        ON pef_description_form.des_id=pef_format_form.for_des_id
        INNER JOIN pefs_database.pef_item_form
        ON pef_description_form.des_itm_id= pef_item_form.itm_id
        WHERE pef_format_form.for_pos_level= 'T$position';";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
	* get_all_form_amsssv_mtssp
	* คืนค่าแบบฟอร์มการประเมิน T5 & T6
	* @input  position
	* @output ข้อมูลแบบฟอร์มการประเมิน T5 & T6
	* @author Phatchara Khongthandee and Pontakon Mujit 
	* @Create Date 2564-08-15 
	* @Update Date 2564-08-16
	*/
    public function get_all_form_amsssv_mtssp($position)
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_format_form
        INNER JOIN pefs_database.pef_description_form
        ON pef_description_form.des_id=pef_format_form.for_des_id
        INNER JOIN pefs_database.pef_item_form
        ON pef_description_form.des_itm_id= pef_item_form.itm_id
        WHERE pef_format_form.for_pos_level= 'T$position';";
        $query = $this->db->query($sql);
        return $query;
    }
    /*
	* get_point
	* คืนค่าคะแนนของฟอร์ม
	* @input   position
	* @output  ข้อมูลคะแนนของฟอร์ม
	* @author  Phatchara Khongthandee and Pontakon Mujit 
	* @Create  Date 2564-08-18 
	* @Update  Date 2564-08-19
	*/
    function get_point()
    {
        $sql = "SELECT MAX(per_id) AS max_id
        FROM pefs_database.pef_performance_form";

        $query = $this->db->query($sql);
        return $query;
    }
    /*
	* get_point_list
	* คืนค่าคะแนนของแต่ละฟอร์ม
	* @input 	position
	* @output 	คืนค่าคะแนนของแต่ละฟอร์ม
	* @author 	Phatchara Khongthandee and Pontakon Mujit 
	* @Create   Date 2564-08-18 
	* @Update   Date 2564-08-19
	*/
    function get_point_list($id, $id_emp)
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_point_form
        WHERE pef_point_form.ptf_emp_id = '$id_emp'AND pef_point_form.ptf_ase_id = '$id' ";

        $query = $this->db->query($sql);
        return $query;
    }

    /*
	* get_ase_id
	* คืนค่าคะแนนของแต่ละฟอร์ม
	* @input 	position
	* @output 	คืนค่าคะแนนของแต่ละฟอร์ม
	* @author 	Phatchara Khongthandee and Pontakon Mujit 
	* @Create   Date 2564-08-18 
	* @Update   Date 2564-08-19
    */
    function get_ase_id($id)
    {
        $sql = "SELECT pef_assessor.ase_id 
        FROM pefs_database.pef_assessor 
        WHERE pef_assessor.ase_emp_id = '$id'";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
	* get_performance
	* คืนค่าคะแนนของแต่ละฟอร์ม
	* @input 	position
	* @output 	คืนค่าคะแนนของแต่ละฟอร์ม
	* @author 	Phatchara Khongthandee and Pontakon Mujit 
	* @Create   Date 2564-08-18 
	* @Update   Date 2564-08-19
    */
    function get_performance($id, $id_emp)
    {
        $sql = "SELECT *
        FROM  pefs_database.pef_performance_form
        WHERE pef_performance_form.per_ase_id = '$id' AND pef_performance_form.per_emp_id = '$id_emp'";
        $query = $this->db->query($sql);
        return $query;
    }
}
