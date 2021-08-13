<!--
    v_plant_list
    display all approve plant
    @input -
    @output -
    @author Jirayut Saifah
    Create 25/7/2564 
    Update date 
-->
<script>
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
    Group Management (การจัดการข้อมูลกลุ่ม)
    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#Add"><i class="material-icons">Add
            Group</i></button>
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
                    <th>Group name</th>
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
                            <?php echo $obj_group[$i]->grp_name ?>
                        </td>
                        <td>
                            <?php echo $obj_plan[$i]->pla_plant_name ?>
                        </td>
                        <td>
                            <?php echo $obj_plan[$i]->Empname_eng . '            ' . $obj_plan[$i]->Empsurname_eng ?>
                        </td>
                        <td>


                            <button class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>"><i class="material-icons">Edit</i></button>
                            <!-- Modal -->


                            <div id="exampleModal<?php echo $i; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header ">

                                            <h4 class="modal-title" id="exampleModalLabel">

                                                Edit Detail
                                            </h4>

                                            <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <form action="<?php echo site_url() . 'Plant_management/Plant_input/edit/' . $obj_plan[$i]->Emp_ID; ?>" method="post" enctype="multipart/form-data">
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Employee
                                                        ID</label>
                                                    <input type="text" class="form-control" value="<?php echo $obj_plan[$i]->pla_emp_id ?>" id="Emp_id<?php echo $i; ?>" onkeyup="getEmp_edit(<?php echo $i; ?>)" name="Emp_ID" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $obj_plan[$i]->Empname_eng . '    ' . $obj_plan[$i]->Empsurname_eng ?>" disabled id="Emp_name<?php echo $i; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Plant
                                                        No.</label>
                                                    <input type="text" class="form-control" value="<?php echo $obj_plan[$i]->pla_plant_no ?>" name="Plant_No" required>
                                                    <input type="text" class="form-control" value="<?php echo $obj_plan[$i]->pla_plant_id ?>" name="Plant_ID" hidden>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputPassword1" class="form-label">Plant
                                                        Name</label>
                                                    <input type="text" class="form-control" value="<?php echo $obj_plan[$i]->pla_plant_name ?>" id="province_auto" name="Plant_name" required>
                                                </div>
                                                <button type="submit" class="btn btn-success float-right">Submit</button>
                                                <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cancle</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
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