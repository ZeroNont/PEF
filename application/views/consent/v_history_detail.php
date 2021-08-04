<!--
    v_history_detail
    display for detail of history
    @author Phatchara and Pontakon
    Create date 22/7/2564   
    Update date 25/7/2564
    Update date 26/7/2564
    Update date 27/7/2564
    Update date 28/7/2564
    Update date 30/7/2564
-->
<style>
     #card_radius
    {
        border-radius: 20px;
    }
    #card_padding
    {
        padding: 1.5rem;
    }

    #card_align
    {
        text-align: 20px;
    }
    #button_UPsize
    {
        
        width: 100px;
    }

</style> 
    
    <!-- Card Detail form -->
<h1>History Form (ประวัติคำขอวางของ)</h1>
    <div class="col-xl-12 order-xl-1">
        <div class="card" id="card_radius">
            
            <div class="card-body ">
                <form action="<?php echo site_url() . 'licence_form/licence_input/insert'; ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">Start Date
                                        (วันที่เริ่มต้น)</label>

                                        <input type="date" name="Start_date" class="form-control" required value="<?php echo $arr_form->req_start_date ?>" disabled>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">End Date
                                        (วันที่สิ้นสุด)</label>
                                        <input type="date" name="End_date" class="form-control" required value="<?php echo $arr_form->req_end_date ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">Item
                                        (สิ่งที่ต้องการวาง)</label>
                                    <input type="text" name="Item" class="form-control" require value="<?php echo $arr_form->req_item ?>" disabled>
                                </div>
                            </div>
                            <div class=" col-lg-12 ">
                                <div class=" form-group">
                                    <label class="form-control-label" for="input-last-name">Reason
                                        (เหตุผลในการวาง)</label>
                                    <input type="text" name="Reason" class="form-control" require value="<?php echo $arr_form->req_reason ?>" disabled> 
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">Officer in Charge
                                        (ผู้รับผิดชอบ)</label>
                                    <input class="form-control" type="text" name="Officer" require value="<?php echo $arr_emp[0]->Empname_eng . " " . $arr_emp[0]->Empsurname_eng; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-city">Tel No.
                                        (เบอร์โทรศัพท์)</label>
                                    <input type="text" class="form-control" name="Tell" require value="<?php echo $arr_form->req_tel ?>" disabled>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Layout
                                        (รูปแบบการวาง)</label>
                                        <br>
                                        <a href="<?php echo base_url()?>assets/file/layout/<?php echo $arr_file[0]->fil_layout_location ?>" download> 
                                        <button type="button" class="btn btn-danger" id="button_size">
                                    <i class="fas fa-file-alt text-dark"></i>
                                                    &nbsp;&nbsp;File
                                                </button> </a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-country">Plan
                                        (แผนการวาง)</label>
                                        <br>
                                        <a href="<?php echo base_url()?>assets/file/Plan/<?php echo $arr_file[0]->fil_plan_location ?>" download>  
                                                <button type="button" class="btn btn-danger" id="button_size">
                                                    <i class="fas fa-file-alt text-dark"></i>
                                                        &nbsp;&nbsp;File
                                                </button> 
                                        </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                </form>
            </div>
        </div>
    </div>

