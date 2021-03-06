<!--
    v_review
    display for review list
    @input -
    @output -
    @author Nattakorn
    Create date 2564-08-13
    Update date 2564-08-19
-->
<h1>
    Result management (การจัดการผลคะแนน)

</h1>

<div class="card-header" id="card_radius">

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label class="form-control-label" for="input-email">
                    Date:</label>
                <input type="date" id="grp_date" class="form-control" required>
            </div>
        </div>

        <div class="col-md-2">
            <label class="form-control-label" for="input-email">
                &nbsp;</label>
            <div class="row">
                <div class="form-group">
                    <button onclick='show_all_data()' class="btn btn-primary mb1 bg-blue">Search</button>
                </div>
                &nbsp;
                <div class="form-group">
                    <a href='<?php echo site_url() . 'Result/Result/show_result_list/' ?>'>
                        <button class="btn btn-default  bg-gray">Clear</button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table" style="width:100%" id="example">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Employee ID</th>
                    <th>List of nominee</th>
                    <th>Group</th>
                    <th>Date</th>
                    <th>Position</th>
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
                <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Please Select Date First !!</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-inverse" data-dismiss="modal" aria-label="Close">close</button>
            </div>
        </div>
    </div>
</div>

<script>
/*
 * show_all_data
 * show data for search
 * @input -
 * @output -
 * @author Nattakorn
 * @Create date 2564-08-13
 */
function show_all_data() {
    var date_search = document.getElementById('grp_date').value;
    var data_row = "";
    if (date_search != "") {
        console.log(date_search)
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>Result/Result/get_result",
            data: {
                "date": date_search
            },
            dataType: "json",

            success: function(data) {
                console.log(data);
                var no = 1;
                if (data.length != 0) {
                    data.forEach((row, index) => {
                        data_row += '<tr>';
                        data_row += '<td>' + no++ + '</td>';
                        data_row += '<td>' + row.grn_emp_id + '</td>';
                        data_row += '<td>' + 'T' + row.Empname_eng + '  ' + row.Empsurname_eng + '</td>';
                        data_row += '<td>' + row.grp_id + '</td>';
                        data_row += '<td>' + row.grp_date + '</td>';
                        data_row += '<td>' + row.Position_name + '</td>';
                        data_row +=
                            '<td><a href="<?php echo site_url() ?>Result/Result/show_result_detail/' +
                            row.grn_emp_id + '/' + row.gro_ase_id + '/' + row.Position_Level + '/' + row.grn_id +'">'
                        data_row +=
                            '<button type="button" class="btn btn-primary btn-sm" style="background-color: info;">'
                        data_row += '<i class="fas fa-search"></i></button></a></td>'
                        data_row += '</tr>';
                    });
                    // forEach
                } else {
                    data_row += "<tr>";
                    data_row += "<td colspan='4'>" + "No data" + "</td>";
                    data_row += "</tr>";
                }
                $("#show_data").html(data_row);
                console.log(data)
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



/*
 * show_modal
 * show update date modal
 * @input grp_id
 * @output date change in database
 * @author Nattakorn
 * @Create date 2564-08-13
 */

</script>
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
<script src="../../assets/js/argon.js?v=1.2.0"></script>
<script type="text/javascript">