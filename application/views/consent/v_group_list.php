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
<div id="Add" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">

                <h4 align='center' class="modal-title" id="exampleModalLabel">

                    Add Detail
                </h4>

                <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo site_url() . 'Plant_management/Plant_input/insert'; ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="focusedinput" class="form-label">Employee ID</label>
                        <input type="text" class="form-control" name="Emp_ID" id="Emp_id_modal" placeholder="JS000xxx" onkeyup="get_Emp()" required>
                    </div>
                    <div class="mb-3">
                        <label for="focusedinput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="showname_modal" disabled name="Plant_name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Plant No.</label>
                        <input type="text" class="form-control" name="Plant_No" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Plant Name</label>
                        <input type="text" class="form-control" name="Plant_name" required>
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cancle</button>
                </form>
            </div>

        </div>
    </div>
</div>
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
                            <a href="<?php echo site_url() . 'Group_management/Group_edit/index/' . $obj_group[$i]->grp_id; ?>">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                            <a href="<?php echo site_url() . 'Group_management/Group_list/delete_group/' . $obj_group[$i]->grp_id; ?>">
                                <button class="btn btn-danger">Delete</button>
                            </a>

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