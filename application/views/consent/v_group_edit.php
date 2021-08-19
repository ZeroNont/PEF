<!--
    * v_group_edit
    * display group edit
    * @input Group detail
    * @output 
    * @author Jirayut Saifah
    * @Create date 2564-08-15   
-->

<?php ?>

<!-- Page content -->

<h1>
    Edite Group (การแก้ไขกลุ่มประเมิน)

</h1>
<div class="container-fluid mt--12">


    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Assessor </h3>
                        <input type="text" id="group_id" value="<?php echo $group_id ?>" hidden>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">

                                    <input type="text" value="<?php echo $obj_group->grp_id ?>" id="group" hidden>
                                    <label class="form-control-label" for="input-city">Posotion to Promote</label>
                                    <select name="position" id="select" class="form-select" aria-label="Default select example" onchange="get_assessor()" disabled>
                                        <option value="0">--------------------------------------------Please
                                            select--------------------------------</option>
                                        <?php for ($i = 0; $i < count($obj_sec); $i++) {
                                            if ($obj_sec[$i]->sec_id == $obj_group->grp_position_group) { ?>

                                                <option value="<?php echo $obj_sec[$i]->sec_id ?>" selected>
                                                    <?php echo $obj_sec[$i]->sec_level . " " . $obj_sec[$i]->sec_name; ?>
                                                </option>
                                            <?php     } //if
                                            else {
                                            ?>
                                                <option value="<?php echo $obj_sec[$i]->sec_id ?>">

                                                    <?php echo $obj_sec[$i]->sec_level . " " . $obj_sec[$i]->sec_name; ?>
                                                </option>
                                        <?php  } //else
                                        } //for
                                        ?>


                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Date</label>
                                    <input type="date" id="date" class="form-control" min="<?php echo date('Y-m-d'); ?>" value="<?php echo $obj_group->grp_date ?>" required>
                                </div>
                            </div>
                        </div>

                    </div>


                </form>

                <div class="card-header" id="card_radius">
                    <div class="table-responsive">

                        <table class="table" id="example">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>
                                        <input type="checkbox" onclick="select_all(this);">
                                        Select
                                    </th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Departmant</th>
                                </tr>
                            </thead>
                            <tbody id="select_data"></tbody>
                        </table>
                    </div>



                </div>

            </div>
        </div>
    </div>
</div>

<div class="container-fluid mt--12">


    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Nominee </h3>
                    </div>

                </div>
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#Add" onclick="get_position()"><i class="material-icons">Add Nominee</i></button>
            </div>
            <div class="card-body">


                <div class="card-header" id="card_radius">
                    <div class="table-responsive">

                        <table class="table" id="example">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Employee ID</th>
                                    <th>Name</th>
                                    <!-- <th>Position</th> -->
                                    <th>Departmant</th>
                                    <th>Promote to Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="nominee_data"></tbody>
                        </table>
                    </div>
                    <ol>

                    </ol>



                </div>

            </div>
        </div>
        <button class="btn btn-success float-right" onclick="save_data()">Save</button>
    </div>
</div>
<div id="Add" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">

                <h4 align='center' class="modal-title" id="exampleModalLabel">

                    Add Nominee
                </h4>

                <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="focusedinput" class="form-label">Employee ID</label>
                    <input type="text" class="form-control" name="Emp_ID[]" id="Emp_id_modal" placeholder="JS000xxx" onkeyup="get_Emp()" required>
                </div>
                <div class="mb-3">
                    <label for="focusedinput" class="form-label">Name</label>
                    <input type="text" class="form-control" id="showname_modal" disabled name="Plant_name">
                </div>
                <div class="mb-3">
                    <label for="focusedinput" class="form-label">Position</label>
                    <input type="text" class="form-control" id="position_modal" disabled name="Plant_name">
                </div>
                <div class="mb-3">
                    <label for="focusedinput" class="form-label">Department</label>
                    <input type="text" class="form-control" id="department_modal" disabled name="Plant_name">
                </div>
                <div class="mb-3">
                    <label class="form-control-label" for="input-city">Posotion to Promote</label>
                    <select name="promote" id="select2" class="form-select" aria-label="Default select example">
                        <option value="0">----------------------Please select------------------</option>


                    </select>
                </div>
                <button class="btn btn-success float-right" id="add">Save</button>
                <button class="btn btn-danger float-right" data-dismiss="modal" aria-label="Close">Cancel</button>
            </div>

        </div>
    </div>

</div>

