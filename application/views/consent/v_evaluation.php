<!--
    v_history_user
    display history list
    @author Phatchara and Pontakon
    Create date 22/7/2564   
    Update date 25/7/2564
    Update date 26/7/2564
    Update date 27/7/2564
    Update date 28/7/2564
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
    background-color: #e9ecef;
}

#history_table tr:hover {
    background-color: #adb5bd;
}

#card_radius {
    margin-left: 14px;
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
<h1>Evaluation</h1>
<!-- Table Requestd form -->
<div class="card-header" id="card_radius">
    <div class="table-responsive">
        <table class="table align-items-center" id="history_table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee ID</th>
                    <th scope="col">List of Assessor</th>
                    <th scope="col">Group</th>
                    <th scope="col">Date</th>
                    <th scope="col">Position</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="list">
               
            </tbody>
        </table>
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