<!--
    v_group_list
    display all approve plant
    @input -
    @output -
    @author Jirayut Saifah
    @Create date 13/8/2564 
-->
<script>
/*
 * get_Emp
 * display employee detail
 * @input emp_id
 * @output employee detail
 * @author Jirayut Saifah
 * @Create date 13 / 8 / 2564
 */
function get_Emp() {
    Emp_id = document.getElementById('Emp_id_modal').value;
    var empname = "";
    console.log(Emp_id)
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>ttp_Emp/Employee/search_by_employee_id",
        data: {
            "Emp_id": Emp_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(data);
            if (data.length == 0) {
                document.getElementById("showname_modal").value = "ไม่มีข้อมูล";
            } else {
                empname = data[0].Empname_eng + " " + data[0].Empsurname_eng;
                document.getElementById("showname_modal").value = empname;
                console.log(999)
                console.log(empname)
            }
        }
    });
}
/*
 * get_Emp_edit
 * display employee detail
 * @input emp_id
 * @output employee detail
 * @author Jirayut Saifah
 * @Create date 13 / 8 / 2564
 */
function getEmp_edit(i) {
    Emp_id = document.getElementById('Emp_id' + i).value;
    var empname = "";
    console.log(Emp_id)
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>ttp_Emp/Employee/search_by_employee_id",
        data: {
            "Emp_id": Emp_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(data);
            if (data.length == 0) {
                document.getElementById("Emp_name" + i).value = "ไม่มีข้อมูล";
            } else {
                empname = data[0].Empname_eng + " " + data[0].Empsurname_eng;
                document.getElementById("Emp_name" + i).value = empname;
                console.log(999)
                console.log(empname)
            }
        }
    });
}
</script>
<h1>
    Group Management (การจัดการข้อมูลกลุ่ม)<a href="<?php echo site_url() . 'Group_management/Group_insert/index' ?>">
        <button class="btn btn-primary float-right" value="Add group"> Add group</button></a>
</h1>

<div class="card-header" id="card_radius">
    <div class="table-responsive">

        <table class="table" id="example">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Group ID</th>
                    <th>Position</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($obj_group); $i++) { ?>
                <tr>
                    <td>
                        <?php echo $i + 1 ?>
                    </td>
                    <td>
                        <?php echo $obj_group[$i]->grp_id ?>
                    </td>
                    <td>
                        <?php echo $obj_group[$i]->sec_level . "  " . $obj_group[$i]->sec_name ?>
                    </td>
                    <td>
                        <?php echo $obj_group[$i]->grp_date ?>
                    </td>
                    <td>
                        <?php if ($obj_group[$i]->grp_status == 0) { ?>

                        <a
                            href="<?php echo site_url() . 'Group_management/Group_edit/index/' . $obj_group[$i]->grp_id; ?>">
                            <button class="btn btn-warning">Edit</button>
                        </a>
                        <a
                            href="<?php echo site_url() . 'Group_management/Group_list/delete_group/' . $obj_group[$i]->grp_id; ?>">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                        <?php } ?>
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
    <div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
</script>
<script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="../../assets/js/argon.js?v=1.2.0"></script>
<script type="text/javascript">