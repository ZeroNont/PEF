<?php
/*
*M_pef_review
*model for reviewer
*@author Nattakorn
*Create date 2564-08-13
*Update date 2564-08-19
*/
defined('BASEPATH') or exit('No direct script access allowed');

include_once('Da_pef_review.php');
class M_pef_review extends Da_pef_review
{

    public function __construct()
    {
        parent::__construct();
    }
    /*
    * get_section
    * get section from database
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-08-13
    */
    public function get_section()
    {
        $sql =
            "SELECT *
            FROM pefs_database.pef_section";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_group_by_T
    * get position from database
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-08-13
    */
    function get_group_by_T()
    {
        $sql =
            "SELECT *
            FROM pefs_database.pef_group as grp
            INNER JOIN  pefs_database.pef_section as sec
            ON sec.sec_id = grp.grp_position_group
            WHERE grp.grp_position_group = ?
            ";
        $query = $this->db->query($sql, array($this->grp_position_group));
        return $query;
    }

    /* get_group_by_DATE
    * get date from database
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-08-13
    */
    function get_group_by_DATE()
    {
        $sql =
            "SELECT *
            FROM pefs_database.pef_group as grp
            Inner JOIN  pefs_database.pef_section as sec
            ON sec.sec_id = grp.grp_position_group
            WHERE grp.grp_date = ?
            ";
        $query = $this->db->query($sql, array($this->grp_date));
        return $query;
    }


    /*
    * get_group_by_T_DATE
    * get position and date from database
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-08-13
    */
    function get_group_by_T_DATE()
    {
        $sql =
            "SELECT *
            FROM pefs_database.pef_group as grp
            Inner JOIN  pefs_database.pef_section as sec
            ON sec.sec_id = grp.grp_position_group
            WHERE grp.grp_date = ? AND grp.grp_position_group = ?
            ";
        $query = $this->db->query($sql, array($this->grp_date, $this->grp_position_group));
        return $query;
    }

    /*
    * get_nom_group
    * select all from nominee group
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-08-13
    */
    public function get_nom_group()
    {
        $sql =
            "SELECT *
            FROM pefs_database.pef_group_nominee as nom
            LEFT JOIN   pefs_database.pef_group  as grp
             ON nom.grn_id = grp.grp_id
             ";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_nom_id
    * get nom_id from database
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-08-13
    */
    public function get_nom_id()
    {
        $sql =
            "SELECT *
            FROM pefs_database.pef_group_nominee as nom
            LEFT JOIN   pefs_database.pef_group  as grp
             ON nom.grn_id = grp.grp_id
            WHERE nom.grn_id = ? ";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_search_data
    * get data from database for search
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-08-13
    */
    public function get_search_data($date, $grp_id, $promote_to)
    {
        $sql =
            "SELECT *
        FROM pefs_database.pef_group_nominee as nom
        LEFT JOIN   pefs_database.pef_group  as grp
         ON nom.grn_id = grp.grp_id
         WHERE grp_date = $date AND grn_promote_to = $promote_to AND grn_id=$grp_id ";
        $query = $this->db->query($sql);
        return $query;
    }
}