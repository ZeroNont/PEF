<!--
    v_renew_form
    display for add date
    @input Form_ID
    @output date chahnge
    @author Nattakorn
    Create date 2564-07-19
    Update date 2564-07-27
-->
<div class="col-xl-12 order-xl-1">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">Renewal form ( แบบฟอร์มขอต่ออายุ )</h3>
                </div>

            </div>
        </div>
        <div class="card-body ">
            <form action="<?php echo site_url() . 'Renewal/Renewal/update_date/'; ?>" method='post'
                enctype="multipart/form-data">

                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">

                            <input type="text"  class="form-control"  name="Form_ID" value='<?php echo $arr_renew[0]->req_form_id?>' hidden>
                            <input type="text"  class="form-control"  name="set_Enddate" value='<?php echo $arr_renew[0]->req_end_date ?>' hidden>
                            <input type="text"  class="form-control"  name="Form_count" value='<?php echo $arr_renew[0]->req_form_count ?>' hidden>
                            <input type="text"  class="form-control"  name="Status" value='<?php echo $arr_renew[0]->req_status ?>' hidden>
                                <!--อัพเดท/เพิ่มวันขออนุญาตวาง-->
                                <label class="form-control-label" for="input-email">Add Days (กำหนดเวลาที่ต้องการเพิ่ม)
                                <select class="form-control" name="Add_date" style="text-align:center"  ><br>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>   
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                
                                </select>
                             
                               <?php 
                               $arr_renew[0]->req_end_date=strtotime(date("Y-m-d", strtotime($arr_renew[0]->req_end_date)+1) ."days");
                               echo  $arr_renew[0]->req_end_date;
                               ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label" for="input-first-name">Item
                                    (สิ่งที่ต้องการวาง)</label>
                                <input type="text" name="Item" class="form-control"   value='<?php echo $arr_renew[0]->req_item ?>' disabled>
                            </div>
                        </div>
                        <div class=" col-lg-12 ">
                            <div class=" form-group">
                                <label class="form-control-label" for="input-last-name" >Reason
                                    (เหตุผลในการวาง)</label>
                                <input type="text" name="Reason" class="form-control" value='<?php echo $arr_renew[0]->req_reason?>'disabled>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-address">Officer in Charge
                                    (ผู้รับผิดชอบ)</label>
                                <input class="form-control" type="text" name="Officer" value='<?php echo $arr_renew[0]->req_officer?>' disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label" for="input-city">Tell No.
                                    (เบอร์โทรศัพท์)</label>
                                <input type="text" class="form-control" name="Tell" value='<?php echo $arr_renew[0]->req_tel?>' disabled>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                              
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-country">Layout
                                    (รูปแบบการวาง)
                                    
                                    <input type="text" class="form-control" name="Layout" 
                                    value='<?php echo $arr_formfile[0]->fil_layout_location?>' disabled>
                                </label>
                                    
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-country">Plan
                                    (แผนการวาง)
                                    <input type="text" class="form-control" name="Plan" 
                                    value='<?php echo $arr_formfile[0]->fil_plan_location?>' disabled>
                                </label>
                                   
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-city">Supervisor
                                    (หัวหน้างาน)</label><br>
                                    <input type="text" class="form-control" name="EMPname" 

                                    value='<?php echo $arr_supervisor[0]->Empname_th . " " . $arr_supervisor[0]->Empsurname_th ?>' disabled>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="input-city">Approve Plant
                                </label><br>
                                
                                <input type="text" class="form-control" name="Plant" value='<?php echo $arr_plan[0]->pla_plant_name?>' disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-lg float-right">Confirm</button>
            </form>
        </div>
    </div>
</div>
</div>