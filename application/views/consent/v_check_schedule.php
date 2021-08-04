<!--
    v_check_schedule
    display for schedule
    @author Phatchara and Pontakon
    Create date 22/7/2564   
    Update date 25/7/2564
    Update date 26/7/2564
    Update date 27/7/2564
    Update date 28/7/2564
    Update date 29/7/2564
    Update date 30/7/2564
-->
<!-- CSS -->
<style>
#history_table td,
#history_table th {
    padding: 8px;
    text-align: center;
}

#history_table tr:nth-child(even) {
    background-color: #dee2e6;
}

#card_radius {
    margin-left: 15px;
    margin-right: 15px;
    border-radius: 20px;
    width: auto;
    min-height: 300px;
}

#history_table {
    width: 98%;
    margin-top: 20px;
    margin-left: 10px;
}
</style>

<!-- Table Requestd form -->
<h1>Check Schedule (ระยะเวลาการวางของ)</h1>
<div class="card-header" id="card_radius">
    <div class="table-responsive">
        <table class="table align-items-center" id="history_table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Running No.</th>
                    <th scope="col">Item</th>
                    <th scope="col">Officer in charge</th>
                    <th scope="col">Remaining time</th>
                    <th scope="col">End Date</th>
                </tr>
            </thead>
            <tbody class="list">
                <?php for ($i = 0; $i < count($arr_schedule); $i++) { ?>
                <?php $StartDate = $arr_schedule[$i]->req_start_date;
                    $EndDate =  $arr_schedule[$i]->	req_end_date;
                    $today_date = date("Y-m-d");
                    $totalDate = ((strtotime($EndDate) - strtotime($StartDate)) / (60 * 60 * 24));
                    $ExpDate = (strtotime($EndDate) - strtotime($today_date)) / (60 * 60 * 24); ?>
                <?php if ($EndDate > $today_date  && $arr_form[$i]->req_status != 5) { ?>
                <tr>
                    <td class="text-center">
                        <?php echo ($i + 1); ?>
                    </td>
                    <td>
                        <?php echo $arr_schedule[$i]->req_form_id ?>
                    </td>
                    <td>
                        <?php echo $arr_schedule[$i]->req_item ?>
                    </td>
                    <td>
                        <?php echo $arr_emp[0]->Empname_eng . ' ' . $arr_emp[0]->Empsurname_eng ?>
                    </td>
                    <td>
                        <!-- แสดงแสดงจำนวนวันที่วางของ -->
                        <?php if ($StartDate != $today_date) { ?>
                        <?php echo $totalDate ?> day
                        <?php }
                                //<!-- แสดงแสดงจำนวนวันที่เหลือ -->
                                if ($StartDate == $today_date) { ?>
                        <?php echo $ExpDate; ?> day
                        <?php } ?>
                    </td>
                    <td>
                        <?php $endDate  = date("d/m/Y", strtotime($arr_schedule[$i]->req_end_date)); ?>
                        <?php echo $endDate; ?>
                    </td>
                </tr>
                <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        <div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#history_table').DataTable();
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