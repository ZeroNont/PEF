<?php
/*
* v_result
* View Result
* @input  -
* @output History and Score of Evaluation
* @author Apinya Phadungkit
* @Create Date 2564-8-15
* @Update Date 2564-8-16
* @Update Date 2564-8-17
* @Update Date 2564-8-18
* @Update Date 2564-8-19
*/
?>

<!DOCTYPE html>
<html>
<!-- CSS -->
<style>
#history_table td,
#history_table th {
    padding: 8px;
    text-align: center;
}

#history_table tr:nth-child(even) {
    background-color: #e9ecef;
}

#history_table tr:hover {
    background-color: #adb5bd;
}
</style>

<h1>
    Result
</h1>

<body>
    <!-- ตารางรายการผู้ที่ถูกประเมินแล้ว -->
    <!-- Table Result -->
    <div class="card">
        <div class="card-header">
            <div class="table-responsive">
                <table class="table align-items-center" id="history_table">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Employee ID</th>
                            <th scope="col">List of nominee</th>
                            <th scope="col">Group</th>
                            <th scope="col">Date</th>
                            <th scope="col">Position</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody align="center">
                        <?php
                            foreach($arr_gro as $index => $row ){ ?>
                        <tr>

                            <!-- column ลำดับ # -->
                            <td style='text-align: center;'>
                                <?php echo ($index+1);?>
                            </td>

                            <!-- column รหัสผู้ถูกประเมิน -->
                            <td>
                                <?php echo $row->grn_emp_id;?>
                            </td>

                            <!-- column ชื่อผู้ถูกประเมิน -->
                            <td>
                                <?php echo $row->Empname_eng.' '.$row->Empsurname_eng;?>
                            </td>

                            <!-- column กลุ่มของผู้ถูกประเมิน -->
                            <td>
                                <?php echo $row->grn_grp_id;?>
                            </td>

                            <!-- column วันที่ทำการประเมิน -->
                            <td>

                                <?php echo date("d-m-Y",strtotime($row->grp_date));?>
                            </td>

                            <!-- column ตำแหน่ง -->
                            <td>
                                <?php echo $row->Position_name;?>
                            </td>

                            <!-- column ดำเนินการ -->
                            <td style='text-align: center;'>

                                <!-- ปุ่มดำเนินการ -->
                                <a
                                    href="<?php echo site_url() . 'Result/Result/show_result_detail/' . $row->grn_emp_id .'/'. $row->gro_ase_id.'/'. $row->sec_level; ?>">
                                    <button class="btn btn-primary"> <i class="fa fa-info-circle"></i> </button>
                                </a>

                            </td>

                        </tr>

                        <?php } ?>
                    </tbody>
                </table>

                <div>
                </div>
            </div>
            <!-- Argon Scripts -->
            <!-- Core -->
            <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
            <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
            <script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
            <script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
            <script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
            <!-- Argon JS -->
            <script src="../../assets/js/argon.js?v=1.2.0"></script>
            <script type="text/javascript">
            $(function() {
                $('#datetimepickerDemo').datetimepicker({
                    minDate: new Date()
                });
            });
            </script>
</body>

</html>