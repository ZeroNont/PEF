<!--
    v_reviewer
    display for review list
    @input -
    @output -
    @author Nattakorn
    Create date 2564-08-13
    Update date 2564-08-
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


    <label class="form-control-label" for="input-email">Promote to:
        <select class="form-control" name="promote_to" style="text-align:center" required><br>
            <option value="T1">T1</option>
            <option value="T2">T2</option>
            <option value="T3">T3</option>
            <option value="T4">T4</option>
            <option value="T5">T5</option>
            <option value="T6">T6</option>
            <option value="T7">T7</option>
        </select>


        <div class="form-group">
            Date:
            <input type="date" name="grp_date" class="form-control" required>
        </div>
        <label class="form-control-label" for="input-email">
            Group :
            <input type="text" name="grp_id" class="form-control" required>
            <button onclick='show_all_data()' class="btn btn-success btn-lg float-right">search</button>




</div>
<div class="table-responsive">

    <table class="table" style="width:100%" id="example">
        <thead class="thead-light">



            <tr>
                <th>#</th>
                <th>Promote to</th>
                <th>Group ID</th>
                <th>Date</th>

                <th>Action</th>


            </tr>
        </thead>
        <tbody>
            <form action="<?php echo site_url() . 'Reviewer/Reviewer/add_data/'; ?>" method='post'>
                <?php
                $No = 1;
                for ($i = 0; $i < count($arr_nom); $i++) { ?>
                <?php if ($arr_nom[$i]->grn_status == 2); { ?>
                <tr>

                    <td style='text-align:center'>
                        <?php if ($arr_nom[$i]->grn_status == 2) {
                                    echo $No++;
                                } ?></td>

                    <td><?php if ($arr_nom[$i]->grn_status == 2)
                                    echo $arr_nom[$i]->grn_promote_to;
                                ?></td>

                    <td><?php if ($arr_nom[$i]->grn_status == 2)
                                    echo $arr_nom[$i]->grn_grp_id;
                                ?></td>

                    <td><?php if ($arr_nom[$i]->grn_status == 2)
                                    echo $arr_nom[$i]->grp_date;
                                ?></td>


                    <input type="text" class="form-control" name="grp_id" value='<?php echo $arr_nom[0]->grp_id ?>'
                        hidden>
                    <input type="text" class="form-control" name="grp_date"
                        value='<?php echo date("Y/m/d", strtotime('today')) ?>' hidden>
                    <input type="text" class="form-control" name="grp_name"
                        value='<?php echo $arr_nom[0]->grp_promote_to ?>' hidden>
                    <td>
                        <a href='<?php echo site_url() . '/Reviewer/Reviewer/add_data/' ?>'>
                            <button type="submit" class="btn btn-success btn-lg float-right"> review </button>
                        </a>
                    </td>
            </form>




        </tbody>


        </tr>
        <?php } ?>
        <?php } ?>
    </table>
    <div>


    </div>
</div>
<script>
$(document).ready(function() {
    $('#example').DataTable();
});
</script>
<script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="../../assets/js/argon.js?v=1.2.0"></script>
<script type="text/javascript">
function show_all_data() {
    var promote = document.getElementById('promote_to').value;
    var date = document.getElementById('grp_date').value;
    var grp_id = document.getElementById('grp_id').value;
    console.log(promote)
    console.log(grp_id)
    console.log(date)
    $.ajax({
        type: 'POST',
        url: "<?php echo base_url() ?>Report/Report/get_report",
        dataType: "JSON",
        data: {
            "promote_to": promote,
            "grp_id": grp_id,
            "grp_date": = date
        }
    });

}