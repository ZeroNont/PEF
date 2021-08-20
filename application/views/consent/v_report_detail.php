<!-- /*
* v_report_detail
* Display report detail of Performance Evaluation Factor System
* @input    sec_id
* @output   -
* @author   Chakrit
* @Create Date 2564-08-16
* @Update Date 2564-08-20
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
                <div class="table-responsive">
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
                                        <td><a href="<?php echo site_url() . 'Report/Report/show_report_detail_assessor/' . $sec_data[$i]->grn_id; ?>">
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

    <h2>
        Excel Report
    </h2>

    <?php
    $sum_point = 0;
    $point_total = [];
    $check_emp = '';
    $point_emp = [];
    $total = [];
    $get = [];
    foreach ($sec_data as $index_emp => $row_emp) {
        foreach ($ass_data as $index_ass => $row_ass) {
            foreach ($point_data as $index => $row) {
                if ($row_ass->ase_id == $row->ptf_ase_id && $row_emp->grn_id == $row->ptf_emp_id) {
                    $sum_point += intval($row->ptf_point);
                }
                //if 
            }
            //for each point_data
            if ($sum_point != 0) {
                array_push($point_total, $sum_point);
            } else {
                array_push($point_total, 0);
            }
            $sum_point = 0;
        }
        //for each ass_data
        if ($row_emp->grn_status > 0) {
            array_push($point_emp, $point_total);
            array_push($total, (sizeof($ass_data) * 5 * sizeof($ass_data)));
            array_push($get, array_sum($point_total));
        }
        $point_total = [];
    }
    //for each sec-data
    ?>

    <div class="row" id="count_table">
        <div class="col-xl-12">
            <div class="card">
                <div class="table-responsive" table id='myTable'>
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Emp.No.</th>
                                <th scope="col">Name - Surname</th>
                                <th scope="col">Department</th>
                                <th scope="col">Promote to</th>
                                <th scope="col">Presentation Date</th>
                                <th scope="col">Company</th>
                                <?php
                                for ($i = 0; $i < count($ass_data); $i++) { ?>
                                    <th scope="col"><?php echo $ass_data[$i]->Empname_eng; ?></th>
                                <?php } ?>
                                <th scope="col">Totally score</th>
                                <th scope="col">Get score</th>
                                <th scope="col">Total score pass ≥ 55%</th>
                                <th scope="col">Judgement</th>
                                <th scope="col">Assessors</th>
                            </tr>
                        </thead>
                        <tbody id="data_table">
                            <?php
                            $num = 1;
                            $index_point = 0;
                            for ($i = 0; $i < count($sec_data); $i++) {
                                if ($sec_data[$i]->grn_status == '1' || $sec_data[$i]->grn_status == '2') {
                            ?>
                                    <tr>
                                        <td><?php echo $num++; ?></td>
                                        <td><?php echo $sec_data[$i]->grn_emp_id; ?></td>
                                        <td><?php echo $sec_data[$i]->Empname_engTitle . ' ' . $sec_data[$i]->Empname_eng . ' ' . $sec_data[$i]->Empsurname_eng; ?></td>
                                        <td><?php echo $sec_data[$i]->Department; ?></td>
                                        <td><?php echo $sec_data[$i]->sec_name; ?></td>
                                        <td><?php echo date("d/m/Y", strtotime($sec_data[$i]->grp_date)); ?></td>
                                        <td><?php echo $sec_data[$i]->Company_shortname; ?></td>

                                        <?php
                                        foreach ($ass_data as $index_ass => $row_ass) { ?>
                                            <td><?php echo $point_emp[$index_point][$index_ass]; ?></td>
                                        <?php } ?>

                                        <td><?php echo $total[$index_point]; ?></td>
                                        <td><?php echo $get[$index_point]; ?></td>
                                        <?php $percent = $get[$index_point] * 100 / $total[$index_point]; ?>
                                        <td><?php echo number_format($percent, 2, '.', ''); ?> %</td>
                                        <?php
                                        if ($percent >= 55) {
                                            $Judgement = 'PASS'; ?>
                                            <td><span style="color:green;"><?php echo $Judgement; ?></span></td>
                                        <?php } else {
                                            $Judgement = 'NOT PASS'; ?>
                                            <td><span style="color:red;"><?php echo $Judgement; ?></span></td>
                                        <?php } ?>
                                        <?php
                                        $num_ass = 0;
                                        for ($a = 0; $a < count($ass_data); $a++) {
                                            $num_ass++;
                                        } ?>
                                        <td><?php echo $num_ass; ?></td>
                                    </tr>
                            <?php
                                    $index_point++;
                                }
                            } ?>
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
        XLSX.writeFile(wb, 'Performance Evaluation Factor Report.xlsx'); //Download ไฟล์ excel จากตาราง html โดยใช้ชื่อว่า Performance Evaluation Factor Report.xlsx
    }
</script>