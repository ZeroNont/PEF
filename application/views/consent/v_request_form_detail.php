<?php
/*
* v_request_form_detail
* View Request Form
* @input  -
* @output - 
* @author Apinya Phadungkit
* @Create Date 2564-7-18
* @Update Date 2564-7-28
*/
?>

<!-- script ใช้ปิดแจ้งเตือนอันเก่า และแสดงแจ้งเตือนอันใหม่ -->
<script>
$(document).ready(function() {
    $("#btn_success").click(function() {
        $("#Modal_approve").hide();

    });

});
</script>

<h1>
    Request (อนุมัติคำร้องขออนุญาต)
</h1>
<div class="col-xl-12 order-xl-1">
    <div class="card">

        <div class="card-body ">

            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <!-- label Start Date -->
                            <label class="form-control-label" for="input-username">Start Date
                                (วันที่เริ่มต้น)</label>

                            <input type="date" name="Start_date" class="form-control" disabled
                                value="<?php echo $arr_req->req_start_date ?>">

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <!-- label End Date -->
                            <label class="form-control-label" for="input-email">End Date
                                (วันที่สิ้นสุด)</label>
                            <input type="date" name="End_date" class="form-control" disabled
                                value="<?php echo $arr_req->req_end_date ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <!-- label Item -->
                            <label class="form-control-label" for="input-first-name">Item
                                (สิ่งที่ต้องการวาง)</label>
                            <input type="text" name="Item" class="form-control" disabled
                                value="<?php echo $arr_req->req_item ?>">
                        </div>
                    </div>
                    <div class=" col-lg-12 ">
                        <div class=" form-group">
                            <!-- label Reason -->
                            <label class="form-control-label" for="input-last-name">Reason
                                (เหตุผลในการวาง)</label>
                            <input type="text" name="Reason" class="form-control" disabled
                                value="<?php echo $arr_req->req_reason ?>">
                        </div>
                    </div>
                </div>
            </div>


            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- label Officer in Charge -->
                            <label class="form-control-label" for="input-address">Officer in Charge
                                (ผู้รับผิดชอบ)</label>
                            <input class="form-control" type="text" name="Officer" disabled
                                value="<?php echo $arr_user->Empname_eng.' '.$arr_user->Empsurname_eng ?>">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <!-- label Tell No. -->
                            <label class="form-control-label" for="input-city">Tel No.
                                (เบอร์โทรศัพท์)</label>
                            <input type="text" class="form-control" name="Tell" disabled
                                value="<?php echo $arr_req->req_tel ?>">
                        </div>
                    </div>

                </div>
                <div class="row">

                    <div class="col-lg-6">
                        <div class="form-group">
                            <!-- label Layout -->
                            <label class="form-control-label" for="input-country">Layout
                                (รูปแบบการวาง)</label>
                            <br>
                            <a href="<?php echo base_url() ?>assets/file/layout/<?php echo $arr_req->fil_layout_location ?>"
                                download>
                                <button type="button" class="btn btn-danger" id="button_size">
                                    <i class="fas fa-file-alt text-dark"></i>
                                    &nbsp;&nbsp;File
                                </button>
                            </a>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <!-- label Plan -->
                            <label class="form-control-label" for="input-country">Plan
                                (แผนการวาง)</label>
                            <br>
                            <a href="<?php echo base_url() ?>assets/file/Plan/<?php echo $arr_req->fil_plan_location ?>"
                                download>
                                <button type="button" class="btn btn-danger" id="button_size">
                                    <i class="fas fa-file-alt text-dark"></i>
                                    &nbsp;&nbsp;File
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
            <hr>
            <div class="row">
                <div class="col-lg-4">

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-danger btn-lg float-right" data-toggle="modal"
                        data-target="#Modal_reject">
                        Reject
                    </button>

                </div>

                <div class="col-lg-4">

                    <!-- ปุ่มยืนยันการอนุมัติ -->
                    <button type="button" class="btn btn-success btn-lg float-right" data-toggle="modal"
                        data-target="#Modal_approve">
                        Approve
                    </button>

                </div>
            </div>


        </div>
    </div>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="Modal_reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <!-- label Reject Reason -->
                <label for="" class="form-control-label">
                    กรุณากรอกเหตุผล
                </label>

                <form method="POST" action="<?php echo site_url().'/request/Request_form/reject_form/'.$arr_req->req_form_id; ?>">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" name="app_reject_reason" class="form-control"
                                    placeholder="เหตุผลในการปฏิเสธ" required>
                            </div>
                        </div>
                    </div>
            </div>


            <div class="modal-footer">
                <!-- ปุ่มปิดการกรอกเหตุผล -->
                <button type="button" class="btn btn-danger btn-lg float-right" data-dismiss="modal">Cancel</button>

                <!-- ปุ่มยืนยันการกรอกเหตุผล -->
                <button type="submit" class="btn btn-success btn-lg float-right">Submit</button>
            </div>

            </form>

        </div>
    </div>
</div>

<!-- Modal ยืนยันการอนุมัติคำขอ -->
<div class="modal fade" id="Modal_approve" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                <h1 class="modal-title" id="ModalLabel">ยืนยันการอนุมัติคำขอ</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-lg float-right" data-dismiss="modal">Cancel</button>

                <!-- ปุ่มยืนยันการอนุมัติคำขอ -->
                <button type="button" class="btn btn-success btn-lg float-right" id="btn_success" data-toggle="modal"
                    data-target="#successModal">
                    Submit
                </button>
            </div>

        </div>
    </div>
</div>
<!-- end modal ยืนยันการอนุมัติคำขอ -->

<!-- model แจ้งเจือน อนุมัติคำขอสำเร็จ -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body" align="center">
                <h1> อนุมัติคำขอสำเร็จ </h1>
            </div>
            <div class="modal-footer">
                <a href="<?php echo site_url() . 'request/Request_form/update_request_form/'. $arr_req->req_form_id ; ?>">
                    <button type="button" class="btn btn-success btn-lg float-right">Agree</button>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- end modal แจ้งเจือน อนุมัติคำขอสำเร็จ -->