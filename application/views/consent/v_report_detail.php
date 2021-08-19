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
            Promote to <?php echo $sec_data[0]->sec_level ?>
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
                            <?php
                            $num = 1;
                            for ($i = 0; $i < count($sec_data); $i++) {
                            ?>
                                <?php
                                if ($sec_data[$i]->grn_status == '1' || $sec_data[$i]->grn_status == '2') {
                                ?>
                                    <tr>
                                        <td><?php echo $num++; ?></td>
                                        <td><?php echo $sec_data[$i]->grn_emp_id; ?></td>
                                        <td><?php echo $sec_data[$i]->Empname_eng . ' ' . $sec_data[$i]->Empsurname_eng; ?></td>
                                        <td><?php echo $sec_data[$i]->grp_id; ?></td>
                                        <td><?php echo $sec_data[$i]->Position_name; ?></td>
                                        <?php
                                        if ($sec_data[$i]->grn_status == '1') {
                                            $Status = 'Pass'; ?>
                                            <td><span style="color:green;"><?php echo $Status; ?></span></td>
                                        <?php } else if ($sec_data[$i]->grn_status == '2') {
                                            $Status = 'Fail'; ?>
                                            <td><span style="color:red;"><?php echo $Status; ?></span></td>
                                        <?php } ?>
                                        <td><a href="<?php echo site_url() . 'Report/Report/show_report_detail_assessor/' . $sec_data[$i]->grn_emp_id; ?>">
                                                <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </a>
                                        </td>
                                    <?php } ?>
                                    </tr>
                                <?php } ?>
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