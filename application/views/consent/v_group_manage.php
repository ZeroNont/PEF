<?php ?>
<script>
function get_Emp() {
    position_level = document.getElementById('position_level').value;
    console.log(position_level)
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>ttp_Emp/Employee/search_by_employee_id",
        data: {
            "position_level": position_level
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
            }
        }
    });
}
</script>
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
                                    <select name="position" id="position" class="form-select"
                                        aria-label="Default select example" required>
                                        <option value="0">--------------------------------------------Please
                                            select--------------------------------</option>
                                        <?php for ($i = 0; $i < count($obj_sec); $i++) { ?>
                                        <option value="<?php echo $obj_sec[$i]->sec_id ?>">
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
                            <tbody>
                                <?php for ($i = 0; $i < 10; $i++) { ?>
                                <tr>
                                    <td>
                                        <?php echo $i + 1 ?>
                                    </td>
                                    <td>
                                        <?php echo $i + 1  ?>
                                    </td>
                                    <td>
                                        <?php echo $i + 1  ?>
                                    </td>
                                    <td>
                                        <?php echo $i + 1  ?>
                                    </td>
                                    <td>
                                        <?php echo $i + 1  ?>
                                    </td>
                                    <td>
                                        <?php echo $i + 1  ?>
                                    </td>






                    </div>
                    </td>
                    </tr>
                    <?php  } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>