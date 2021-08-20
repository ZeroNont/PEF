<!--
    /*
    *Main
    *controller of main page
    *@author Nattakorn
    *@Create date 2564-07-16
    *@Update date 2564-07-18
    */
-->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/../MainController.php");

class Main extends MainController
{
	/*
	* show_main
	* show main page of web
	* @input -
	* @output -
	* @author Nattakorn
	* @Create Date 2564-7-16
	*/
	function show_main()
	{
		
		$this->output('consent/v_main');
	}
	

}
// 