<!--
    v_evaluation
    display Evaluation list
    @author Phatchara and Pontakon
    Create date 2564-08-15   
    Update date 2564-08-16
    Update date 2564-08-17
    Update date 2564-08-18
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
<h1>Evaluation</h1>
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
                <?php for ($i = 0; $i < count($ev_ass); $i++) { ?>
                    <tr>
                        <!-- column แสดง ลำดับ -->
                        <td>
                            <?php echo $i + 1 ?>
                        </td>
                        <!-- column แสดง รหัสผู้ที่ถูกประเมิน หรือ Nominee -->
                        <td>
                            <?php echo $ev_ass[$i]->Emp_ID ?>
                        </td>
                        <!-- column แสดง ลำดับ ชื่อ-นามสกุล ผู้ที่ถูกประเมิน หรือ Nominee-->
                        <td>
                            <?php echo $ev_ass[$i]->Empname_eng . ' ' . $ev_ass[$i]->Empsurname_eng?>
                        </td>
                        <!-- column แสดงชื่อกลุ่มผู้ที่ถูกประเมิน หรือ Nominee -->
                        <td>
                            <?php echo $ev_ass[$i]->grp_name ?>
                        </td>
                        <!-- column แสดงวันที่ต้องทำการประเมิน -->
                        <td>
                            <?php $newDate = date("d/m/Y", strtotime($ev_ass[$i]->grp_date)); ?>
                            <?php echo $newDate ?>
                        </td>
                        <!-- column แสดงตำแหน่งที่จะ promote -->
                        <td>
                            <?php echo $ev_ass[$i]->grn_promote_to ?>
                        </td>
                            <!-- column ดำเนินการ -->
                        <td style='text-align: center;'>
                            <!-- ปุ่มดำเนินการ -->
                            <!-- แสดงฟอร์มประเมิน T6 AM,Senior Staff,Supervisor -->
                            <?php if($ev_ass[$i]->grn_promote_to == "T6"){ ?>
                                <a 
                                    href="<?php echo site_url() . 'Evaluation/Evaluation/show_evaluation_T6/'.$ev_ass[$i]->ase_id.'/'.$ev_ass[$i]->grn_emp_id;?>" >
                                    <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                        <i class="fas fa-edit text-white"></i>
                                    </button>
                                </a>
                            <!-- แสดงฟอร์มประเมิน T5 Master Senior Specialist -->
                            <?php } else if($ev_ass[$i]->grn_promote_to == "T5"){ ?>
                                    <a 
                                    href="<?php echo site_url() . 'Evaluation/Evaluation/show_evaluation_T5/'.$ev_ass[$i]->ase_id.'/'.$ev_ass[$i]->grn_emp_id;?>" >
                                    <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                        <i class="fas fa-edit text-white"></i>
                                    </button>
                                </a>
                            <!-- แสดงฟอร์มประเมิน T4 (AGM) -->
                            <?php } else if($ev_ass[$i]->grn_promote_to == "T4"){?>
                                <a 
                                    href="<?php echo site_url() . 'Evaluation/Evaluation/show_evaluation_T4/'.$ev_ass[$i]->ase_id.'/'.$ev_ass[$i]->grn_emp_id;?>" >
                                    <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                        <i class="fas fa-edit text-white"></i>
                                    </button>
                                </a>
                            <!-- แสดงฟอร์มประเมิน T3 (Manager) -->
                            <?php } else if($ev_ass[$i]->grn_promote_to == "T3"){ ?>
                                <a 
                                    href="<?php echo site_url() . 'Evaluation/Evaluation/show_evaluation_T3/'.$ev_ass[$i]->ase_id.'/'.$ev_ass[$i]->grn_emp_id;?>" >
                                    <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                        <i class="fas fa-edit text-white"></i>
                                    </button>
                                </a>
                            <!-- แสดงฟอร์มประเมิน T2 (GM) -->
                            <?php } else if($ev_ass[$i]->grn_promote_to == "T2"){ ?>
                                <a 
                                    href="<?php echo site_url() . 'Evaluation/Evaluation/show_evaluation_T2/'.$ev_ass[$i]->ase_id.'/'.$ev_ass[$i]->grn_emp_id;?>" >
                                    <button type="button" class="btn btn-primary btn-sm" style="background-color: info;">
                                        <i class="fas fa-edit text-white"></i>
                                    </button>
                                </a>
                            <?php } ?>
                        </td>
                    </tr>
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
<script type="text/javascript">