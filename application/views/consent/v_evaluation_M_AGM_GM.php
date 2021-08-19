<!--
    v_evaluation_M_AGM_GM
    display for Evaluation Form Promote to T4, T3, T2
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
                    <table class="table table-bordered table-sm"  >
                        <tbody>
                            <tr id="center_th">
                                <td rowspan="2">ITems</td>
                                <td rowspan="2" colspan ="2">Points for observation</td>
                                <td colspan="4">Rating [Fill score 1-5]</td>
                            </tr>
                            <tr>
                                <td colspan ="2" align='center'>1st round</td>
                                <td colspan ="2" align='center'>Final round</td>
                            </tr>
                            <!--เริ่ม ตารางหัวข้อลงคะแนน-->
                            <?php $count_discription=0;  //จำนวนหัวข้อย่อยจริงๆเป็นของอันเก่าไม่ต้องทำแต่ขี้เกียจแก้
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
                            $weight =  $weight*5;
                            for($i=0;$i< $count_itm;$i++) {   //ลูปตามหัวข้อหลัก?>
                            
                            <?php $count_rowspan=0; 
                                for($loop_rowspan=0;$loop_rowspan<count($arr_dis);$loop_rowspan++){
                                    if($arr_dis[$loop_rowspan]->des_itm_id == $arr_dis[$i]->itm_id){
                                        $count_rowspan++;
                                    }
                                }//นับdiscriptionเพื่อกำหนด rowspan ?>
                                
                                
                                <?php 
                                    for($loop_dis=1;$loop_dis<=$count_rowspan;$loop_dis++) {?>
                                    <tr>
                                    <?php  if($loop_dis===1) {?> 
                                <td rowspan="<?php echo $count_rowspan; ?>" align="center"> <b>
                                    <?php  echo $arr_dis[$count_discription]->itm_detail_eng ;?>
                                    <br><?php  echo $arr_dis[$count_discription]->itm_detail_th; ?></b> 
                                </td> 
                                <?php }//แสดงห้อข้อหลัก?> 

                                <td colspan ="2"> 
                                    <b> <?php  echo $arr_dis[$count_discription]->des_description_th ;?></b>	
                                    <br>
                                        <!-- แสดง Disription    -->
                                        <?php $pos = strrpos($arr_dis[$count_discription]->des_description_eng, ".");//ตัดประโยคโดยหา"."
                                            echo substr($arr_dis[$count_discription]->des_description_eng, 0 ,$pos+1); ?>
                                            <br>
                                        <?php echo substr($arr_dis[$count_discription]->des_description_eng, $pos+1 ,strlen($arr_dis[$count_discription]->des_description_eng))?>
                                </td>
                                <!-- แสดง point    -->
                                    <?php if($ev_gno[0]->grn_status == 0){ ?>
                                        <td colspan ="2"><div class="form-group">
                                                <label for="sel"></label>
                                                    <select class="form-control" name="form[]" id="form" >
                                                        <option value=1>1</option>
                                                        <option value=2>2</option>
                                                        <option value=3>3</option>
                                                        <option value=4>4</option>
                                                        <option value=5>5</option>
                                                    </select>
                                            </div> 
                                        </td>
                                        <td colspan ="2"><div class="form-group">
                                                <label for="sel2"></label>
                                                    <select class="form-control" hidden >
                                                        <option value=1>1</option>
                                                        <option value=2>2</option>
                                                        <option value=3>3</option>
                                                        <option value=4>4</option>
                                                        <option value=5>5</option>
                                                    </select>
                                            </div> 
                                        </td>
                                    <?php }else if($ev_gno[0]->grn_status == 1) { ?>
                                        <td colspan ="2"><div class="form-group">
                                                <label for="sel"></label>
                                                    <select class="form-control" hidden>
                                                        <option value=1>1</option>
                                                        <option value=2>2</option>
                                                        <option value=3>3</option>
                                                        <option value=4>4</option>
                                                        <option value=5>5</option>
                                                    </select>
                                            </div> 
                                        </td>
                                        <td colspan ="2"><div class="form-group">
                                                <label for="sel2"></label>
                                                    <select class="form-control" name="form[]" id="form">
                                                        <option value=1>1</option>
                                                        <option value=2>2</option>
                                                        <option value=3>3</option>
                                                        <option value=4>4</option>
                                                        <option value=5>5</option>
                                                    </select>
                                            </div> 
                                        </td>
                                    <?php } ?>
                            <?php } ?>
                            </tr>
                            <?php  $count_discription++; ?>

                                <input type="hidden" value="<?php echo 	$arr_dis[$i]->for_id ?>" name="for_id[]">
                            <?php } ?>
                            <input type="text" name="weight"  ID="weight" value=<?php echo $weight ; ?> hidden>
                           
                            <tr>
                                <td rowspan="2"><center><b>Rating 
 
                                             <br> Criteria</b>
                                              </td></center>
                                <td rowspan="2">
                                5 ： Exceed expected level for Manager level
                                <br>4 ： Absolutely satisfies expected level for Manager level
                                <br> 3 ： Meet expected level for Manager level
                                <br>2 ： Partially lower that expected level for Manager level
                                <br>1 ： Do Not satisfy expected level for Manager level
                                </td>
                                <td>Total</td>
                                <td><input type="text" name="total" size='1' disabled  style='border: none'> </td>
                                <td><input type="text" name="total_weight" size='1' disabled     style='border: none';></td>
                                <td><input type="text" name="total" size='1' disabled hidden></td>
                                <td><input type="text" name="total" size='1' disabled hidden></td>
                                
                            </tr>
                            <tr>
                                
                                 
                                <td>Judgement</td>
                                <td colspan ="4"></td>
                     
                            </tr>
                           
                            <!-- -->
                    </table>
                    <br>
                    <!-- comment -->
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
    $("#btn_success").click(function() {
        $("#Modal_confirm").hide()
    });
    
    $("select").change(function(){
        var toplem=0;
        $("select[name=form]").each(function(){
            toplem = toplem + parseInt($(this).val());
        })
        $("input[name=total]").val(toplem);
        });
        
    $("select").change(function(){
        var toplem=0;
        var weight = $("#weight").val();
        $("select[name=form]").each(function(){
            toplem = toplem + parseInt($(this).val());
        }) 
            toplem = Math.round(toplem / weight*100);
            var a = '%'
        $("input[name=total_weight]").val(toplem + a);
        });
});
</script>
