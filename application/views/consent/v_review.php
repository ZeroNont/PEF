<!--
    v_review
    display for review list
    @input -
    @output -
    @author Nattakorn
    Create date 2564-08-13
    Update date 2564-08-19
-->
<style>
table {
    text-align: center;
}
</style>
<h1>
    Reviewer (จัดการลงคะแนน)

</h1>

<div class="card-header" id="card_radius">

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-control-label" for="input-email">Promote to:
                </label>

                <select class="form-control" id="promote_to" style="text-align:center" required><br>
                    <option value="0"> Please Select</option>
                    <?php foreach ($arr_sec as $row) { ?>

                    <option value="<?php echo $row->sec_id ?>"><?php echo $row->sec_level ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-control-label" for="input-email">
                    Date:</label>
                <input type="date" id="grp_date" class="form-control" required>
            </div>
        </div>


        <div class="col-md-2">
            <div class="form-group">
                <button onclick='show_all_data()' class="btn btn-success btn-lg">search</button>
                </a>
                <div class="form-group">
                    <a href='<?php echo site_url() . 'Reviewer/Reviewer/show_review/' ?>'>
                        <button class="btn btn-inverse  btn-danger">Clear</button>
                    </a>
                </div>
            </div>
        </div>




        <div class="table-responsive">

            <table class="table" style="width:100%" id="example">
                <thead class="thead-light">



                    <tr>
                        <th>#</th>
                        <th>Promote to</th>

                        <th>Date</th>

                        <th>Action</th>


                    </tr>
                </thead>
                <tbody id="show_data">


                </tbody>




            </table>



        </div>
    </div>
    <div id="warning" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">

                    <!--   <h4 align='center' class="modal-title" id="exampleModalLabel">

                    Add Detail
                </h4> -->

                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Please select Promote to or Date first</p>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-inverse" data-dismiss="modal" aria-label="Close">close</button>

                </div>

            </div>
        </div>
    </div>

    <div id="save_data" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header ">

                    <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo site_url() . 'Reviewer/Reviewer/add_data'   ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="focusedinput" class="form-label">Please select review date</label>
                            <input type="date" min="<?php echo date('Y-m-d') ?>" class="form-control" name="date_review"
                                id="date_review" required>

                            <input type="text" value="" name="grp_data" id="grp_data" hidden>

                        </div>

                        <button type="submit" class="btn btn-success float-right">Submit</button>
                        <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });


    function show_all_data() {
        var promote = document.getElementById('promote_to').value;
        var date_search = document.getElementById('grp_date').value;
        var data_row = "";
        if (promote != 0 || date_search != "") {
            console.log(promote)
            console.log(date_search)
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>Reviewer/Reviewer/get_show",
                data: {
                    "promote": promote,
                    "date_search": date_search
                },
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    var no = 1;
                    if (data.length != 0) {
                        data.forEach((row, index) => {
                            if (row.grp_status == 1) {
                                data_row += "<tr>";
                                data_row += "<td>" + no++ + "</td>";
                                data_row += "<td>" + row.sec_name + "</td>";
                                data_row += "<td>" + row.grp_date + "</td>";

                                data_row +=
                                    '<td> <button class="btn btn-warning" onclick="show_modal(' +
                                    row
                                    .grp_id +
                                    ')" ><i class="fa fa-pencil-square" ></i>Review</button></td>';
                                data_row +=
                                    "</tr>";
                            }
                        });
                        // forEach
                    } else {
                        data_row += "<tr>";
                        data_row += "<td colspan='4'>" + "No data" + "</td>";


                        data_row += "</tr>";
                    }
                    $("#show_data").html(data_row);
                },
                // success
                error: function(data) {
                    console.log("9999 : error");
                    console.log(data);
                }
                // error
            });
            // ajax 

        } else {
            $("#warning").modal("show")
        }


    }

    function show_modal(grp_id) {
        $("#save_data").modal("show")
        $("#grp_data").val(grp_id)
    }
    </script>