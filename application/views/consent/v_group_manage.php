<!-- 
    * v_group_manage
    * display group manage
    * @input 
    * @output 
    * @author Jirayut Saifah
    * @Create date 13 / 8 / 2564-->

<?php ?>

<!-- Page content -->

<h1>
    Insert Group (การเพิ่มกลุ่มประเมิน)

</h1>
<div class="container-fluid mt--12">


    <div class="col-xl-12 order-xl-1">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0">Assessor </h3>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form>
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label class="form-control-label" for="input-city">Posotion to Promote</label>
                                    <select name="position" id="select" class="form-select"
                                        aria-label="Default select example" onchange="get_assessor()">
                                        <option value="0">--------------------------------------------Please
                                            select--------------------------------</option>
                                        <?php for ($i = 0; $i < count($obj_sec); $i++) { ?>
                                        <option value="<?php echo $obj_sec[$i]->sec_level ?>" name="">
                                            <?php echo "T" . $obj_sec[$i]->sec_level . " " . $obj_sec[$i]->sec_name;
                                        }
                                            ?>
                                        </option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Date</label>
                                    <input type="date" id="date" class="form-control" min="<?php echo date('Y-m-d') ?>"
                                        required>
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
                <button class="btn btn-primary float-right" data-toggle="modal" data-target="#Add"
                    onclick="get_position()"><i class="material-icons">Add Nominee</i></button>
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
                    <input type="text" class="form-control" name="Emp_ID[]" id="Emp_id_modal" placeholder="JS000xxx"
                        onkeyup="get_Emp()" required>
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
                    <label class="form-control-label" for="input-city">Position to Promote</label>
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
var index_emp = [];
/*
 * add
 * add nominee to list
 * @input nominee detail
 * @output 
 * @author Jirayut Saifah
 * @Create date 15 / 8 / 2564
 */
$("#add").click(function() {
    empname = document.getElementById("showname_modal").value;
    empid = document.getElementById("Emp_id_modal").value;
    position = document.getElementById("position_modal").value;
    department = document.getElementById("department_modal").value;
    promote = document.getElementById("select2").value;
    var data_row = "";
    data_row += '<tr id="emp_' + num + '">';
    data_row += '<td>' + num + '</td>';
    data_row += '<td id="Emp_id_' + num + '">' + empid + '</td>';
    data_row += '<td >' + empname + '</td>';
    data_row += '<td >' + department + '</td>';
    data_row += '<td id="Promote_' + num + '">' + promote + '</td>';
    data_row += '<td> ' + '<button class="btn btn-danger" onclick = "remove_row(' + num +
        ') " >delete</button></td>';
    index_emp.push(num);
    console.log(index_emp);
    num++

    $("#nominee_data").append(
        data_row
    );
    count_nominee++;
    console.log(count_nominee);
});

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
 * @Create date 15 / 8 / 2564
 */
function get_Emp() {
    Emp_id = document.getElementById('Emp_id_modal').value;
    pos = document.getElementById('select').value;
    var empname = "";
    console.log(Emp_id)
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Get_Employee/Get_nominee/search_by_employee_id",
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
                document.getElementById("department_modal").value = "ไม่มีข้อมูล";
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
 * @Create date 15 / 8 / 2564
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
    console.log(count_nominee);
    console.log(15)
    for (var i = 0; i < count; i++) {
        if (document.getElementById('check_box' + i).checked) {
            emp.push(document.getElementById('gro_ase_id_' + i).innerHTML)
            console.log(emp + "55")
        }
    }
    for (var i = 0; i < count_nominee; i++) {
        console.log(index_emp[i]);
        emp_nominee.push(document.getElementById('Emp_id_' + index_emp[i]).innerHTML)
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
    console.log(11)

    //ใช้ ajax 
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Group_management/Group_insert/insert",
        data: {
            "emp": emp,
            "emp_nominee": emp_nominee,
            "promote": promote,
            "pos_id": pos_id,
            "date": date,
            "position_group": T
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
 * @Create date 15 / 8 / 2564
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
 * @input position detail
 * @output 
 * @author Jirayut Saifah
 * @Create date 15 / 8 / 2564
 */
function get_position() {
    position_level = document.getElementById('select').value;
    console.log(position_level)
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
            console.log(data);
            data.forEach((row, index) => {
                var x = document.getElementById("select2");
                var option = document.createElement("option");
                option.setAttribute("id", row.Position_ID);
                option.setAttribute("name", "pos");
                option.text = 'T' + row.Position_Level + ' ' + row.Position_name;
                x.add(option);
            })



        }

    })

}
/*
 * get assessor
 * display assessor list
 * @input Group id
 * @output assessor list
 * @author Jirayut Saifah
 * @Create date 15 / 8 / 2564
 */
function get_assessor() {
    var position_level = document.getElementById('select').value;
    // position_level--;

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
                data_row += '<tr>'
                data_row += '<td>'
                data_row += i++;
                data_row += '</td>'
                data_row += '<td>'
                data_row += '<input type="checkbox" id="check_box' + index +
                    '" name="checkbox1">'
                data_row += '</td>'
                data_row += '<td id="gro_ase_id_' + index + '">'
                data_row += row.ase_emp_id
                data_row += '</td>'
                data_row += '<td>'
                data_row += row.Empname_eng + "          " + row.Empsurname_eng
                data_row += '</td>'
                data_row += '<td>'
                data_row += 'T' + row.sec_level
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
</script>