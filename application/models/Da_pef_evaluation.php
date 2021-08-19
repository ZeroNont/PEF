<!--
    Da_pef_evaluation
    database for evaluation module
    @input -
    @output -
    @author Phatchara
    Create date 13/08/2564 
    Update date 28/7/2564 
-->
<?php
include_once("pefs_model.php");

class Da_pef_evaluation extends pefs_model
{

    function construct()
    {
        parent::construct();
    }

    function insert_performance_form()
    {
        $sql = "INSERT INTO pefs_database.pef_performance_form(per_q_and_a, per_comment, per_date, per_emp_id, per_ase_id) 
        VALUES (?,?,?,?,?)";

        $this->db->query($sql, array($this->per_q_and_a, $this->per_comment, $this->per_date, $this->per_emp_id, $this->per_ase_id));
    }//เพิ่มข้อมูล Q&A, Comment, Date(วันที่ประเมิน), รหัส Nominee, Assessor ที่ประเมิน
    
    function insert_point()
    {

        $sql = "INSERT INTO pefs_database.pef_point_form(ptf_point, ptf_date, ptf_row, ptf_ase_id, ptf_for_id, ptf_emp_id, ptf_per_id)
        VALUES (?,?,?,?,?,?,?)";
        for ($i= 0; $i < count($this->ptf_for_id);$i++){
            $this->ptf_row = $i + 1 ;
        
            $this->db->query($sql, array($this->ptf_point[$i], $this->ptf_date, $this->ptf_row, $this->ptf_ase_id, $this->ptf_for_id[$i], $this->ptf_emp_id, $this->ptf_per_id));
        }
    }//เพิ่มข้อมูล Point(คะแนน), Date(วันที่ประเมิน), row(คะแนนแต่ละข้อ), Assessor ที่ประเมิน, ID แบบฟอร์มประเมิน, รหัส Nominee, per_id

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

    function update_point()
    {
        $sql = "UPDATE pefs_database.pef_performance_form
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