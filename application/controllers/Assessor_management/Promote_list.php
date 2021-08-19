<?php
/*
* Promote_list.php
* Assessor Management
* @Niphat Kuhokciw
* @Create Date 2564-08-12
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Promote_list extends MainController
{//class promote_list
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
* index
* @input -
* @output show promote list
* @author Niphat Kuhoksiw
* @Create Date 2564-8-12
*/
    function index()
    {//index
        $this->load->model('M_pef_promote_list', 'pef');
        $data['obj_promote'] = $this->pef->get_group()->result();
        $this->output('admin/v_promote_list',$data);
    }//end index
}//end class promote_list