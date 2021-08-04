<!--
    v_check_status
    display form status 
    @input -
    @output -
    @author Jirayut Saifah
    Create 25/7/2564 
    Update date 
-->
<h1>
    Check status (ตรวจสอบสถานะคำร้องขอ)

</h1>

<div class="card-header" id="card_radius">
    <div class="table-responsive">

        <table class="table" id="example">
            <thead class="thead-light">
                <tr>
                    <th>#</th>

                    <th>Item</th>
                    <th>Supervisor</th>
                    <th>HR/5S Center</th>
                    <th>Approve Plant</th>
                    <th>Remaining Time</th>
                    <th>Number of Edits</th>
                    <th>Printing Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < count($obj_status); $i++) { ?>
                <tr>
                    <td>
                        <?php echo $i + 1 ?>
                    </td>

                    <td>
                        <?php echo $obj_status[$i]->req_item ?>
                    </td>
                    <td>
                        <?php
                            if ($obj_status[$i]->req_status >= 2 or $obj_status[$i]->req_status < 0) {
                                echo "อนุมัติ";
                            } else if ($obj_status[$i]->req_status  == 0) {
                                echo "ไม่อนุมัติ";
                            } else {
                                echo "-";
                            }

                            ?>
                    </td>
                    <td>
                        <?php
                            if ($obj_status[$i]->req_status >= 3 or $obj_status[$i]->req_status <= -2) {
                                echo "อนุมัติ";
                            } else if ($obj_status[$i]->req_status == -1) {
                                echo "ไม่อนุมัติ";
                            } else {
                                echo "-";
                            }

                            ?>
                    </td>
                    <td>
                        <?php
                            if ($obj_status[$i]->req_status >= 4) {
                                echo "อนุมัติ";
                            } else if ($obj_status[$i]->req_status == -2) {
                                echo "ไม่อนุมัติ";
                            } else {
                                echo "-";
                            }

                            ?>
                    </td>
                    <td>
                        <?php
                            $str =  (strtotime($obj_status[$i]->req_end_date)) - strtotime(date("M d Y "));
                            $str = floor($str / 3600 / 24);
                            if ($str <= 5) {
                                echo $str;
                            } else {
                                echo "-";
                            }
                            // echo $str;
                            ?>
                    </td>
                    <td>
                        <?php echo $obj_status[$i]->req_form_count ?>
                    </td>

                    <td>
                        <?php if ($obj_status[$i]->req_print_status == 1) { ?>

                        <img src="<?php echo site_url() . '/assets/file/icon/check.png' ?>" width="30">
                        <?php } else { ?>
                        <img src="<?php echo site_url() . '/assets/file/icon/remove.png' ?>" width="30">
                        <?php } ?>
                    </td>

                    <td>
                        <?php if ($obj_status[$i]->req_status <= 0) { ?>
                        <a
                            href="<?php echo site_url() . 'licence_form/licence_input/edit_form/' . $obj_status[$i]->req_form_id; ?>">
                            <img src="<?php echo site_url() . '/assets/file/icon/edit.png' ?>" width="30">
                        </a>
                        <?php } else { ?>
                        <img src="<?php echo site_url() . '/assets/file/icon/edit_2.png' ?>" width="30">
                        <?php } ?>
                        <?php if ($obj_status[$i]->req_status == 4) { ?>
                        <a
                            href="<?php echo site_url() . 'form_management/Print_form/print_detail/' . $obj_status[$i]->req_form_id; ?>">
                            <img src="<?php echo site_url() . '/assets/file/icon/printing.png' ?>" width="30">
                        </a>
                        <?php } else { ?>
                        <img src="<?php echo site_url() . '/assets/file/icon/print_2.png' ?>" width="30">
                        <?php } ?>
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
    </script>
    <script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Argon JS -->
    <script src="../../assets/js/argon.js?v=1.2.0"></script>
    <script type="text/javascript">