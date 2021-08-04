<!--
    v_print_form
    display detail of form before print 
    @input -
    @output -
    @author Jirayut Saifah
    Create 25/7/2564 
    Update date 
-->
<style>
DIV.text {
    min-height: 10em;
    display: table-cell;
    vertical-align: middle
}
</style>

<body>
    <h1 id="hid">
        Print Form (พิมพ์ใบขออนุญาตวางของ)

    </h1>
    <div class="container">
        <button id="hid" onclick="window.print();" class="btn btn-primary float-right"> print </button>
        <div class="card">

            <span><img src=<?php echo base_url() ?>assets/img/Logo.jfif width="150" height="150">
                <img src=<?php echo base_url() ?>assets/img/HR.png width="150" height="150" align="right"></span>
            <div class="card-body ">
                <form action="<?php echo site_url() . 'licence_form/licence_input/insert'; ?>" method="post"
                    enctype="multipart/form-data">

                    <div class="pl-lg-4">
                        <center>
                            <h1>ป้ายอนุมัติวางของชั่วคราว</h1><br>
                            <h1>(Permission of Temporary Tag)</h1>
                        </center>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">

                                    <label class="form-control-label" for="input-username">หมายเลขเอกสาร
                                        (Running No.)</label>

                                    <input type="text" name="Start_date" class="form-control" required
                                        value="<?php echo $obj_form[0]->req_hr_no ?>" disabled>

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">แผนก
                                        (Department)</label>
                                    <input type="text" name="End_date" class="form-control" required value="<?php if ($obj_form[0]->req_emp_id == $obj_dep[0]->Emp_ID) {
                                                                                                                echo $obj_dep[0]->Department;
                                                                                                            }  ?>"
                                        disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-first-name">ผู้รับผิดชอบ
                                        (Responsibility)</label>
                                    <input type="text" name="Item" class="form-control" require
                                        value="<?php echo $obj_name[0]->Empname_eng . '' . $obj_name[0]->Empsurname_eng ?>"
                                        disabled>
                                </div>
                            </div>
                            <div class=" col-lg-6 ">
                                <div class=" form-group">
                                    <label class="form-control-label" for="input-last-name">เบอร์ติดต่อ
                                        (Ext./Mobile Phone)</label>
                                    <input type="text" name="Reason" class="form-control" require
                                        value="<?php echo $obj_form[0]->req_tel ?>" disabled>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-address">ชื่อ อุปกรณ์
                                        (Equipment name)</label>
                                    <input class="form-control" type="text" name="Officer" require
                                        value="<?php echo $obj_form[0]->req_item ?>" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-city">เหตุผลในการวาง
                                        (The reason in putting)</label>
                                    <input type="text" class="form-control" name="Tell" require
                                        value="<?php echo $obj_form[0]->req_reason ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-username">วันที่เริ่มวาง
                                        (Starting Date)</label>

                                    <input type="date" name="Start_date" class="form-control" required
                                        value="<?php echo $obj_form[0]->req_start_date ?>" disabled>


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" for="input-email">วันที่สิ้นสุด
                                        (End Date)</label>
                                    <input type="date" name="End_date" class="form-control" required
                                        value="<?php echo $obj_form[0]->req_end_date ?>" disabled>
                                </div>
                            </div>

                        </div>


                        <table style="width:100%">

                            <tr>
                                <th>จำนวนครั้งที่วางเอกสาร <br>No.</th>
                                <th>Prepare by </th>
                                <th>Checked#1 <br>(MGR Above) </th>
                                <th>Checked#2 <br>(5S Center) </th>
                                <th>Approved by <br>(5S Leader) </th>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control"
                                        value="<?php echo $obj_form[0]->req_form_count ?>">
                                </td>
                                <td><input type="text" class="form-control"
                                        value="<?php echo $obj_pre[0]->Empname_eng . '  ' . $obj_pre[0]->Empsurname_eng ?>">
                                </td>
                                <td><input type="text" class="form-control"
                                        value="<?php echo $obj_sup[0]->Empname_eng . '  ' . $obj_sup[0]->Empsurname_eng ?>">
                                </td>
                                <td><input type="text" class="form-control"
                                        value="<?php echo $obj_hr[0]->Empname_eng . '  ' . $obj_hr[0]->Empsurname_eng ?>">
                                </td>
                                <td><input type="text" class="form-control"
                                        value="<?php echo $obj_app[0]->Empname_eng . '  ' . $obj_app[0]->Empsurname_eng ?>">
                                </td>
                            </tr>
                        </table>

                </form>
            </div>
        </div>
    </div>
    </div>
    <div class="card" id="hid">
        <div class="card-header">
            <h2>Renew history (ประวัติการต่ออายุการวางของ)</h2>

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Running No.</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < count($obj_his); $i++) { ?>
                    <tr>
                        <th scope="row"><?php echo $i + 1 ?></th>
                        <td><?php echo $obj_his[$i]->req_hr_no ?></td>
                        <td><?php

                                $newDate = date("d-m-Y", strtotime($obj_his[$i]->req_start_date));
                                echo $newDate;
                                ?></td>
                        <td><?php
                                $newDate = date("d-m-Y", strtotime($obj_his[$i]->req_end_date));
                                echo $newDate;
                                ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
<!-- devbanban.com -->