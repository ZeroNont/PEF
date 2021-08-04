<!--
    v_check_out
    check out Item
    @input -
    @output -
    @author Jirayut Saifah
    Create 25/7/2564 
    Update date 
-->
<!DOCTYPE html>
<html>
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
</style>

<h1>
    Check Out (การแจ้งย้ายของ)

</h1>

<div class="card-header" id="card_radius">
    <div class="table-responsive">

        <table class="table" id="example">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Running No.</th>
                    <th>Item</th>
                    <th>Schedule</th>
                    <th>Officer</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($obj_form); $i++) { ?>
                <tr>
                    <td>
                        <?php echo $i + 1 ?>
                    </td>
                    <td>
                        <?php echo $obj_form[$i]->req_hr_no ?>
                    </td>
                    <td>
                        <?php echo $obj_form[$i]->req_item ?>
                    </td>
                    <td>
                        <?php
                            $Start_date = $obj_form[$i]->req_start_date;
                            $End_date = $obj_form[$i]->req_end_date;
                            $newDate = date("d-m-Y", strtotime($Start_date)) . ' - ' . date("d-m-Y", strtotime($End_date));
                            echo $newDate  ?>
                    </td>
                    <td>
                        <?php echo $obj_form[$i]->req_officer ?>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-warning" data-toggle="modal"
                            data-target="#exampleModalCenter<?php echo $i; ?>">
                            แจ้งย้ายของออก
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter<?php echo $i; ?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h1 aligh=center>ยืนยันการแจ้งย้ายของออก</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Cancel</button>
                                        <a
                                            href="<?php echo site_url() . 'Check_out_form/Check_out_form/check_out/' . $obj_form[$i]->req_form_id; ?>">
                                            <button type="button" class="btn btn-success">Confirm</button>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php  } ?>
            </tbody>
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