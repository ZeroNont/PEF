<!--
    v_evaluation_AMSSSV_MTSSP
    display for Evaluation Form Promote to T5 & T6
    @author Phatchara Khongthandee and Pontakon Mujit
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
            <!-- Logo บริษัท -->
            <div class="row">
                <div class="col-sm-4">
                    <img src=<?php echo base_url()."argon/assets/img/brand/denso_1.png" ?> width="150" height="150">
                    </div>
                <!-- ชื่อบริษัท -->
                <div class="col-sm-8 center_com">
                    <h1><?php echo $ev_no[0]->Company_name?></h1>
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
                    <div class="col-sm-3">
                        <a
                            href="<?php echo base_url()?>upload/<?php echo $ev_file[0]->fil_location ?>" target="_blank">
                            <button type="button" class="btn btn-primary" style="background-color: info;" id="set_button">
                                <i class="far fa-file-pdf text-white"></i> &nbsp; Present Nominee
                            </button>
                        </a>
                    </div>
                </div>         
                <br>
            <div class="table-responsive">
            <form action="<?php echo site_url() ?>Evaluation/Evaluation/insert_evaluation_form" method="post" enctype="multipart/form-data" name="evaluation">
                <table class="table table-bordered table-sm">
                    <tr id="Manage">
                        <th colspan="5" id="gray"><center><b>Stretch Assignment Evaluation Form (Promote to <?php echo $pos_pos->sec_name;?> [ <?php echo $pos_pos->sec_level;?> ]) </b>
                    </tr>
                    <tbody>
                        <tr id="Manage">
                            <!-- ชื่อ-นามสกุล Nominee -->
                            <th width="50px" id="gray">Name - Surname</th>
                                <td colspan="2">
                                    <?php echo $ev_no[0]->Empname_eng . ' ' . $ev_no[0]->Empsurname_eng ?>
                                </td>
                            <!-- ตำแหน่ง Nominee -->
                            <th width="40px" id="gray">Position</th>
                                <td>
                                    <?php echo $ev_no[0]->Position_name?>
                                </td>
                        </tr>
                        <!-- แผนก Nominee -->
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
                                    $weight=0;
                                    for($i=0;$i<count($arr_dis);$i++){
                                        if($i!=0){
                                            if($arr_dis[$i]->itm_id !=$arr_dis[$i-1]->itm_id){
                                                $count_itm++;
                                            }
                                        }
                                        $weight =  $weight+$arr_dis[$i]->for_des_weight;
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
                                                        <?php  echo $arr_dis[$count_discription]->for_des_weight ;?>
                                                    </td>
                                                    <!-- แสดง point    -->
                                                    <td>
                                                        <div class="form-group">
                                                            <label for="sel"></label>
                                                            <select class="form-control" name="form[]" id="form_<?php echo $count_discription ;?>" onchange="calculate_weight()" >
                                                                    <option value="0">please selected</option>
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                            </select>
                                                        </div> 
                                                    </td>
                                                    <!-- แสดง Score -->
                                                    </td>
                                    <td colspan ="2" id="show_weight_<?php echo $count_discription ;?>"  style="vertical-align:middle; text-align: center;"></td>
                                    <input type="text" name="point_list[]" ID="point_list<?php  echo  $count_discription ;?>" value="0" hidden>
                                    <input type="text"  ID="weight_list_<?php echo $count_discription ;?>" value=<?php echo$arr_dis[$i]->for_des_weight ; ?> hidden>  
                                            <?php $count_discription++ ;$loop_dis++;}?> 
                                            <input type="hidden" value="<?php echo 	$arr_dis[$i]->for_id ?>" name="for_id[]">
                                            
                            </tr>
                            
                            <?php } ?>
                            <!-- แสดง Score -->
                            
                            <input type="text"  ID="count_index" value=<?php echo $count_discription ; ?> hidden>              
                            <input type="text" name="weight"  ID="weight" value=<?php echo $weight ; ?>  hidden>
                            <input type="text" name="weight-per"  ID="weight-per" value=<?php echo $weight * 5 ; ?> hidden >
                            <tr>
                                <td colspan="2" align='right'><b>Total</b></td>
                                <td align='center'>100</td>
                                <td><input type="text" name="total" size='1' disabled  style='border: none'> </td>
                                <td><input type="text" name="total_weight" size='1' disabled  style='border: none';></td>
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
                        <input type="hidden" value="<?php echo $ev_ass[0]->ase_id ?>" name="ase_id">
                        <input type="hidden" value="<?php echo $ev_no[0]->grn_emp_id ?>" name="emp_id">
                        
                    <!-- Confirm -->
                    <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#Modal_confirm">Confirm</button>
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
                        <button type="submit" class="btn btn-success btn-lg float-right">OK</button>
                </div>
        </div>
    </div>
</div>
</form>
<!-- end modal success -->


<script>
$( document ).ready(function() {
    $("select").change(function(){
        var toplem=0;
        var i =0;
        $("select[name='form[]']").each(function(){
            
            var w = document.getElementById("weight_list_"+i).value;
            var s = w*parseInt($(this).val());
            toplem = toplem+s;
            i = i+1;
        })
        $("input[name=total]").val(toplem);
    });  //คืนค่าคะแนนรวม
    
    $("select").change(function(){
        var toplem=0;
        var i =0;
        var weight = $("#weight-per").val();
        $("select[name='form[]']").each(function(){
            var w = document.getElementById("weight_list_"+i).value;
            var s = w*parseInt($(this).val());
            toplem = toplem+s;
            i = i+1;

        }) 
        
            toplem = Math.round(toplem / weight*100);
            var a = '%'
        $("input[name=total_weight]").val(toplem + a);

    }); //คืนค่าคะแนนรวมแบบเปอเซ็น


    //คืนค่าคะแนนรวมแบบรายการ
    calculate_weight()

    // ซ่อน Modal ยืนยันการประเมิน
    $("#btn_success").click(function() {
        $("#Modal_confirm").hide();

    });
})
        
        function calculate_weight(){
            var count = document.getElementById("count_index").value;
            
            for(i=0;i<count;i++){
                var h = document.getElementById("form_"+i).value;
                var w = document.getElementById("weight_list_"+i).value;
                $("#show_weight_"+i).html( h*w );
                $("#point_list"+i).val(h*w );
            }
        }

       
</script>

 