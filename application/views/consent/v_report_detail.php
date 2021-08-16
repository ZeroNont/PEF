<!-- /*
* v_report_detail
* Display detail of requests for permission
* @input    Form_ID
* @output   -
* @author   Chakrit
* @Create Date 2564-08-16
* @Update Date 2564-08-
*/ -->

<a href='#' id='download_link' onClick='javascript:ExcelReport();' class="btn btn-secondary btn-lg canter float-right"><i class="fa fa-download"></i> Export Excel</a>

<h1>
    &nbsp; Report Detail (รายละเอียดรายงานข้อมูล)
</h1>
<br>
<div class="card-header">
    <h2>
        Promote to T
    </h2>
    <br>
    <div class="row" id="count_table">
        <div class="col-xl-12">
            <div class="card">
                <div class="table-responsive" table id='myTable'>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Employee ID</th>
                                <th scope="col">List of assessed </th>
                                <th scope="col">Group ID</th>
                                <th scope="col">Position</th>
                                <th scope="col">Status</th>
                                <th scope="col">Details</th>
                            </tr>
                        </thead>
                        <tbody id="data_table">
                            <tr>
                                <!-- <td><?php echo $Form_data->HR_No; ?></td>
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
                                <td><?php echo $Status; ?></td> -->

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <center><a href="<?php echo site_url() . 'Report/Report/show_report'; ?>" class="btn btn-secondary float-center"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></center>
</div>

<script src="https://unpkg.com/xlsx/dist/xlsx.full.min.js"></script>
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
</script>