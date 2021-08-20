<?php
/*
	* M_pef_assessor_list.php
    * M_pef_assessor_list Assessor Management
    * @author : Niphat Kuhokciw
    * @Create : Date 2564-08-12
*/
include_once("Da_pef_assessor_list.php");

class M_pef_assessor_list extends Da_pef_assessor_list
{//class M_pef_assessor_list

/*
* get_sec_level
* get_sec_level in database
* @input sec_id
* @output - 
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/
    public function get_sec_level($sec_id)
    {//get_sec_level
        $sql ="SELECT * FROM  pefs_database.pef_section
        WHERE sec_id = $sec_id";
        $query = $this->db->query($sql);
        return $query;
        
    }//end get_sec_level

/*
* get_assessor
* get_assessor in database
* @input sec_id and year
* @output - 
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/
    function get_assessor($sec_id,$year)
    {//get_assessor
        $sql ="SELECT * FROM pefs_database.pef_assessor as asse
        LEFT JOIN   pefs_database.pef_section as psec ON asse.position_level = psec.sec_id
        INNER JOIN dbmc.employee as dem
        ON dem.Emp_ID =  asse.ase_emp_id
        INNER JOIN dbmc.group_secname AS gsec 
        ON gsec.Sectioncode = dem.Sectioncode_ID
        INNER JOIN dbmc.position AS pos
        ON pos.Position_ID = dem.Position_ID
        WHERE sec_id = $sec_id AND ase_date = $year ";
        $query = $this->db->query($sql);
        return $query;
    }//end get_assessor

/*
* get_addassessor
* get_addassessor in database
* @input Emp_ID
* @output - 
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/
    function get_addassessor($Emp_ID)
    {//get_addassessor
        $sql ="SELECT * 
        FROM dbmc.employee as emp
        WHERE Emp_ID = $Emp_ID";
        $query = $this->db->query($sql);
        return $query;
    }//end get_addassessor

/*
* get_year
* get_year in database
* @input -
* @output - 
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/
    public function get_year()
    {//get_year
        $sql = "SELECT *
                FROM pefs_database.pef_group
                GROUP BY YEAR(grp_date) ";
        $query = $this->db->query($sql);
        return $query;
    }//end get_year
/*
* cheack_data
* cheack_data in database
* @input grp_date
* @output - 
* @author Niphat Kuhokciw
* @Create @Create Date 2564-08-12
*/
    public function cheack_data()
    {//cheack_data
    $sql = "SELECT *
        FROM pefs_database.pef_group AS grp
        INNER JOIN  pefs_database.pef_group_assessor  AS gass
        ON gass.gro_grp_id = grp.grp_id
        WHERE  YEAR(grp.grp_date) = ?";
    $query = $this->db->query($sql,array($this->grp_date));
    return $query;
    }//end cheack_data

}//end class M_pef_assessor_list