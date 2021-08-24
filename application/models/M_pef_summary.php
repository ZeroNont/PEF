<?php
/*
    * M_pef_summary
    * get data for summary
    * @input    -
    * @output   -
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
defined('BASEPATH') or exit('No direct script access allowed');

include_once("Da_pef_summary.php");

class M_pef_summary extends Da_pef_summary
{

    public function __construct()
    {
        parent::__construct();
    } //function construct

    /*
    * get_evaluation
    * get data for summary in performance form
    * @input    id
    * @output   -
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
    function get_evaluation($id)
    {
        $sql = "SELECT *
			FROM pefs_database.pef_performance_form
			WHERE per_emp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_group
    * get data for summary in gruop, section
    * @input    -
    * @output   -
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
    function get_group()
    {
        $sql = "SELECT *
			FROM pefs_database.pef_group AS grp 
            INNER JOIN pefs_database.pef_section AS sec
            ON grp.grp_position_group = sec.sec_id
			WHERE grp_date = ?";
        $query = $this->db->query($sql, array($this->grp_date));
        return $query;
    }

    /*
    * get_group_by_id
    * get data for summary in group, section
    * @input    id
    * @output   -
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
    function get_group_by_id($id)
    {
        $sql = "SELECT *
			FROM pefs_database.pef_group AS grp INNER JOIN pefs_database.pef_section AS sec
            ON grp.grp_position_group=sec.sec_id
			WHERE grp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_assessor
    * get data for summary in assessor
    * @input    id
    * @output   -
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
    function get_assessor($id)
    {
        $sql = "SELECT *
			FROM pefs_database.pef_group_assessor 
			WHERE gro_grp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_nominee
    * get data for summary in group_nominee, employee
    * @input    id
    * @output   -
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
    function get_nominee($id)
    {
        $sql = "SELECT *
			FROM pefs_database.pef_group_nominee AS nom
            INNER JOIN dbmc.employee AS emp
            ON nom.grn_emp_id=emp.Emp_ID
			WHERE nom.grn_grp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_nominee_by_id
    * get data for summary in group_nominee, performance_form
    * @input    id
    * @output   -
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
    function get_nominee_by_id($id)
    {
        $sql = "SELECT *
			FROM pefs_database.pef_group_nominee AS nom 
            INNER JOIN pefs_database.pef_performance_form AS per
            ON nom.grn_emp_id=per.per_emp_id
           
			WHERE grn_emp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_form
    * get data for summary in group_nominee, performance_form
    * @input    id
    * @output   -
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
    function get_form($id)
    {
        $sql = "SELECT *
			FROM pefs_database.pef_group_nominee AS nom 
            INNER JOIN pefs_database.pef_performance_form AS per
            ON nom.grn_emp_id=per.per_emp_id
			WHERE grn_grp_id=$id
			";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_ass_by_nor_id
    * get data assessor, group, nominee
    * @input    id
    * @output   get data assessor, group, nominee
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
    public function get_ass_by_grp_id($id)
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_assessor AS ass
                INNER JOIN pefs_database.pef_group_assessor AS gro
                ON ass.ase_emp_id = gro.gro_ase_id 
                INNER JOIN pefs_database.pef_group AS grp
                ON grp.grp_id = gro.gro_grp_id
                WHERE grp.grp_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_data_point_by_nor_id
    * get data point_form, nominee, group
    * @input    id
    * @output   get data point_form, nominee, group
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */
    public function get_data_point_by_grp_id($id)
    {
        $sql = "SELECT * 
                FROM pefs_database.pef_point_form AS poi
                INNER JOIN pefs_database.pef_group_nominee AS grn
                ON poi.ptf_emp_id = grn.grn_id
                INNER JOIN pefs_database.pef_group AS grp
                ON grp.grp_id = grn.grn_grp_id
                WHERE grp.grp_id = $id";
        $query = $this->db->query($sql);
        return $query;
    }
}
