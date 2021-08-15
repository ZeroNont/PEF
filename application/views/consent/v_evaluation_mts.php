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
    #img 
    {
        display: block;
        margin-left: 150px;
    }
    #card_radius
    {
        border-radius: 20px;
    }
    #center_th td
    {
        text-align: center;
        font-weight: bold;
    }
    #Manage th
    {
        text-align: center;
        font-weight: bold;
    }
    #Manage_td
    {
        text-align: center;
    }

    /* จัดตำแหน่งชื่อบริษัท */
    .center_com  {
        padding: 70px;
    }
    #set_id
    {
        width: 10px;
    }
</style>

<!-- Evaluation form -->
<h1>Evaluation</h1>
<div class="container"> 
    <div class="card" id="border-radius">  
        <div class="card-body">
            <!-- Logo บริษัท และชื่อบริษัท -->
            <div class="row">
                <div class="col-sm-4">
                    <img src=<?php echo base_url()."argon/assets/img/brand/denso_1.png" ?> width="150" height="150">
                    </div>
                <div class="col-sm-8 center_com"><h3>ชื่อบริษัท gggggggggggggggggggggggggg</h3></div>
            </div>  
                <!-- ชื่อกรรมการ และวันประเมิน -->
                <div class="row">
                    <div class="col-sm-6"><h3>Assessor Name :</h3></div>
                    <div class="col-sm-3"><h3>Date :</h3></div>
                </div>      
            <div class="table-responsive">
            <form action="<?php echo site_url() ?>Evaluation/Evaluation/insert_performance_form" method="post" enctype="multipart/form-data" name="evaluation">
                <table class="table table-bordered table-sm">
                    <tr id="Manage">
                        <th colspan="5"><center><b>Performance Factor Evaluation <br> (Promote to Master, Master-Interpreting, Senior Specialist, Senior Specialist-Interpreting)</b>
                        </center></th>
                    </tr>
                        <tbody>
                        <tr id="Manage">
                            <th width="40px">Name - Surname</th>
                            <td colspan="2"></td>
                            <th width="40px">Position</th>
                            <td></td>
                        </tr>
                        <tr id="Manage">
                            <th width="40px">Promote to</th>
                            <td colspan="2"></td>
                            <th width="40px">Department/Section</th>
                            <td></td>
                        </tr>
                        </tbody>
                </table>
                    <br>
                    <h2><b>< Assessor ></b></h2>
                    <!-- Table Score -->
                    <table class="table table-bordered table-sm">
                        <tbody>
                            <tr id="center_th">
                                <td rowspan="2">ITems</td>
                                <td rowspan="2">Points for observation</td>
                                <td>% weight</td>
                                <td>Rating(B)</td>
                                <td>Score</td>
                            </tr>
                            <tr id="center_th" >
                                <td>(A)</td>
                                <td>[Fill score 1-5]</td>
                                <td>(AxB)</td>
                            </tr>
                            <tr>
                                <td align='center'>Awareness of the issue <br>
                                       ตระหนักในปัญหา</td>
                                <td id="set_id">
                                    Is aware of the issues of the business in their area of responsibility;understands the environment or issues of their department.<br>
                                    ตระหนักในปัญหาของงานที่รับผิดชอบ เข้าใจสิ่งแวดล้อมหรือสภาพปัญหา <br>
                                    ของแผนกตนเอง
                                </td>
                                <td align='center'>15</td>
                                <td>
                                    <div class="form-group">
                                        <label for="sel1"></label>
                                            <select class="form-control" id="sel1" name="row">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                    </div>
                                </td>
                                <td align='center'>0</td>
                            </tr>
                            <tr>
                                <td align='center'>Analytical ability <br>
                                    ความสามารถเชิงวิเคราะห์
                                </td>
                                <td id="set_id">
                                    Can logically analyze issues in order to solve them and extract the <br>
                                    problems appropriately based on the analysis.<br>
                                    สามารถวิเคราะห์ปัญหาได้อย่างมีเหตุผลเพื่อแก้ไขและขจัดปัญหาออกไป <br>
                                    ได้อย่างเหมาะสมโดยใช้หลักการวิเคราะห์
                                </td>
                                <td align='center'>15</td>
                                <td>
                                    <div class="form-group">
                                        <label for="sel1"></label>
                                            <select class="form-control" id="sel1" name="row">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                    </div>
                                </td>
                                <td align='center'>0</td>
                            </tr>
                            <tr>
                                <td align='center'>Problem solving ability <br>
                                    ความสามารถในการแก้ปัญหา
                                </td>
                                <td id="set_id">
                                    Figures out new solutions or mechanisms for solving the issues by <br>
                                    combining existing facts with information.<br>
                                    หาหนทางใหม่ๆ หรือกลวิธีในการแก้ไขปัญหาโดยการรวบรวมข้อเท็จจริงและข้อมูล
                                </td>
                                <td align='center'>15</td>
                                <td>
                                    <div class="form-group">
                                        <label for="sel1"></label>
                                            <select class="form-control" id="sel1" name="row">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                    </div>
                                </td>
                                <td align='center'>0</td>
                            </tr>
                            <tr>
                                <td align='center'>Relationship - building <br>
                                    ability <br>
                                    ความสามารถในการสร้าง <br>
                                    สัมพันธภาพอันดี
                                </td>
                                <td id="set_id">
                                    Involves their supervisors, workplace, or related departments and gains<br>
                                    cooperation, obtaining necessary information from inside and outside<br>
                                    the company. <br>
                                    มีส่วนร่วมกับผู้บังคับบัญชา สถานที่ทำงานหรือแผนกที่เกี่ยวข้อง และให้ความร่วมมือ <br>
                                    เพื่อให้ได้ข้อมูลที่เป็นประโยชน์จากทั้งภายในและภายนอกบริษัท
                                </td>
                                <td align='center'>15</td>
                                <td>
                                    <div class="form-group">
                                        <label for="sel1"></label>
                                            <select class="form-control" id="sel1" name="row">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                    </div>
                                </td>
                                <td align='center'>0</td>
                            </tr>
                            <tr>
                                <td align='center'>Vitality, trustworthiness<br>
                                    เต็มที่ด้วยจิตวิญญาณและ <br>
                                    เป็นที่ไว้วางใจ
                                </td>
                                <td id="set_id">
                                    Possesses the energy to execute tasks with a sense of responsibility <br>
                                    and is highly trusted by people around them.<br>
                                    มีพลังเต็มที่ในการทำงานพร้อมทั้งมีความรับผิดชอบและได้รับความไว้วางใจ <br>
                                    จากผู้คนรอบข้าง <br>
                                </td>
                                <td align='center'>15</td>
                                <td>
                                    <div class="form-group">
                                        <label for="sel1"></label>
                                            <select class="form-control" id="sel1" name="row">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                    </div>
                                </td>
                                <td align='center'>0</td>
                            </tr>
                            <tr>
                                <td align='center'>Expert knowledge and <br>
                                    skills <br>
                                    ความรู้ความชำนาญ 
                                    และทักษะ <br>
                                </td>
                                <td id="set_id">
                                    Possesses expert knowledge and skills required to execute the tasks <br>
                                    for which they are responsible. <br>
                                    มีความรู้ความเชี่ยวชาญและทักษะที่จำเป็นต่องานที่รับผิดชอบ
                                </td>
                                <td align='center'>20</td>
                                <td>
                                    <div class="form-group">
                                        <label for="sel1"></label>
                                            <select class="form-control" id="sel1" name="row">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                    </div>
                                </td>
                                <td align='center'>0</td>
                            </tr>
                            <tr>
                                <td align='center'>Ability for leadership <br>
                                    and training  <br>
                                    ความสามารถในการเป็นผู้นำ <br>
                                    และถ่ายทอดความรู้
                                </td>
                                <td id="set_id">
                                    Has the ability to explain and impart knowledge and skills of the business <br>
                                    in their area of responsibility to their more colleagues and <br>
                                    enhance the total power of the Organization. <br>
                                    สามารถอธิบายและให้ความรู้และทักษะที่เกี่ยวกับงานที่รับผิดชอบ <br>
                                    ให้ผู้ร่วมงานได้ทราบและเสริมสร้างพลังให้กับองค์กร
                                </td>
                                <td align='center'>5</td>
                                <td>
                                    <div class="form-group">
                                        <label for="sel1"></label>
                                            <select class="form-control" id="sel1" type="number" name="row">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                    </div>
                                </td>
                                <td align='center'>0</td>
                            </tr>
                            <tr>
                                <td colspan="2" align='right'><b>Total</b></td>
                                <td align='center'>100</td>
                                <td align='center'>0</td>
                                <td align='center'>0.0%</td>
                            </tr>
                    </table>
                    <br>
                        <!-- Comment -->
                        <div class="form-group">
                            <label for="comment"><b>Comment :</b></label>
                            <textarea class="form-control" rows="5" id="comment" type="text" name="comment"></textarea>
                        </div>
                        <br>
                        <!-- Q/A -->
                        <div class="form-group">
                            <label for="QnA"><b>Q/A :</b></label>
                            <textarea class="form-control" rows="5" id="QnA" type="text" name="QnA"></textarea>
                        </div>
                        <br>
                        </form>
                    <!-- Confirm -->
                    <button type="submit" class="btn btn-success float-right" data-toggle="modal" data-target="#Modal_confirm">Confirm</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal ยืนยันการประเมิน -->
