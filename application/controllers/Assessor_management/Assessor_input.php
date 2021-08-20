<?php
/*
* Assessor_input.php
* Assessor Management
* @author : Niphat Kuhokciw
* @Create Date : 2564-08-12
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Assessor_input extends MainController
{//class Assessor_input
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
* insert
* insert assessor data into model
* @input  sec_id
* @output insert assessor to the database
* @author 	Niphat Kuhoksiw
* @Create Date 2564-08-12
*/
    function insert($sec_id )
    {//insert
        $this->load->model('Da_pef_assessor_list', 'pef');
        $this->pef->ase_emp_id = $this->input->post('ase_id');
        $this->pef->position_level = $sec_id ;
        $this->pef->ase_date = date('Y') ;
        $this->pef->insert();
        redirect('Assessor_management/Assessor_list/show_assessor/'.$sec_id);
    }//end insert  
}//end class Assessor_input

