<!--
    /*
    * Da_pef_evaluation
    * add evaluation form to database 
    * @Author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-16
    */
-->

<?php
include_once("pefs_model.php");

class Da_pef_evaluation extends pefs_model
{

    function construct()
    {
        parent::construct();
    }

    /*
    * insert_performance_form
    * เพิ่มข้อมูลลงใน database ตาราง pef_performance_form
    * @input  per_q_and_a, per_comment, per_date, per_emp_id, per_ase_id
    * @output -
    * @Author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-18
    * @Update Date 2564-08-19
    */
    function insert_performance_form()
    {
        $sql = "INSERT INTO pefs_database.pef_performance_form(per_q_and_a, per_comment, per_date, per_emp_id, per_ase_id) 
        VALUES (?,?,?,?,?)";

        $this->db->query($sql, array($this->per_q_and_a, $this->per_comment, $this->per_date, $this->per_emp_id, $this->per_ase_id));
    }//เพิ่มข้อมูล Q&A, Comment, Date(วันที่ประเมิน), รหัส Nominee, Assessor ที่ประเมิน
    
    /*
    * insert_point
    * เพิ่มข้อมูลลงใน database ตาราง pef_point_form
    * @input  ptf_point, ptf_date, ptf_row, ptf_ase_id, ptf_for_id, ptf_emp_id, ptf_per_id
    * @output -
    * @Author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-18
    * @Update Date 2564-08-19
    */
    function insert_point()
    {

        $sql = "INSERT INTO pefs_database.pef_point_form(ptf_point, ptf_date, ptf_row, ptf_ase_id, ptf_for_id, ptf_emp_id, ptf_per_id)
        VALUES (?,?,?,?,?,?,?)";
        for ($i= 0; $i < count($this->ptf_for_id);$i++){
            $this->ptf_row =  1 ;
            $this->db->query($sql, array($this->ptf_point[$i], $this->ptf_date, $this->ptf_row, $this->ptf_ase_id, $this->ptf_for_id[$i], $this->ptf_emp_id, $this->ptf_per_id));
        }
    }//เพิ่มข้อมูล Point(คะแนน), Date(วันที่ประเมิน), row(คะแนนแต่ละข้อ), Assessor ที่ประเมิน, ID แบบฟอร์มประเมิน, รหัส Nominee, per_id

    /*
    * update_status
    * อัพเดตข้อมูล grn_status ใน database ตาราง pef_group_nominee
    * @input  grn_status, grn_emp_id
    * @output -
    * @Author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-18
    * @Update Date 2564-08-20
    */
    function update_status()
    {
        $sql = "UPDATE pefs_database.pef_group_nominee
        SET grn_status = ? 
        WHERE grn_emp_id = ?";

        $this->db->query($sql, array($this->grn_status,$this->grn_emp_id));
    }
    
    /*
    * update_status_group
    * อัพเดตข้อมูล grp_status ใน database ตาราง pef_group
    * @input  grp_status, grp_id
    * @output -
    * @Author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-21
    * @Update Date 2564-08-22
    */
    function update_status_group()
    {
        $sql = "UPDATE pefs_database.pef_group
        SET grp_status = 1
        WHERE grp_id = ?";

        $this->db->query($sql, array($this->grp_status, $this->grp_id));
    }

    /*
    * update_status_used
    * อัพเดตข้อมูล grp_status ลงใน database ตาราง pef_group
    * @input -
    * @output -
    * @Author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-20
    * @Update Date -
    */
    function update_status_used($group)
    {
        $sql = "UPDATE pefs_database.pef_group
        SET grp_status = '1'; 
        WHERE grp_id = $group";
    }//อัพเดต status จาก 0 เป็น 1


//-------------------------------------------------------------------------//
    /*สร้างมา เผื่อได้ใช้ในอนาคตอันใกล้  */

    /*
    * update_performance_form
    * อัพเดตข้อมูลใน database ตาราง pef_performance_form
    * @input  per_q_and_a, per_comment, per_date, per_emp_id, per_ase_id
    * @output -
    * @Author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-18
    * @Update Date 2564-08-20
    */
    function update_performance_form()
    {
        $sql = "UPDATE pefs_database.pef_performance_form
        SET per_q_and_a = ?, 
            per_comment = ?, 
            per_date = ?,  
            per_ase_id = ?
        WHERE per_emp_id = ?";

        $this->db->query($sql, array($this->per_q_and_a, $this->per_comment, $this->per_date, $this->per_emp_id, $this->per_ase_id));
    }//อัพเดทข้อมูล Q&A, Comment, Date(วันที่ประเมิน), รหัส Nominee, Assessor ที่ประเมิน

    /*
    * update_point
    * อัพเดตข้อมูลใน database ตาราง pef_point_form
    * @input  ptf_point, ptf_date, ptf_row, ptf_ase_id, ptf_for_id, ptf_emp_id, ptf_per_id
    * @output -
    * @Author Phatchara Khongthandee and Pontakon Mujit 
    * @Create Date 2564-08-18
    * @Update Date 2564-08-20
    */
    function update_point()
    {
        $sql = "UPDATE pefs_database.pef_point_form
        SET ptf_point = ?, 
            ptf_date = ?, 
            ptf_row = ?,  
            per_ase_id = ?,
            ptf_for_id = ?,
            ptf_per_id = ?
        WHERE ptf_emp_id = ?";
 
        $this->db->query($sql, array($this->ptf_point, $this->pef_date, $this->pef_row, $this->ptf_ase_id, $this->ptf_for_id, $this->ptf_emp_id, $this->ptf_per_id));
    }//อัพเดทข้อมูล Point(คะแนน), Date(วันที่ประเมิน), row(คะแนนแต่ละข้อ), Assessor ที่ประเมิน, ID แบบฟอร์มประเมิน, รหัส Nominee, per_id

}