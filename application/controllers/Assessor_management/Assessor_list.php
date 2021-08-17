<?php
/*
* Assessor_list.php
* Assessor Management
* @Niphat Kuhokciw
* @Create Date 2564-08-12
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Assessor_list extends MainController
{
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
* index
* 
* @input 
* @output 
* @author Niphat Kuhoksiw
* @Create Date 2564-8-12
*/
    function show_assessor($sec_id)
    {
        $this->load->model('M_pef_assessor_list', 'pef');
        $data['obj_assessor'] = $this->pef->get_sec_level($sec_id)->row();
        $data['arr_assessor'] = $this->pef->get_assessor($sec_id)->result();
        $this->output('admin/v_assessor_list',$data);
    }
    function search_by_ase_id()
    {
        $Ase_id = $this->input->post('Ase_id');
        $this->load->model('M_pef_assessor_list', 'pef');
        $data = $this->pef->get_addassessor($Ase_id)->result();
        echo json_encode($data);
    }
    public function delete_assessor($emp_id,$sec_id)
	{
        $this->load->model('Da_pef_assessor_list', 'pef');
        $this->pef->ase_emp_id = $emp_id;
        $this->pef->delete();
        redirect('Assessor_management/Assessor_list/show_assessor/'.$sec_id);
    }
}