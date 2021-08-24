<!-- 
    /*
    * v_score_list
    * Display score norminee list
    * @input    -
    * @output   -
    * @author   Chakrit and Jirayut
    * @Create Date 2564-08-22
    * @Update Date 2564-08-23
    */ -->
<h1>
    Score management (การจัดการคะแนน)

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
                    <a href='<?php echo site_url() . 'Report/Summary/index/' ?>'>
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
                    <th>Group ID</th>
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
     * @input    -
     * @output   -
     * @author   Chakrit and Jirayut
     * @Create Date 2564-08-22
     * @Update Date 2564-08-23
     */
    function show_all_data() {
        var date_search = document.getElementById('grp_date').value;
        var data_row = "";
        if (date_search != "") {
            console.log(date_search)
            $.ajax({
                type: "post",
                url: "<?php echo base_url(); ?>Report/Summary/get_group",
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
                            data_row += '<td>' + row.grp_id + '</td>';
                            data_row += '<td>' + 'T' + row.sec_level + '  ' + row.sec_name + '</td>';
                            data_row += '<td>' + row.grp_date + '</td>';
                            data_row += '<td><a href="<?php echo site_url() ?>Report/Summary/score_manage/' + row.grp_id + ' ">'
                            data_row += '<button type="button" class="btn btn-primary btn-sm" style="background-color: info;">'
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
     * @input    -
     * @output   -
     * @author   Chakrit and Jirayut
     * @Create Date 2564-08-22
     * @Update Date 2564-08-23
     */
    function show_modal(grp_id) {
        console.log(grp_id)
        window.location.href = '../score_manage/' + grp_id;
    }
</script>