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

include_once ('Da_ttp_renewal.php');
class M_ttp_renewal extends Da_ttp_renewal
{

    public function __construct()
    {
        parent::__construct();
    }

     /*
    * getall
    * select data from database
    * @input -
    * @output data output
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function get_all($id)
    {
        $sql = "SELECT *
                FROM ttps_database.requested_form As emp
                WHERE emp.req_emp_id = $id AND emp.req_form_count <= 3";

        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_schedule
    * get data from table schedule
    * @input -
    * @output -
    * @author Nattakorn
    * @Create date 2564-07-19
    */
    public function get_schedule($id)
    {
        $sql = "SELECT *
                FROM ttps_database.schedule  ";

        $query = $this->db->query($sql);
        return $query;
    }
    /*
    * get_formfile
    * select data from database
    * @input -
    * @output data output
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function get_formfile()
    {
        $sql =
        "SELECT *
            FROM ttps_database.form_file";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_company
    * select data from database
    * @input -
    * @output data output
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function get_company()
    {
        $sql =
        "SELECT *
            FROM dbmc.company";
        $query = $this->db->query($sql);
        return $query;
    }

   /*
    * get_supervisor
    * select data from database
    * @input -
    * @output data output
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function get_supervisor()
    {
        $sql =
        "SELECT *
        FROM dbmc.employee";
        $query = $this->db->query($sql);
        return $query;
    }
    
    /*
    * get_plan
    * select data from database
    * @input -
    * @output data output
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function get_plan()
    {
        $sql =
            "SELECT *
            FROM ttps_database.plant AS pla INNER JOIN dbmc.employee AS emp
            ON pla.pla_emp_id = emp.Emp_ID ";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_status
    * select data from database
    * @input -
    * @output data output
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function get_status()
    {
        $sql =
            "SELECT *
            FROM ttps_database.requested_form As stat 
            WHERE CURDATE() <= req_end_date  AND stat.req_status = 4 
           
            LIMIT 0,30";
        $query = $this->db->query($sql);
        return $query;
    }

    /*
    * get_bydate
    * select data from database
    * @input -
    * @output data output
    * @author Nattkorn
    * @Create date 2564-07-19
    */
    public function get_bydate($Form_ID)
    {
        $sql =
            "SELECT * 
                FROM  ttps_database.requested_form
                
                WHERE  req_form_id=$Form_ID ";
        $query = $this->db->query($sql);
        return $query;
    }

    
    
}