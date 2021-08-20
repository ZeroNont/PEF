<?php
/*
* Assessor_list.php
* Assessor Management
* @author : Niphat Kuhokciw
* @Create Date : 2564-08-12
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Assessor_list extends MainController
{//class Assessor_list
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
/*
* show_assessor
* show assessor 
* @input  sec_id
* @output show the assessor table
* @author Niphat Kuhoksiw
* @Create Date 2564-8-12
*/
    function show_assessor($sec_id)
    {//show assessor
        $this->load->model('M_pef_assessor_list', 'pef');
        $data['obj_assessor'] = $this->pef->get_sec_level($sec_id)->row();
        $data['obj_year'] = $this->pef->get_year($sec_id)->result();
        $data['arr_assessor'] = $this->pef->get_assessor($sec_id,date('Y'))->result();
        $this->pef->grp_date = date('Y');
        $data['arr_cheack'] = $this->pef->cheack_data()->result();
        $data['sec_id'] = $sec_id ;
        $data['year_select'] = date('Y') ;
        $this->output('admin/v_assessor_list',$data);
    }//end show assessor

/*
* search_by_ase_id
* search ase_id 
* @input  Ase_id
* @output search ase_id in the database
* @author Niphat Kuhoksiw
* @Create Date 2564-8-12
*/
    function search_by_ase_id()
    {//search
        $Ase_id = $this->input->post('Ase_id');
        $this->load->model('M_pef_assessor_list', 'pef');
        $data = $this->pef->get_addassessor($Ase_id)->result();
        echo json_encode($data);
    }////end search

/*
* delete_assessor
* delete assessor
* @input  Ase_id and sec_id
* @output delete assessor in the database
* @author Niphat Kuhoksiw
* @Create Date 2564-8-12
*/
    public function delete_assessor($Ase_id,$sec_id)
	{//delete
        $this->load->model('Da_pef_assessor_list', 'pef');
        $this->pef->ase_id = $Ase_id;
        $this->pef->delete();
        redirect('Assessor_management/Assessor_list/show_assessor/'.$sec_id);
    }//end delete

/*
* show_year
* show year
* @input  sec_id
* @output show the year table
* @author Niphat Kuhoksiw
* @Create Date 2564-8-12
*/
    function show_year($sec_id)
    {//show year
        $year = $this->input->post('year');

        $this->load->model('M_pef_assessor_list', 'pef');
        $data['obj_assessor'] = $this->pef->get_sec_level($sec_id)->row();
        $data['obj_year'] = $this->pef->get_year($sec_id)->result();
        $data['arr_assessor'] = $this->pef->get_assessor($sec_id,$year)->result();
        $this->pef->grp_date = $year;
        $data['arr_cheack'] = $this->pef->cheack_data()->result();
        $data['sec_id'] = $sec_id ;
        $data['year_select'] = $year ;
        $this->output('admin/v_assessor_list',$data);
    }//end show year
}//end class Assessor_list