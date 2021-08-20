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
                    
                </div>         
                <br>
                
            <div class="table-responsive">
                    <table class="table table-bordered table-sm"  >
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
                    <table class="table table-bordered table-sm">
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
                            $total=0;
                            $total_per=0;
                            for($i=0;$i<count($arr_dis_m);$i++){
                                if($i!=0){
                                    if($arr_dis_m[$i]->itm_id !=$arr_dis_m[$i-1]->itm_id){
                                        $count_itm++;
                                    }
                                   
                                }
                                $weight =  $weight+$arr_dis_m[$i]->for_des_weight;
                            }//นับหัวข้อหลัก
                            $weight =  $weight*5;
                            for($i=0;$i< $count_itm;$i++) {   //ลูปตามหัวข้อหลัก?>
                            
                            <?php $count_rowspan=0; 
                                for($loop_rowspan=0;$loop_rowspan<count($arr_dis_m);$loop_rowspan++){
                                    if($arr_dis_m[$loop_rowspan]->des_itm_id == $arr_dis_m[$i]->itm_id){
                                        $count_rowspan++;
                                    }
                                }//นับdiscriptionเพื่อกำหนด rowspan ?>
                                
                                
                                <?php 
                                    for($loop_dis=1;$loop_dis<=$count_rowspan;$loop_dis++) {?>
                                    <tr>
                                    <?php  if($loop_dis===1) {?> 
                                <td rowspan="<?php echo $count_rowspan; ?>" align="center"> <b>
                                    <?php  echo $arr_dis_m[$count_discription]->itm_detail_eng ;?>
                                    <br><?php  echo $arr_dis_m[$count_discription]->itm_detail_th; ?></b> 
                                </td> 
                                <?php }//แสดงห้อข้อหลัก?> 

                                <td colspan ="2"> 
                                    <b> <?php  echo $arr_dis_m[$count_discription]->des_description_th ;?></b>	
                                    <br>
                                        <!-- แสดง Disription    -->
                                        <?php $pos = strrpos($arr_dis_m[$count_discription]->des_description_eng, ".");//ตัดประโยคโดยหา"."
                                            echo substr($arr_dis_m[$count_discription]->des_description_eng, 0 ,$pos+1); ?>
                                            <br>
                                        <?php echo substr($arr_dis_m[$count_discription]->des_description_eng, $pos+1 ,strlen($arr_dis_m[$count_discription]->des_description_eng))?>
                                </td>
                                <!-- แสดง point    -->
                                    
                                        <td colspan ="2"><div class="form-group" align="center">
                                                <?php echo $arr_sco[$count_discription]->ptf_point; 
                                                $total=$total+$arr_sco[$count_discription]->ptf_point;
                                                $total_per = ($total/$weight)*100;
                                                ?>
                                            </div> 
                                        </td>
                                        <td colspan ="2"><div class="form-group">
                                                
                                            </div> 
                                        </td>
                                    
                                    <?php  $count_discription++; ?>
                            <?php } ?>
                            </tr>
                            
                            <?php } ?>
                            
                           
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
                                <td align='center'><?php echo $total; ?></td>
                                <td align='center'><?php echo number_format($total_per, 2, '.', '');  ?> %</td>
                                <td><input type="text" name="total" size='1' disabled hidden></td>
                                <td><input type="text" name="total" size='1' disabled hidden></td>
                                
                            </tr>
                            <tr>
                                
                                 
                                <td>Judgement</td>
                                <td colspan ="4" align='center'>
                                    <?php if($total_per >= 60){
                                            echo "PASS";
                                    }//if ดูผล Judgement
                                    else{
                                        echo "NOT PASS";
                                    }    
                                    ?>
                                </td>
        
                            </tr>
                           
                            <!-- -->
                    </table>
                    <br>
                    <!-- comment -->
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
                    
                <!-- Back button -->
                <a href="<?php echo base_url() . 'Result/Result/show_result_list/'; ?>">
                        <button type="submit" class="btn btn-secondary" data-toggle="modal">Back</button>
                </a>
            </div>
        </div>
    </div>
</div>



