<?php
/*
* Group_edit
* show plant detail to list
* @input  
* @output Plant detail
* @author Jirayut Saifah
* @Create Date 2564-7-22
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Group_edit extends MainController
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
	* @author 	Jirayut Saifah
	* @Create Date 2564-7-21
	*/

    function index($id)
    {
        $this->load->model('M_pef_group', 'pef');
        $data['obj_sec'] = $this->pef->get_section()->result();
        $data['group_id'] = $id;
        $this->pef->grp_id = $id;
        $data['obj_group'] = $this->pef->get_group_by_id()->row();
        $this->output('consent/v_group_edit', $data);
    }
    function get_assessor()
    {
        // echo $_GET['group'];
        $this->load->model('M_pef_group', 'pef');
        $this->pef->gro_grp_id = $this->input->post('group');
        $data = $this->pef->get_assessor_by_group()->result();
        echo json_encode($data);
    }
    function edit()
    {
        $date = $this->input->post('date');
        $position_group = $this->input->post('position_group');
        $assessor = $this->input->post('emp');
        $nominee = $this->input->post('emp_nominee');
        $pos_id = $this->input->post('pos_id');
        $this->load->model('Da_pef_group', 'pefd');
        $this->load->model('M_pef_group', 'pef');
        $this->pefd->grp_date = $date;
        $this->pefd->grp_position_group = $position_group;
        $this->pefd->insert_group();
        $group_id = $this->pef->get_group_id()->result();
        // print_r($group_id);
        // echo $group_id[0]->grp_id;
        for ($i = 0; $i < sizeof($assessor); $i++) {
            $this->pefd->gro_grp_id = $group_id[0]->grp_id;
            $this->pefd->gro_ase_id = $assessor[$i];
            $this->pefd->insert_assessor();
        }
        for ($i = 0; $i < sizeof($nominee); $i++) {
            $this->pefd->grn_grp_id = $group_id[0]->grp_id;
            $this->pefd->grn_emp_id = $nominee[$i];
            $this->pefd->grn_status = 1;
            $this->pefd->grn_promote_to = $pos_id[$i];
            $this->pefd->insert_nominee();
        }
        $data['obj_sec'] = $this->pef->get_section()->result();
        $this->output('consent/v_group_list', $data);
        // $this->load->model('Da_pef_group', 'pef');

    }
}
// 