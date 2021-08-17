
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
    #gray {
 
 background-color: #E3E3E3;

}
</style>

<!-- Evaluation form -->
<h1>Evaluation</h1>
<div class="container"> 
    <div class="card" id="border-radius">  
        <div class="card-body">
        <img src=<?php echo base_url() ?>pic/Logo.Jfif width="150" height="150">
                <div class="row">
                
                <br>
                    <div class="col-sm-6"><h3><center>Assessor Name :</center></h3></div>
                    <div class="col-sm-3"><h3>Date :</h3></div>
                </div>      
            <div class="table-responsive">
                <table class="table table-bordered table-sm"  >
                    <thead>
                        <tr>
                            <th colspan="5" id="gray"><center><b>Stretch Assignment Evaluation Form (Promote to Manager [T4]) </b>
                            </center></th>
                        </tr>
                        </thead>
                        <tbody>
                        
                        <tr id="center_th">
                            <th width="40px " id="gray">Name - Surname</th>
                            <td colspan="2"  >  </td>
                            <th width="40px" id="gray" >Position</th>
                            <td>
                               
                                 </td>
                        </tr>
                        <tr id="center_th">
                            <th width="40px"id="gray">Promote to</th>
                            <td colspan="2"></td>
                            <th width="40px"id="gray">Department/Section</th>
                            <td></td>
                        </tr>
                        </tbody>
                </table>
                    <br>
                    <h2><b>Assessor</b></h2>
                    <!-- Table Score -->
                    <table class="table table-bordered table-sm"  >
                   
                        <tbody>
                            <tr id="center_th">
                                <td rowspan="2">ITems</td>
                                <td rowspan="2" colspan ="2">Points for observation</td>
                                <td colspan="4">Rating [Fill score 1-5]</td>
                            </tr>
                            <tr>
                                <td colspan ="2">1st round</td>
                                <td colspan ="2">Final round</td>
                            </tr>
                            <!--เริ่ม ตารางหัวข้อลงคะแนน-->
                            <?php $count_discription=0;  //จำนวนหัวข้อย่อยจริงๆเป็นของอันเก่าไม่ต้องทำแต่ขี้เกียจแก้
                            $count_itm=1; //จำนวนหัวข้อหลัก
                            for($i=0;$i<count($arr_dis);$i++){
                                if($i!=0){
                                    if($arr_dis[$i]->itm_id !=$arr_dis[$i-1]->itm_id){
                                        $count_itm++;
                                    }
                                }
                            }//นับหัวข้อหลัก

                            for($i=0;$i< $count_itm;$i++) {   //ลูปตามหัวข้อหลัก?>
                            
                            <?php $count_rowspan=0; 
                                for($loop_rowspan=0;$loop_rowspan<count($arr_dis);$loop_rowspan++){
                                    if($arr_dis[$loop_rowspan]->des_itm_id == $arr_dis[$i]->itm_id){
                                        $count_rowspan++;
                                    }
                                }//นับdiscriptionเพื่อกำหนด rowspan ?>
                                
                                
                                <?php $loop_dis=1;
                                    while($loop_dis<=$count_rowspan) {?>
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
                                <?php  $count_discription++; ?>
                                     </td>
                                <!-- แสดง point    -->
                                <td colspan ="2"><div class="form-group">
                                        <label for="sel"></label>
                                            <select class="form-control"  id="sel<?php echo $count_discription  ?>">
                                                <option value=1>1</option>
                                                <option value=2>2</option>
                                                <option value=3>3</option>
                                                <option value=4>4</option>
                                                <option value=5>5</option>
                                            </select>
                                    </div> </td>
                                <td colspan ="2"><div class="form-group">
                                        <label for="sel2"></label>
                                            <select class="form-control"  id="sel<?php echo $count_discription  ?>">
                                                <option value=1>1</option>
                                                <option value=2>2</option>
                                                <option value=3>3</option>
                                                <option value=4>4</option>
                                                <option value=5>5</option>
                                            </select>
                                    </div> </td>
                            <?php $loop_dis++;} ?>
                            </tr>
                            
                            <?php } ?>
                           
                  <!-- s-->
            

                            <!-- -->
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
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                            </tr>
                            <tr>
                                
                                 
                                <td>Judgement</td>
                                <td colspan ="4"></td>
                     
                            </tr>

                            <!-- -->
                    </table>
                    <br>
                    <form action="/action_page.php">
                        <!-- comment -->
                        <div class="form-group">
                            <label for="comment">Comment :</label>
                            <textarea class="form-control" rows="5" id="comment" name="text"></textarea>
                        </div>
                        <br>
                        <!-- Q/A -->
                        <div class="form-group">
                            <label for="QnA">Q/A :</label>
                            <textarea class="form-control" rows="5" id="QnA" name="text"></textarea>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </form>
            </div>
        </div>
    </div>
</div>
    