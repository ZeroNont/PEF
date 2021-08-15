<?php
/*
* Assessor_input.php
* Assessor Management
* @Niphat Kuhokciw
* @Create Date 2564-08-12
*/
?>
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Assessor_input extends MainController
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
* insert
* insert assessor data into model
* @input  
* @output 
* @author 	Niphat Kuhoksiw
* @Create Date 2564-8-12
*/
    function insert()
    {
        $this->load->model('Da_pef_assessor_list', 'pef');
        $this->pef->gro_ase_id = $this->input->post('ase_id');
        $this->pef->insert();
        redirect('Assessor_management/Assessor_list/show_assessor');
    }   
}

