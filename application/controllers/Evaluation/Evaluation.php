<!--
    Check_schedule
    Controller for check schedule module
    @input -
    @output -
    @author Phatchara and Pontakon 
    Create date 18/7/2564 
    Update date 25/7/2564
-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Evaluation extends MainController
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
	* show_evaluation
	* แสดงหน้าจอ v_check_schedule
	* @input  -
	* @output   หน้าจอระยะเวลาใบคำขอ
	* @author 	Phatchara Khongthandee   
	* @Create Date 13/08/2564 
    * @author   Pontakon Mujit
    * @Update Date 25/7/2564
	*/
    function show_evaluation()
    {
        
        $this->output('consent/v_evaluation');
    }// function show_evaluation

    /*
	* show_evaluation_mts
	* แสดงหน้าจอ v_evaluation_mts
	* @input  -
	* @output   หน้าจอระยะเวลาใบคำขอ
	* @author 	Phatchara Khongthandee   
	* @Create Date 13/08/2564 
    * @author   Pontakon Mujit
    * @Update Date 25/7/2564
	*/
    function show_evaluation_mts()
    {
        
        $this->output('consent/v_evaluation_mts');
    }// function show_evaluation_mts

}