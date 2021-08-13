<?php
/*
* ttp_model
* -
* @author JIRAYUT SAIFAH
* @Create Date 2564-7-15
*/ ?>
<?php
class pefs_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->pefs = $this->load->database('pefs', TRUE);
	}
}