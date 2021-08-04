<!-- /*
* v_report_detail
* Display detail of requests for permission
* @input    Form_ID
* @output   -
* @author   Chakrit
* @Create Date 2564-07-25
* @Update Date 2564-07-26
*/ -->

<!-- <a href='#' id='download_link' onClick='javascript:ExcelReport();' class="btn btn-primary float-right"><i class="fa fa-download"></i> Export Excel</a> -->

<h1>
    &nbsp; Report Detail (รายละเอียดรายงานข้อมูล)
</h1>
<br>
<div class="card-header">
    <h1 style="text-align:center">
        Running No.
        <?php if ($Form_data->req_hr_no == '') { ?>
            <td><?php echo '-'; ?></td>
        <?php } else { ?>
            <td><?php echo $Form_data->req_hr_no; ?></td>
        <?php } ?>
        <br>
        ------------------------------------------------------------------------------------------
    </h1>
    <br>
    <h2 style="text-align:left">
        <b>Company :</b> <?php echo $Form_data->Company_name . ' ' . "(" .  $Form_data->Company_name_th . ")" ?><br><br>
        <b>Requester :</b> <?php echo $Form_data->req_officer; ?><br><br>
        <b>Plant No. :</b> <?php echo $Form_data->pla_plant_no; ?><br><br>
        <b>Plant Name. :</b> <?php echo $Form_data->pla_plant_name; ?><br><br>
        <b>Reason :</b> <?php echo $Form_data->req_reason; ?><br><br>
        <b>Requested date :</b> <?php echo date("d-m-Y", strtotime($Form_data->req_requested_date)); ?><br><br>
        <b>Approval date :</b> <?php echo date("d-m-Y", strtotime($Form_data->req_approve_date)) ?><br><br>
        <b>Starting date :</b> <?php echo date("d-m-Y", strtotime($Form_data->req_start_date)) ?><br><br>
        <b>End date :</b> <?php echo date("d-m-Y", strtotime($Form_data->req_end_date)) ?><br><br>
        <b>Approver :</b> <?php echo $Form_data->Empname_engTitle . ' ' . $Form_data->Empname_eng . ' ' . $Form_data->Empsurname_eng; ?><br><br>
        <?php
        if ($Form_data->req_status == '4') {
            $Status = 'ยังอยู่ในคลัง';
        } else if ($Form_data->req_status > '4') {
            $Status = 'สิ้นสุดการวาง';
        } else if ($Form_data->req_status < '4') {
            $Status = 'รอการอนุมัติ';
        }
        ?>
        <b>Status :</b> <?php echo $Status; ?><br>
    </h2>

    <br>

    <!-- <div class="row" id="count_table">
        <div class="col-xl-12">
            <div class="card">
                <div class="table-responsive" table id='myTable'>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Running No.</th>
                                <th scope="col">Company</th>
                                <th scope="col">Requester</th>
                                <th scope="col">Plant No.</th>
                                <th scope="col">Plant Name.</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Requested date</th>
                                <th scope="col">Approval date</th>
                                <th scope="col">Starting date</th>
                                <th scope="col">End date</th>
                                <th scope="col">Approver</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody id="data_table">
                            <tr>
                                <td><?php echo $Form_data->HR_No; ?></td>
                                <td><?php echo $Form_data->Company_name . ' ' . "(" .  $Form_data->Company_name_th . ")" ?></td>
                                <td><?php echo $Form_data->Officer; ?></td>
                                <td><?php echo $Form_data->Plant_No; ?></td>
                                <td><?php echo $Form_data->Plant_name; ?></td>
                                <td><?php echo $Form_data->Reason; ?></td>
                                <td><?php echo date("d-m-Y", strtotime($Form_data->Requested_date)); ?></td>
                                <td><?php echo date("d-m-Y", strtotime($Form_data->Approve_date)) ?></td>
                                <td><?php echo date("d-m-Y", strtotime($Form_data->Start_date)) ?></td>
                                <td><?php echo date("d-m-Y", strtotime($Form_data->End_date)) ?></td>
                                <td><?php echo $Form_data->Empname_engTitle . ' ' . $Form_data->Empname_eng . ' ' . $Form_data->Empsurname_eng; ?></td>
                                <?php
                                if ($Form_data->Status == '4') {
                                    $Status = 'ยังอยู่ในคลัง';
                                } else if ($Form_data->Status > '4') {
                                    $Status = 'สิ้นสุดการวาง';
                                } else if ($Form_data->Status < '4') {
                                    $Status = 'รอการอนุมัติ';
                                }
                                ?>
                                <td><?php echo $Status; ?></td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> -->
    <center><a href="<?php echo site_url() . 'Report/Report/show_report'; ?>" class="btn btn-secondary float-center"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></center>
</div>

<!-- <script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
<script src="https://unpkg.com/file-saver@1.3.3/FileSaver.js"></script>

<script>
    function ExcelReport() //function สำหรับสร้าง ไฟล์ excel จากตาราง
    {
        var sheet_name = "Report"; /* กำหหนดชื่อ sheet ให้กับ excel โดยต้องไม่เกิน 31 ตัวอักษร */
        var elt = document.getElementById('myTable'); /*กำหนดสร้างไฟล์ excel จาก table element ที่มี id ชื่อว่า myTable*/

        /*------สร้างไฟล์ excel------*/
        var wb = XLSX.utils.table_to_book(elt, {
            sheet: sheet_name
        });
        XLSX.writeFile(wb, 'SDM&SKD Temporary Tag Permission Report.xlsx'); //Download ไฟล์ excel จากตาราง html โดยใช้ชื่อว่า SDM&SKD Temporary Tag Permission Report.xlsx
    }
</script> -->