<!-- ========== ข้อมูลผู้พิจารณา ========== -->
        <?php if ($arr_form->req_status != 1) { ?>
            <div class="card-body">            
                <h3>ข้อมูลผู้พิจารณา</h3>
                                <div class="row">
                                    <!-- แสดงชื่อหัวหน้า อนุมัติ -->
                                    <?php if ($arr_form->req_status == 2 || $arr_form->req_status == 3 || $arr_form->req_status == 4  || $arr_form->req_status == -2 || $arr_form->req_status == -1 ||$arr_form->req_status == 5) { ?>
                                        <div class="col-6 col-md-4" id="card_align"><span><b>ชื่อผู้อนุมัติ : </b>
                                            <?php echo $arr_his->Empname_eng . " " . $arr_his->Empsurname_eng; ?>
                                            <br>
                                            <b>ตำแหน่ง : </b>หัวหน้างาน
                                            <?php //แสดงตำแหน่ง
                                            $newDate = date("d/m/Y", strtotime($arr_list->app_supervisor_date)); ?>
                                            <br>
                                            <b>วันที่อนุมัติ : </b>
                                            <?php echo $newDate;  ?><br></span>
                                        </div>
                                    <?php }
                                    //  <!-- แสดงชื่อ HR อนุมัติ -->
                                    if ( $arr_form->req_status == 3 || $arr_form->req_status == -2 || $arr_form->req_status == 4 ||$arr_form->req_status == 5) { ?>
                                        <div class="col-6 col-md-4"><span><b>ชื่อผู้อนุมัติ : </b>
                                                <?php echo $arr_his_hr->Empname_eng . " " . $arr_his_hr->Empsurname_eng; ?>
                                                <br>
                                            <b>ตำแหน่ง : </b>HR 
                                            <?php //แสดงตำแหน่ง
                                                $newDate = date("d/m/Y", strtotime($arr_list->app_hr_date)); ?>
                                                <br>
                                            <b>วันที่อนุมัติ : </b>
                                                <?php echo $newDate;  ?><br></span>
                                        </div>
                                        <?php }
                                     //  <!-- แสดงชื่อ Approve Plant อนุมัติ -->
                                    if ( $arr_form->req_status == 4 || $arr_form->req_status == 5) { ?>
                                       <div class="col-6 col-md-4"><span><b>ชื่อผู้อนุมัติ : </b>
                                            <?php echo $arr_his_ap->Empname_eng . " " . $arr_his_ap->Empsurname_eng; ?>
                                            <br>
                                            <b>ตำแหน่ง : </b>Approve Plant
                                            <?php //แสดงตำแหน่ง
                                            $newDate = date("d/m/Y", strtotime($arr_list->app_approval_plant_date)); ?>
                                            <br>
                                            <b>วันที่อนุมัติ : </b>
                                            <?php echo $newDate;  ?><br></span>
                                        </div>
                                    <?php }
                                    // <!-- แสดงชื่อหัวหน้า ปฎิเสธ -->
                                    if ($arr_form->req_status == 0 ) { ?>
                                        <div class="col-6 col-md-4"><span><b>ชื่อผู้ปฏิเสธ : </b>
                                            <?php echo $arr_his->Empname_eng . " " . $arr_his->Empsurname_eng  ?>
                                            <br>
                                            <b>ตำแหน่ง : </b>หัวหน้างาน 
                                            <?php //แสดงตำแหน่ง
                                                $newDate = date("d/m/Y", strtotime($arr_list->app_supervisor_date)); ?>
                                            <br>
                                            <b>วันที่ปฏิเสธ : </b>
                                                <?php echo $newDate;  ?> 
                                                <br>   
                                            <b>เหตุผลที่ปฏิเสธ : </b>
                                            <?php echo $arr_list->app_reject_reason;?></span>
                                        </div>
                                    <?php } 
                                    // <!-- แสดงชื่อ HR ปฎิเสธ -->
                                    if ($arr_form->req_status == -1 ) { ?>
                                        <div class="col-6 col-md-4"><span><b>ชื่อผู้ปฏิเสธ : </b>
                                            <?php echo $arr_his_hr->Empname_eng . " " . $arr_his_hr->Empsurname_eng;  ?>
                                            <br>
                                            <b>ตำแหน่ง : </b>HR 
                                            <?php //แสดงตำแหน่ง
                                                $newDate = date("d/m/Y", strtotime($arr_list->app_hr_date)); ?>
                                                 <br>
                                            <b>วันที่ปฏิเสธ : </b>
                                                <?php echo $newDate;  ?>
                                            <br>
                                            <b>เหตุผลที่ปฏิเสธ : </b>
                                                <?php echo $arr_list->app_reject_reason;?></span>
                                            </div>
                                            <?php }
                                     // <!-- แสดงชื่อ Approve Plant ปฎิเสธ -->
                                    else if ($arr_form->req_status == -2 ) { ?>
                                        <div class="col-6 col-md-4"><span><b>ชื่อผู้ปฏิเสธ : </b>
                                            <?php echo $arr_his_ap->Empname_eng . " " . $arr_his_ap->Empsurname_eng  ?>
                                            <br>
                                            <b>ตำแหน่ง : </b>Approve Plant <br>
                                            <?php //แสดงตำแหน่ง
                                                $newDate = date("d/m/Y", strtotime($arr_list->app_approval_plant_date)); ?>
                                            <b>วันที่ปฏิเสธ : </b>
                                                <?php echo $newDate;  ?>
                                            <br>
                                            <b>เหตุผลที่ปฏิเสธ : </b>
                                            <?php echo $arr_list->app_reject_reason;?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
            </div>
            <br>
        <?php } ?>

        <a href="<?php echo base_url().'history/History/show_history_employee/'.$_SESSION['UsEmp_ID']?>" >  
                        <center><button type="button" class="btn btn-secondary btn-lg canter" id='button_UPsize'  ><i class="fas fa-arrow-alt-circle-left"></i>Back</button> </center>
                    </a>
            <br>
            <br>
    