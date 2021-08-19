<?php
/*
* Group_list
* Group detail to list
* @input  
* @output group detail
* @author Jirayut Saifah
* @Create Date 2564-8-13
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Group_list extends MainController
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
	* @author 	Jirayut Saifah
	* @Create Date 2564-8-13
	*/
    function index()
    {
        $this->load->model('M_pef_group', 'pef');
        $data['obj_group'] = $this->pef->get_group()->result();
        $this->output('consent/v_group_list', $data);
    }
     /*
	* delete_group
	* felete group from database
	* @author Jirayut Saifah
	* @Create Date 2564-8-16
	*/
    function delete_group($id)
    {
        $this->load->model('Da_pef_group', 'pefd');
        $this->pefd->grn_grp_id = $id;
        $this->pefd->grp_id = $id;
        $this->pefd->gro_grp_id = $id;
        $this->pefd->delete_group();
        $this->pefd->delete_group_assessor();
        $this->pefd->delete_group_nominee();
        $this->load->model('M_pef_group', 'pef');
        $data['obj_group'] = $this->pef->get_group()->result();
        $this->output('consent/v_group_list', $data);
    }
}
// 