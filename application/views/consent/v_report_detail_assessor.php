<!-- /*
* v_report_export_excel
* Display detail of requests for permission to excel
* @input    -
* @output   -
* @author   Chakrit
* @Create Date 2564-08-16
*/ -->

<h1>
    &nbsp; Report Detail (รายละเอียดรายงานข้อมูล)
</h1>
<br>
<div class="card-header">
    <h2>
        List of assessed :
    </h2>

    <hr class="my-4" color="gray">

    <h3 style="text-align:left">
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <b>Current Position : </b> <br><br>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Department : </b> <br><br>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Section code : </b> <br><br>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Promote to : </b> <br><br>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Presentation Date : </b>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Company : </b>
            </div>
        </div>
    </h3>

    <hr class="my-4" color="gray">

    <h3 style="text-align:left">
        <b>Assessors : </b>
    </h3>
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
                                <th scope="col">Assessors Name</th>
                                <th scope="col">Score</th>
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
    <br>

    <h3 style="text-align:left">
        <b>Totally score : </b><br><br>
        <b>Get score : </b><br><br>
        <b>Total score : </b><br><br>
        <b>Judgement : </b>
    </h3>

    <br>
    <center><a href="<?php echo site_url() . 'Report/Report/show_report_detail'; ?>" class="btn btn-secondary float-center"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></center>

</div>