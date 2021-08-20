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
        List of assessed : <?php echo $emp_data->Empname_eng . ' ' . $emp_data->Empsurname_eng; ?>
    </h2>

    <hr class="my-4" color="gray">

    <h3 style="text-align:left">
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <b>Current Position : </b><?php echo $emp_data->Position_name; ?><br><br>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Department : </b><?php echo $emp_data->Department; ?><br><br>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Section code : </b><?php echo $emp_data->Sectioncode; ?><br><br>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Promote to : </b><?php echo $emp_data->sec_name; ?><br><br>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Presentation Date : </b><?php echo date("d/m/Y", strtotime($emp_data->grp_date)); ?>
            </div>
            <div class="col-xl-6 col-md-6">
                <b>Company : </b><?php echo $emp_data->Company_shortname; ?>
            </div>
        </div>
    </h3>

    <hr class="my-4" color="gray">

    <?php
    $sum_point = 0;
    $point_total = [];
    $check_emp = '';
    $point_ass = [];
    $total = [];
    $get = [];
    foreach ($ass_data as $index_ass => $row_ass) {
        foreach ($point_data as $index => $row) {
            if ($row_ass->ase_id == $row->ptf_ase_id) {
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
    array_push($point_ass, $point_total);
    array_push($total, (sizeof($ass_data) * 5 * sizeof($ass_data)));
    array_push($get, array_sum($point_total));
    $point_total = [];
    ?>

    <h3 style="text-align:left">
        <b>Assessors : </b><?php echo $i = count($ass_data); ?> person
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
                            <?php
                            $num = 1;
                            $index_point = 0;
                            for ($i = 0; $i < count($ass_data); $i++) {
                            ?>
                                <tr>
                                    <td><?php echo $num++; ?></td>
                                    <td><?php echo $ass_data[$i]->ase_emp_id; ?></td>
                                    <td><?php echo $ass_data[$i]->Empname_eng . ' ' . $ass_data[$i]->Empsurname_eng; ?></td>
                                    <td><?php echo $point_ass[$index_point][$i]; ?> points</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>

    <h3 style="text-align:left">
        <?php
        $index_point = 0;
        ?>
        <b>Totally score : </b><?php echo  $total[$index_point]; ?> points<br><br>
        <b>Get score : </b><?php echo $get[$index_point]; ?> points<br><br>
        <?php $percent = $get[$index_point] * 100 / $total[$index_point]; ?>
        <b>Total score : </b><?php echo number_format($percent, 2, '.', ''); ?> %<br><br>
        <?php
        if ($percent >= 55) {
            $Judgement = 'PASS'; ?>
            <b>Judgement : </b><span style="color:green;"><?php echo $Judgement; ?></span>
        <?php } else {
            $Judgement = 'NOT PASS'; ?>
            <b>Judgement : </b><span style="color:red;"><?php echo $Judgement; ?></span>
        <?php } ?>
    </h3>

    <br>
    <center><a href="<?php echo site_url() . 'Report/Report/show_report_detail/' . $emp_data->sec_id; ?>" class="btn btn-secondary float-center"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></center>

</div>