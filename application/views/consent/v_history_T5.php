<!--
    v_history_T5
    display for Result For T5-T6
    @author Apinya Phadungkit
    Create date 2564-08-14   
    Update date 2564-08-15
    Update date 2564-08-16
    Update date 2564-08-17
    Update date 2564-08-18
    Update date 2564-08-19
-->
<!-- CSS -->
<style>
 table {
  width: 100%;
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
    #gray 
    {
        background-color: #E3E3E3;
    }
    #img 
    {
        display: block;
        margin-left: 150px;
    }
    
    /* จัดตำแหน่งชื่อบริษัท */
    .center_com  {
        padding: 70px;
    }
    #set_id
    {
        width: 10px;
    }
    #set_button
    {
        font-size: 16px;
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
                <div class="col-sm-8 center_com">
                    <h3><?php echo $ev_no[0]->Company_name?></h3>
                </div>
            </div>  
                <!-- ชื่อกรรมการ และวันประเมิน -->
                <div class="row">
                    <div class="col-sm-6">
                        <h3>Assessor Name :&nbsp; <?php echo $ev_ass[0]->Empname_eng . ' ' . $ev_ass[0]->Empsurname_eng ?></h3>
                    </div>
                    <div class="col-sm-3">
                        <?php $newDate = date("d/m/Y", strtotime($ev_ass[0]->grp_date)); ?>
                        <h3>Date : <?php echo $newDate ?></h3>
                    </div>
                
                </div>         
                <br>
            <div class="table-responsive">
            
                <table class="table table-bordered table-sm">
                    <tr id="Manage">
                        <th colspan="5" id="gray"><center><b>Stretch Assignment Evaluation Form (Promote to <?php echo $pos_pos->sec_name;?> [ <?php echo $pos_pos->sec_level;?> ]) </b>
                    </tr>
                        <tbody>
                        <tr id="Manage">
                            <th width="50px" id="gray">Name - Surname</th>
                            <td colspan="2">
                                <?php echo $ev_no[0]->Empname_eng . ' ' . $ev_no[0]->Empsurname_eng ?>
                            </td>
                            <th width="40px" id="gray">Position</th>
                            <td>
                                <?php echo $ev_no[0]->Position_name?>
                            </td>
                        </tr>
                        <tr id="Manage">
                            <th width="40px" id="gray">Promote to</th>
                            <td colspan="2"><?php echo $pos_pos->sec_name;?></td>
                            <th width="40px" id="gray">Department/Section</th>
                            <td>
                                <?php echo $ev_no[0]->Department?>
                            </td>
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
                                <!--เริ่ม ตารางหัวข้อลงคะแนน-->
                                <?php $count_discription = 0;  //จำนวนหัวข้อย่อยจริงๆเป็นของอันเก่าไม่ต้องทำแต่ขี้เกียจแก้
                                    $count_itm=1; //จำนวนหัวข้อหลัก
                                    $total=0; //ผลรวมของคะแนน
                                    $total_weight=0; //ผลรวมของน้ำหนัก
                                    $total_per=0;
                                    $weight=0; //น้ำหนักของคะแนน
                                    for($i=0;$i<count($arr_dis);$i++){
                                        if($i!=0){
                                            if($arr_dis[$i]->itm_id !=$arr_dis[$i-1]->itm_id){
                                                $count_itm++;
                                            }
                                        }
                                    }//นับหัวข้อหลัก

                                    for($i=0;$i< $count_itm;$i++) {   //ลูปตามหัวข้อหลัก?>
                                        <?php $count_rowspan = 0; 
                                            for($loop_rowspan=0;$loop_rowspan<count($arr_dis);$loop_rowspan++){
                                                if($arr_dis[$loop_rowspan]->des_itm_id == $arr_dis[$i]->itm_id){
                                                    $count_rowspan++;
                                                }
                                            }//นับ discription เพื่อกำหนด rowspan ?>
                                
                                        <?php $loop_dis=1;
                                            while($loop_dis<=$count_rowspan) {?>
                                                <tr>
                                                <?php  if($loop_dis===1) {?> 
                                                    <td rowspan="<?php echo $count_rowspan; ?>" align="center"> <b>
                                                        <?php  echo $arr_dis[$count_discription]->itm_detail_eng ;?>
                                                        <br><?php  echo $arr_dis[$count_discription]->itm_detail_th; ?></b> 
                                                    </td> 
                                                <?php }//แสดงห้อข้อหลัก?> 

                                                    <td > 
                                                        <b> <?php  echo $arr_dis[$count_discription]->des_description_th ;?></b>	
                                                        <br>
                                                    <!-- แสดง Disription    -->
                                                        <?php $pos = strrpos($arr_dis[$count_discription]->des_description_eng, ".");//ตัดประโยคโดยหา"."
                                                            echo substr($arr_dis[$count_discription]->des_description_eng, 0 ,$pos+1); ?>
                                                            <br>
                                                        <?php echo substr($arr_dis[$count_discription]->des_description_eng, $pos+1 ,strlen($arr_dis[$count_discription]->des_description_eng))?>
                        
                                                    </td>
                                                    <!-- แสดง % Weight -->
                                                    <td align="center">
                                                        <?php  echo $arr_sco[$count_discription]->for_des_weight; ?>
                                                    </td>
                                                    <!-- แสดง point    -->
                                                    <td align="center">
                                                        <div class="form-group">

                                                        <?php  echo $arr_sco[$count_discription]->ptf_point; ?>

                                                        </div> 
                                                    </td>
                                                    <!-- แสดง Score -->
                                                    <td align="center">
                                                        <?php echo $arr_sco[$count_discription]->for_des_weight*$arr_sco[$count_discription]->ptf_point;
                                                            $total=$total+$arr_sco[$count_discription]->for_des_weight*$arr_sco[$count_discription]->ptf_point;
                                                            $weight+=5*$arr_sco[$count_discription]->for_des_weight;
                                                            $total_per=($total/$weight)*100;
                                                        ?> 
                                                    </td>
                                                    <?php  $count_discription++; ?>
                                            <?php $loop_dis++;} ?>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td colspan="2" align='right'><b>Total</b></td>
                                <td align='center'>100</td>
                                <td align='center'><?php echo $total; ?></td>
                                <td align='center'><?php echo number_format($total_per, 2, '.', '');  ?> %</td>
                            </tr>
                    </table>
                    <br>
                        <!-- Comment -->
                        <div class="form-group">
                            <label for="comment"><b>Comment :</b></label><br>
                            <textarea><?php echo $arr_com->per_comment; ?></textarea>
                            
                        </div>
                        <br>
                        <!-- Q/A -->
                        <div class="form-group">
                            <label for="QnA"><b>Q/A :</b></label><br>
                            <textarea><?php echo $arr_com->per_q_and_a; ?></textarea>
                        </div>
                        <br>
                        
                    <!-- Back button -->
                    <a href="<?php echo base_url() . 'Result/Result/show_result_list/'; ?>">
                        <button type="submit" class="btn btn-secondary" data-toggle="modal">Back</button>
                    </a>
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
                    <a href="<?php echo site_url() . 'Evaluation/Evaluation_input/update_approve_form_plant/'. $arr_req->req_form_id ; ?>">
                        <button type="button" class="btn btn-success btn-lg float-right">OK</button>
                    </a>
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


// void main() {

// int sum = 0;

// for(int i = 1; i <= $arr_dis[$count_discription]->ptf_point; ++i)
// {
//     sum += i;
// }

// System.out.println("Sum = " + sum);
// }

function sumIt()
{
var number = parseInt (document.getElementById('score').value);
var sum = 0;
for (var i = 1; i <= number;  ++i){
    sum += i;
// document.write (start + "<br>");
System.out.println("Sum = " + sum);
}
}
</script>
    
 