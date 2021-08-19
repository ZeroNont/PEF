<!--
    /*
    * v_add_file_present
    * display Management file present of Nominee list
    * @author Jaraspon and Natthanit
    * input Array of nominee group (emp_nominee)
    * output Input file of present to nominee
    * @Create date : 2564-08-13
    * @Update date : 2564-08-15
    */
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
                    <th scope="col">ID Employee</th>
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
                        <?php
                            // ตรวจสอบว่ามีไฟล์หรือยัง
                            $check = 0;
                            foreach ($emp_file as $row) {
                                if ($row->fil_emp_id == $emp_nominee[$i]->Emp_ID) {
                                    $check++;
                                }
                                // if 
                            }
                            // foreach 
                            // ยังไม่มีไฟล์จะเพิ่มไฟล์
                            if ($check == 0) { ?>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#insert_modal_file<?php echo $i ?>"><i class="fas fa-file-upload"></i></button>
                        <?php  }
                            // if
                            //เคยมีไฟล์แล้วจะอัปเดต
                            else { ?>
                        <button type=" button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#edit_modal_file<?php echo $i ?>"><i class="fas fa-file-upload"></i></button>
                        <?php  } ?>
                        <!-- else -->


                        <!-- Modal insert-->
                        <div class="modal fade" id="insert_modal_file<?php echo $i ?>" role="dialog">
                            <form action="<?php echo site_url() ?>File_present_management/File_present_management/insert_file_nominee" method="post" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();" name="present">
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
                                            <input type="file" name="fil" class="form-control" required="" accept="application/pdf">
                                            <input type="text" name="Emp_ID" value="<?php echo $emp_nominee[$i]->Emp_ID ?>" hidden>
                                            <br>
                                            <button type="submit" class="btn btn-success" onclick="show_message_success()">Upload This File</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Modal edit -->
                        <div class="modal fade" id="edit_modal_file<?php echo $i ?>" role="dialog">
                            <form action="<?php echo site_url() ?>File_present_management/File_present_management/edit_file_nominee" method="post" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();" name="present">
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
                                            <input type="file" name="fil" class="form-control" required="" accept="application/pdf">
                                            <input type="text" name="Emp_ID" value="<?php echo $emp_nominee[$i]->Emp_ID ?>" hidden>
                                            <br>
                                            <button type="submit" class="btn btn-success" onclick="show_message_success()">Upload This File</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

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

// notification upload file
function show_message_success() {
    alert("Upload File Success.");
    return;
}
</script>
<script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<!-- Argon JS -->
<script src="../../assets/js/argon.js?v=1.2.0"></script>
<script type="text/javascript">