<script>
    var count = 0;
    var count_nominee = 0;
    var id = "Emp_id";
    var num = 1;
    var emp_as = [];
    var index_emp = [];
    /*
    * get nominee list
    * display nominee list
    * @input Group id
    * @output nominee list
    * @author Jirayut Saifah
    * @Create date 2564 - 08 - 15
    */
    $(document).ready(function() {
        get_position();
        var group_id = document.getElementById('group_id').value;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Get_Employee/Get_nominee/get_nominee_by_id",
            data: {
                "group_id": group_id
            },
            dataType: "JSON",
            success: function(data, status) {
                // console.log(data);
                var i = 1;
                var data_row = '';
                var count_index = 0;
                data.forEach((row, index) => {
                    data_row += '<tr id="emp_' + num + '">'
                    data_row += '<td>'
                    data_row += i++;
                    data_row += '</td>'
                    data_row += '<td id="grn_emp_id_' + num + '">'
                    data_row += row.grn_emp_id
                    data_row += '</td>'
                    data_row += '<td>'
                    data_row += row.Empname_eng + " " + row.Empsurname_eng
                    data_row += '<input name"pos" value=' + row.Position_ID + ' hidden >'
                    data_row += '</td>'
                    // data_row += '<td>'
                    // data_row += row.Position_ID
                    // data_row += '</td>'
                    data_row += '<td>'
                    data_row += row.Department
                    data_row += '</td>'
                    data_row += '<td id="Promote_' + num + '">'
                    data_row += row.Position_name
                    data_row += '</td>'
                    data_row += '<td>'
                    data_row +=
                        '<button class="btn btn-danger" onclick = "remove_row(' + num +
                        ') " >delete</button>'
                    data_row += '</td>'
                    data_row += '</tr>'
                    index_emp.push(num);
                    console.log(index_emp)
                    count_index++;
                    count_nominee++
                    num++;
                    console.log(count_nominee);
                    console.log(num);
                })
                $("#nominee_data").html(data_row)
            }
        })

    });
    /*
    * add
    * add nominee to list
    * @input nominee detail
    * @output 
    * @author Jirayut Saifah
    * @Create date 2564 - 08 - 15
    */

    $("#add").click(function() {
        empname = document.getElementById("showname_modal").value;
        empid = document.getElementById("Emp_id_modal").value;
        position = document.getElementById("position_modal").value;
        department = document.getElementById("department_modal").value;
        promote = document.getElementById("select2").value;
        var data_row = "";
        console.log(num);
        data_row += '<tr id="emp_' + num + '">';
        data_row += '<td>' + num + '</td>';
        data_row += '<td id="grn_emp_id_' + num + '">' + empid + '</td>';
        data_row += '<td >' + empname + '</td>';
        data_row += '<td >' + department + '</td>';
        data_row += '<td id="Promote_' + num + '">' + promote + '</td>';
        data_row += '<td>';
        data_row += '<button class="btn btn-danger" onclick = "remove_row(' + num + ') " >delete</button>';
        data_row += '</td>';
        index_emp.push(num);
        console.log(index_emp);
        num++

        $("#nominee_data").append(
            data_row
        );
        count_nominee++;
        console.log(count_nominee);
    });

    /*
    * remove_row
    * remove nominee from list
    * @input row_id
    * @output 
    * @author Jirayut Saifah
    * @Create date 2564 - 08 - 15
    */
    function remove_row(num) {
        $("#emp_" + num).remove();
        var index = index_emp.indexOf(num);
        if (index > -1) {
            index_emp.splice(index, 1);
        }
        count_nominee--;
        console.log(index_emp)
    }
    /*
    * get_Emp
    * display employee detail
    * @input emp_id
    * @output 
    * @author Jirayut Saifah
    * @Create date 2564 - 08 - 15
    */
    function get_Emp() {
        Emp_id = document.getElementById('Emp_id_modal').value;
        pos = document.getElementById('select').value;
        var empname = "";
        console.log(Emp_id)
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Get_Employee/Get_nominee/search_by_employee_id ",
            data: {
                "Emp_id": Emp_id,
                "Position_level": pos
            },
            dataType: "JSON",
            success: function(data, status) {
                console.log(data);
                if (data.length == 0) {
                    document.getElementById("showname_modal").value = "ไม่มีข้อมูล";
                    document.getElementById("position_modal").value = "ไม่มีข้อมูล";
                    document.getElementById("department_modal").value =
                        "ไม่มีข้อมูล";
                } else {
                    department = data[0].Department;
                    // empname = data[0].Position_name;
                    empname = data[0].Empname_eng + " " + data[0].Empsurname_eng;
                    position = data[0].Position_name;
                    document.getElementById("showname_modal").value = empname;
                    document.getElementById("position_modal").value = position;
                    document.getElementById("department_modal").value = department;
                    console.log(999)
                    console.log(empname)
                    console.log(position)
                    console.log(department)
                }
            }
        });
    }
    /*
    * save_data
    * save data group
    * @input group detail
    * @output 
    * @author Jirayut Saifah
    * @Create date 2564 - 08 - 15
    */
    function save_data() {
        var emp = []
        var emp_nominee = []
        var promote = []
        var element = []
        var pos_id = []
        var sum;
        var T = document.getElementById('select').value;
        element = document.getElementsByName("pos");
        var date = document.getElementById('date').value;
        var group = document.getElementById('group').value;

        console.log(count_nominee);

        console.log(32)
        for (var i = 0; i < count; i++) {
            if (document.getElementById('check_box' + i).checked) {
                emp.push(document.getElementById('gro_ase_id_' + i).innerHTML)
                console.log(emp + "55")
            }
        }
        for (var i = 0; i < count_nominee; i++) {
            console.log(99);
            console.log(index_emp[i]);
            emp_nominee.push(document.getElementById('grn_emp_id_' + index_emp[i]).innerHTML)
            promote.push(document.getElementById('Promote_' + index_emp[i]).innerHTML)
            pos_id[i] = element[i].getAttribute('id');
            console.log(444)
        }

        console.log(date)
        console.log(emp)
        console.log(T)
        console.log(emp_nominee)
        console.log(promote)
        console.log(pos_id)
        console.log(group)
        console.log(11)
        //ใช้ ajax 
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Group_management/Group_edit/edit",
            data: {
                "emp": emp,
                "emp_nominee": emp_nominee,
                "promote": promote,
                "pos_id": pos_id,
                "date": date,
                "position_group": T,
                "group": group
            },
            success: function(data) {
                console.log(data);
                window.location.href = "<?php echo base_url(); ?>Group_management/Group_list/index";
            }
        })
    }

    /*
    * select_all
    * check box
    * @input check id
    * @output 
    * @author Jirayut Saifah
    * @Create date 2564 - 08 - 15
    */
    function select_all(source) {
        var check = document.querySelectorAll('input[name="checkbox1"]');
        for (var i = 0; i < check.length; i++) {
            if (check[i] != source) {
                check[i].checked = source.checked
            }
        }
    }
    /*
    * get_position
    * get position detail
    * @input position level
    * @output position detail
    * @author Jirayut Saifah
    * @Create date 2564 - 08 - 15
    */
    function get_position() {
        position_level = document.getElementById('select').value;
        // console.log(position_level)
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Get_Employee/Get_nominee/get_position_by_sec",
            data: {
                "pos": position_level
            },
            dataType: "JSON",

            success: function(data, status) {
                var select = document.getElementById("select2");
                var length = select.options.length;
                for (i = length - 1; i >= 0; i--) {
                    select.options[i] = null;
                }
                console.log(999);
                data.forEach((row, index) => {
                    var x = document.getElementById("select2");
                    var option = document.createElement("option");
                    option.setAttribute("id", row.Position_ID);
                    option.setAttribute("name", "pos");
                    option.text = row.Position_name;
                    x.add(option);
                })



            }

        })

    }
    /*
    * get_assessor
    * display assessor list
    * @input Group id
    * @output assessor list
    * @author Jirayut Saifah
    * @Create date 2564 - 08 - 15
    */
    function get_assessor() {
        var position_level = document.getElementById('select').value;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Get_Employee/Get_assessor/get_assessor_by_sec",
            data: {
                "pos": position_level
            },
            dataType: "JSON",
            success: function(data, status) {
                // console.log(data);
                var count_index = 0;
                var i = 1;
                var data_row = '';
                data.forEach((row, index) => {
                    var check = 0;
                    data_row += '<tr>'
                    data_row += '<td>'
                    data_row += i++;
                    data_row += '</td>'
                    data_row += '<td>'

                    emp_as.forEach((row_as, index) => {
                        console.log(row.ase_emp_id)
                        if (row_as == row.ase_emp_id) {
                            check++;

                        }
                    });
                    // forEach
                    if (check != 0) {
                        data_row += '<input type="checkbox" id="check_box' +
                            index +
                            '" name="checkbox1" checked>'
                    } else {
                        data_row += '<input type="checkbox" id="check_box' +
                            index +
                            '" name="checkbox1" >'
                    }
                    data_row += '</td>'
                    data_row += '<td id="gro_ase_id_' + index + '">'
                    data_row += row.ase_emp_id
                    data_row += '</td>'
                    data_row += '<td>'
                    data_row += row.Empname_eng + "  " + row.Empsurname_eng
                    data_row += '</td>'
                    data_row += '<td>'
                    data_row += row.sec_level
                    data_row += '</td>'
                    data_row += '<td>'
                    data_row += row.Department
                    data_row += '</td>'

                    data_row += '</tr>'
                    count_index++
                })
                $("#select_data").html(data_row)
                count = count_index;
            }
        })
    }
    $(document).ready(function() {

        var group = document.getElementById('group').value;
        console.log(group)
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Group_management/Group_edit/get_assessor/",
            data: {
                "group": group
            },
            dataType: "JSON",
            success: function(data, status) {
                data.forEach((row, index) => {
                    emp_as.push(row.gro_ase_id)
                });
                // forEach
                get_assessor();
                // console.log(data)
                // console.log(emp_as)
            }
        })

    });
</script>