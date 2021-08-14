<!--
    * v_add_file_present
    * display Management file present of Nominee list
    * @author : 1. Jaraspon and Natthanit
    * @Create date : 2564-08-13
    * @Update date : 2564-08-14
    * @Update by : Ponprapai and Thitima
-->
<!-- CSS -->
<style>
#Nominee_file_table td,
#Nominee_file_table th {
    padding: 8px;
    text-align: center;
}

#Nominee_file_table tr:nth-child(even) {
    background-color: #e9ecef;
}

#Nominee_file_table tr:hover {
    background-color: #adb5bd;
}

#card_radius {
    margin-left: 14px;
    margin-right: 15px;
    border-radius: 20px;
    width: auto;
    min-height: 300px;
}

#Nominee_file_table {
    width: 98%;
    margin-top: 20px;
    margin-left: 10px;
}

div.b {
    text-align: left;

}

div.a {
    text-align: center !important;

}
</style>
<h1>Add File Nominee</h1>
<!-- Table group Nominee list -->
<div class="card-header" id="card_radius">
    <div class="table-responsive">
        <table class="table align-items-center" id="Nominee_file_table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID Employee.</th>
                    <th scope="col">Nominee Name</th>
                    <th scope="col">Position</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="list">
                <?php for ($i = 0; $i < count($emp_nominee); $i++) { ?>
                <tr>
                    <td class="text-center">
                        <?php echo ($i + 1); ?>
                    </td>
                    <td>
                        <?php echo $emp_nominee[$i]->Emp_ID ?>

                    </td>
                    <td>
                        <?php echo $emp_nominee[$i]->Empname_eng . ' ' . $emp_nominee[$i]->Empsurname_eng ?>

                    </td>
                    <td>
                        <?php echo $emp_nominee[$i]->Pos_shortName ?>

                    </td>
                    <td>
                        <?php echo $emp_nominee[$i]->Department ?>

                    </td>
                    <!-- column ดำเนินการ -->
                    <td style='text-align: center;'>

                        <!-- ปุ่มดำเนินการ -->
                        <!-- <a -->
                        <!-- <a
                            href="<?php site_url() . '/File_present_management/File_present_management/insert_file_nominee/' . $emp_nominee[$i]->Emp_ID; ?>">
                        </a> -->


                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"> <i
                                class="fas fa-download"></i> </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>

                                    </div>
                                    <div class="b">
                                        <h4 class="modal-title">&emsp;Attachment :</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="file" name="fil_name" class="form-control" required=""
                                            accept="pdf">
                                        <a
                                            href="<?php site_url() . '/File_present_management/File_present_management/insert_file_nominee/' . $emp_nominee[$i]->Emp_ID; ?>">
                                            <button type="submit" class="btn btn-success" data-dismiss="modal">Uplord
                                                ThisFile</button> </a>
                                    </div>
                                    <!-- <div class="modal-dialog">
                                        <a
                                            href="<?php site_url() . '/File_present_management/File_present_management/insert_file_nominee/' . $emp_nominee[$i]->Emp_ID; ?>">
                                            <button type="submit" class="btn btn-success" data-dismiss="modal">Uplord
                                                ThisFile</button> </a>
                                        <!-- <button type="" class="btn btn-success">Uplord This File</button> -->
                                </div> -->
                            </div>
                        </div>
    </div>

    <!-- </a> -->
    </td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
</div>
</div>
<script>
$(document).ready(function() {
    $('#Nominee_file_table').DataTable();
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