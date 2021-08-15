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
                                        <option value="<?php echo $obj_sec[$i]->sec_level ?>">
                                            <?php echo $obj_sec[$i]->sec_level . " " . $obj_sec[$i]->sec_name;
                                        }
                                            ?>
                                        </option>

                                    </select>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">Date</label>
                                    <input type="date" id="input-email" class="form-control"
                                        min="<?php echo date('Y-m-d'); ?>" required>
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
                                    <th>List</th>
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

    <script>
    function get_assessor() {
        var position_level = document.getElementById('select').value;

        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Get_Employee/Get_assessor/get_assessor_by_sec",
            data: {
                "position_level": position_level
            },
            dataType: "JSON",
            success: function(data, status) {
                console.log(data);
                var count = 0;
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
                    data_row += row.ase_name_eng + " " + row.ase_surename_eng
                    data_row += '</td>'
                    data_row += '<td>'
                    data_row += row.position_level
                    data_row += '</td>'
                    data_row += '<td>'
                    data_row += row.Department
                    data_row += '</td>'
                    data_row += '</tr>'
                })
                $("select_data").html(data_row)
            }
        })
    }
    </script>