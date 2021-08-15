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
        <select class="form-control" name=" " style="text-align:center" required><br>
            <option value="T1">T1</option>
            <option value="T2">T2</option>
            <option value="T3">T3</option>
            <option value="T4">T4</option>
            <option value="T5">T5</option>
            <option value="T6">T6</option>
            <option value="T7">T7</option>
        </select>
        Date:
        <input type="date" name=" " class="form-control" min="<?php echo date('Y-m-d'); ?>" required>

        Group :
        <input type="text" name=" " class="form-control" required>
        <button type="submit" class="btn btn-success btn-lg float-right">search</button>
</div>

<div class="card-body" id="card_radius">
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


                <tr>

                    <td style='text-align:center'></td>

                    <td></td>

                    <td></td>

                    <td></td>

                    <td></td>





            </tbody>


            </tr>

        </table>
        <div>
        </div>
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