<div class="modal fade"  data-backdrop="static" id="Modal_confirm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="img">
                <!-- icon -->
                <img src=<?php echo base_url() ."argon/assets/img/brand/danger.png"?> width="150" height="150">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" align="center">
                <div class="modal-title" id="ModalLabel">
                    <h1><b>Evaluation Confirm</b></h1>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-lg float-right" data-dismiss="modal">Cancel</button>

                <!-- Modal Confirm Evaluation -->
                <button type="button" class="btn btn-success btn-lg float-right" id="btn_success" data-toggle="modal"
                    data-target="#successModal">
                    Confirm
                </button>
            </div>

        </div>
    </div>
</div>
<!-- End Modal Confirm Evaluation -->

<!-- model success -->
<div class="modal fade" data-backdrop="static" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header" id="img">
                <!-- icon -->
                <img src=<?php echo base_url() ."argon/assets/img/brand/tick.png"?> width="150" height="150">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body" align="center">
                    <h1> <b>Success</b> </h1>
                </div>
                <div class="modal-footer">
                    <!-- <a href=""> -->
                    <button type="button" class="btn btn-success btn-lg float-right">OK</button>
                    <!-- </a> -->
                </div>
        </div>
    </div>
</div>
<!-- end modal success -->

<!--ซ่อน Modal ยืนยันการประเมิน-->
<script>
$(document).ready(function() {
    $("#btn_success").click(function() {
        $("#Modal_confirm").hide()
    });
});
</script>
    
 