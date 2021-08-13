<?php
/*
* Da_ttp_request
* Model Request Form
* @input  - 
* @output - 
* @author Apinya Phadungkit
* @Create Date 2564-7-18
* @Update Date 2564-7-28
*/
?>


<?php
defined('BASEPATH') or exit('No direct script access allowed');

include_once('pefs_model.php');

class Da_ttp_request extends pefs_model
{
    public $app_reject_reason; //ตัวแปรเพื่อมารับค่า เหตุผลที่ปฏิเสธแบบฟอร์มคำขออนุญาต
    
    /*
    * Function __construct
    * @input  -   
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function __construct()
    {
        parent::__construct();
    }//__construct
    
    /*
    * Function update_reject
    * @input  -   
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function update_reject()
    {
        $sql = "UPDATE ttps_database.approval AS app
                SET app.app_reject_reason = ?
                WHERE app.app_form_id = ? "; 
        $this->db->query($sql, array($this->app_reject_reason,$this->app_form_id));
    } //update_reject เพิ่มเหตุผลในการปฏิเสธลงในตาราง approval

    /*
    * Function update_form
    * @input  -   
    * @output -
    * @author Apinya Phadungkit
    * @Create Date 2564-7-18
    * @Update Date 2564-7-28
    */
    function update_form()
    {
        $sql = "UPDATE ttps_database.requested_form AS req
                SET req.req_status = ?
                WHERE req.req_form_id = ? "; 
        $this->db->query($sql, array($this->req_status,$this->req_form_id));
    } //update_form อัพเดทสถานะของฟอร์มที่ถูกยกเลิกโดยหัวหน้างาน

    
}