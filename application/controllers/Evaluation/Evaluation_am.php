<!--
    Check_schedule
    Controller for check schedule module
    @input -
    @output -
    @author Apinya Phadungkit
    Create date 13/8/2564 
    Update date 14/8/2564
-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Evaluation_am extends MainController
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
	* show_evaluation_am
	* แสดงหน้าจอ v_evaluation_am
	* @input  -
	* @output  หน้าจอประเมินคะแนนของ AM
	* @author  Apinya Phadungkit  
	* @Create Date 13/8/2564 
	*/
    function show_evaluation_am()
    {
        
        $this->output('consent/v_evaluation_am');
    }// function show_evaluation_am()

}