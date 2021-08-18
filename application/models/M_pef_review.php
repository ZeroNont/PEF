<!--
    M_ttp_renewal
    select to get data
    @input -
    @output -
    @author Nattakorn
    Create date 2564-07-19
    Update date 2564-07-27
-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once('Da_pef_review.php');
class M_pef_review extends Da_pef_review
{

    public function __construct()
    {
        parent::__construct();
    }



    public function get_ass_group()
    {
        $sql =
            "SELECT *
            FROM pefs_database.pef_group_assessor";
        $query = $this->db->query($sql);
        return $query;
    }

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

    public function get_nom_id($id)
    {
        $sql =
            "SELECT *
            FROM pefs_database.pef_group_nominee as nom
            LEFT JOIN   pefs_database.pef_group  as grp
             ON nom.grn_id = grp.grp_id
            WHERE nom.grn_id = $id ";
        $query = $this->db->query($sql);
        return $query;
    }

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