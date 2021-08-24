<!--
    /*
    * v_evaluation
    * display Evaluation list
    * @input id, emp_id, position
    * @output -
    * @author Phatchara Khongthandee and Pontakon Mujit 
    * @Create date : 2564-08-15   
    * @Update date : 2564-08-16
    * @Update date : 2564-08-17
    * @Update date : 2564-08-18
    * @Update date : 2564-08-19
    */
-->

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

#card_radius {
    margin-left: 14px;
    margin-right: 15px;
    border-radius: 20px;
    width: auto;
    min-height: 300px;
}

#history_table {
    width: 98%;
    margin-top: 20px;
    margin-left: 10px;
}
</style>


<h1>Evaluation (การประเมิน)</h1>
<!-- Table Evaluation List-->
<!-- ตารางแสดงรายชื่อผู้ที่ถูกประเมิน -->
<div class="card-header" id="card_radius">
    <div class="table-responsive">
        <table class="table align-items-center" id="history_table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">List of Nominee</th>
                    <th scope="col">Group</th>
                    <th scope="col">Date</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="list">
                <?php $s = 1; ?>
                  <?php  echo  count($ev_all)  .' '. count($ev_per)?>  
                <?php for ($i = 0; $i < count($ev_all); $i++) { ?>
                    <?php if(count($ev_per) != 0) {?>
                            <?php for ($j = 0 ;$j < count($ev_per); $j++ ) {  ?>
                           
                                 <!-- <?php //echo $ev_ass[0]->ase_id  .' '. $ev_per[$j]->per_ase_id .' '. $ev_all[$i]->grn_emp_id .' '. $ev_per[$j]->per_emp_id .' '. $ev_ass[0]->ase_id .' '. $ev_per[$j]->per_ase_id .' '.$ev_all[$i]->grn_emp_id.' '.$ev_per[$j]->per_emp_id .' '.  $ev_all[$i]->grp_date .' '. $ev_per[$j]->per_date?>  --> 
                                <?php if($ev_ass[0]->ase_id != $ev_per[$j]->per_ase_id || $ev_all[$i]->grn_emp_id != $ev_per[$j]->per_emp_id || $ev_ass[0]->ase_id == $ev_per[$j]->per_ase_id && $ev_all[$i]->grn_emp_id== $ev_per[$j]->per_emp_id &&  $ev_all[$i]->grp_date != $ev_per[$j]->per_date) {?>
                                    <?php if(date("Y-m-d") ==  $ev_all[$i]->grp_date) {?>
                                        <?php if($ev_all[$i]->grn_status == -1 || $ev_all[$i]->Position_Level < 5){ ?>
                                            <?php if($ev_all[$i]->grn_status == -1 || $ev_all[$i]->grn_status == 3){ ?>
                                            <tr>
                                                <!-- column แสดง ลำดับ -->
                                                <td>
                                                    <?php echo $s ?>
                                                    <?php $s++;  ?>
                                                </td>
                                                <!-- column แสดง รหัสผู้ที่ถูกประเมิน หรือ Nominee -->
                                                <td>
                                                    <?php echo $ev_all[$i]->Emp_ID ?>
                                                </td>
                                                <!-- column แสดง ลำดับ ชื่อ-นามสกุล ผู้ที่ถูกประเมิน หรือ Nominee-->
                                                <td>
                                                    <?php echo $ev_all[$i]->Empname_eng . ' ' . $ev_all[$i]->Empsurname_eng ?>
                                                </td>
                                                <!-- column แสดงชื่อกลุ่มผู้ที่ถูกประเมิน หรือ Nominee -->
                                                <td>
                                                    <?php echo $ev_all[$i]->gro_grp_id ?>
                                                </td>
                                                <!-- column แสดงวันที่ต้องทำการประเมิน -->
                                                <td>
                                                    <?php $newDate = date("d/m/Y", strtotime($ev_all[$i]->grp_date)); ?>
                                                    <?php echo $newDate ?>
                                                </td>
                                                <!-- column แสดงตำแหน่งที่จะ promote -->
                                                <td>
                                                    <?php echo $ev_all[$i]->Position_name ?>
                                                </td>
                                                <!-- column ดำเนินการ -->
                                                <td style='text-align: center;'>
                                                    <!-- ปุ่มดำเนินการ -->
                                                    <?php $status = 0 ?>
                                                    <?php for ($j = 0; $j < count($check); $j++) {
                                                        if ($check[$j]->fil_emp_id == $ev_all[$i]->grn_emp_id) {
                                                            $status++;
                                                    ?>
                                                    <?php }
                                                    } ?>
                                                    <?php if ($status == 1) { ?>
                                                        <!-- แสดงฟอร์มประเมิน T6 & T5 -->
                                                        <?php if ($ev_all[$i]->Position_Level == 5 || $ev_all[$i]->Position_Level == 6) { ?>
                                                            <a href="<?php echo site_url() . 'Evaluation/Evaluation/show_evaluation_amsssv_mtssp/' . $ev_all[$i]->gro_ase_id . '/' . $ev_all[$i]->grn_id . '/' . $ev_all[$i]->sec_level . '/' . $ev_all[$i]->grn_status . '/' . $ev_all[$i]->grn_emp_id; ?>">
                                                                <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                                                    <i class="fas fa-edit text-white"></i>
                                                                </button>
                                                            </a>
                                                            <!-- แสดงฟอร์มประเมิน T4, T3, T2 -->
                                                        <?php } else { ?>
                                                            <a href="<?php echo site_url() . 'Evaluation/Evaluation/show_evaluation_g_agm_gm/' . $ev_all[$i]->gro_ase_id . '/' . $ev_all[$i]->grn_id . '/' . $ev_all[$i]->sec_level . '/' . $ev_all[$i]->grn_status . '/' . $ev_all[$i]->grn_emp_id. '/' . $ev_all[$i]->grp_date; ?>">
                                                                <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                                                    <i class="fas fa-edit text-white"></i>
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Not have file
                                                        </button>
                                                    <?php } ?>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                    <?php }else {?>
                            <?php if(date("Y-m-d") ==  $ev_all[$i]->grp_date) {?>
                                <?php if($ev_all[$i]->grn_status == -1 || $ev_all[$i]->Position_Level < 5){ ?>
                                        <?php if($ev_all[$i]->grn_status == -1 || $ev_all[$i]->grn_status == 3){ ?>
                                            <tr>
                                                <!-- column แสดง ลำดับ -->
                                                <td>
                                                    <?php echo $s ?>
                                                    <?php $s++;  ?>
                                                </td>
                                                <!-- column แสดง รหัสผู้ที่ถูกประเมิน หรือ Nominee -->
                                                <td>
                                                    <?php echo $ev_all[$i]->Emp_ID ?>
                                                </td>
                                                <!-- column แสดง ลำดับ ชื่อ-นามสกุล ผู้ที่ถูกประเมิน หรือ Nominee-->
                                                <td>
                                                    <?php echo $ev_all[$i]->Empname_eng . ' ' . $ev_all[$i]->Empsurname_eng ?>
                                                </td>
                                                <!-- column แสดงชื่อกลุ่มผู้ที่ถูกประเมิน หรือ Nominee -->
                                                <td>
                                                    <?php echo $ev_all[$i]->gro_grp_id ?>
                                                </td>
                                                <!-- column แสดงวันที่ต้องทำการประเมิน -->
                                                <td>
                                                    <?php $newDate = date("d/m/Y", strtotime($ev_all[$i]->grp_date)); ?>
                                                    <?php echo $newDate ?>
                                                </td>
                                                <!-- column แสดงตำแหน่งที่จะ promote -->
                                                <td>
                                                    <?php echo $ev_all[$i]->Position_name ?>
                                                </td>
                                                <!-- column ดำเนินการ -->
                                                <td style='text-align: center;'>
                                                    <!-- ปุ่มดำเนินการ -->
                                                    <?php $status = 0 ?>
                                                    <?php for ($j = 0; $j < count($check); $j++) {
                                                        if ($check[$j]->fil_emp_id == $ev_all[$i]->grn_emp_id) {
                                                            $status++;
                                                    ?>
                                                    <?php }
                                                    } ?>
                                                    <?php if ($status == 1) { ?>
                                                        <!-- แสดงฟอร์มประเมิน T6 & T5 -->
                                                        <?php if ($ev_all[$i]->Position_Level == 5 || $ev_all[$i]->Position_Level == 6) { ?>
                                                            <a href="<?php echo site_url() . 'Evaluation/Evaluation/show_evaluation_amsssv_mtssp/' . $ev_all[$i]->gro_ase_id . '/' . $ev_all[$i]->grn_id . '/' . $ev_all[$i]->sec_level . '/' . $ev_all[$i]->grn_status . '/' . $ev_all[$i]->grn_emp_id; ?>">
                                                                <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                                                    <i class="fas fa-edit text-white"></i>
                                                                </button>
                                                            </a>
                                                            <!-- แสดงฟอร์มประเมิน T4, T3, T2 -->
                                                        <?php } else { ?>
                                                            <a href="<?php echo site_url() . 'Evaluation/Evaluation/show_evaluation_g_agm_gm/' . $ev_all[$i]->gro_ase_id . '/' . $ev_all[$i]->grn_id . '/' . $ev_all[$i]->sec_level . '/' . $ev_all[$i]->grn_status . '/' . $ev_all[$i]->grn_emp_id. '/' . $ev_all[$i]->grp_date; ?>">
                                                                <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                                                    <i class="fas fa-edit text-white"></i>
                                                                </button>
                                                            </a>
                                                        <?php } ?>
                                                    <?php } else { ?>
                                                        <button type="button" class="btn btn-danger btn-sm">
                                                            Not have file
                                                        </button>
                                                    <?php } ?>

                                                </td>
                                            </tr>
                                        <?php } ?>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                <?php } ?>
                
            </tbody>
        </table>
    </div>
</div>


<script>
$(document).ready(function() {
    $('#history_table').DataTable();
});
</script>
<script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="../../assets/js/argon.js?v=1.2.0"></script>
<script type="text/javascript"></script>
<script src="../../assets/js/argon.js?v=1.2.0">
</script>
<script type="text/javascript"></script>
<script src="../../assets/js/argon.js?v=1.2.0">
</script>
<script type="text/javascript">