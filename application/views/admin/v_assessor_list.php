<!--v_assessor_list
* Display assessor management
* @input -
* @output  -
* @author Niphat Kuhokciw
* @Create Date 2564-08-12 -->
<script>
function get_ase_id() {//get_ase_id
    Ase_id = document.getElementById('ase_id_modal').value;
    var empname = "";
    console.log(Ase_id)
    $.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>Assessor_management/Assessor_list/search_by_ase_id",
        data: {
            "Ase_id": Ase_id
        },
        dataType: "JSON",
        success: function(data, status) {
            console.log(data);
            if (data.length == 0) {
                document.getElementById("showname_modal").value = "ไม่มีข้อมูล";
            } else {
                empname = data[0].Empname_eng + " " + data[0].Empsurname_eng;
                document.getElementById("showname_modal").value = empname;
                console.log(999)
                console.log(empname)
            }
        }//end get_ase_id
    });
}
</script>
<!----------------------- Add assessor ------------------>
<div id="Add" class="modal fade" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">

                <h1 align='center' class="modal-title" id="exampleModalLabel">
                    Add Assessor
                </h1> 

                <button type=" button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="<?php echo site_url() . 'Assessor_management/Assessor_input/insert/'.$obj_assessor->sec_id.'/' ?>" method="post"
                    enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="focusedinput" class="form-label">Enter ID Assessor</label>
                        <input type="text" class="form-control" name="ase_id" id="ase_id_modal"
                            placeholder="ID Assessor" onkeyup="get_ase_id()" required>
                    </div>
                    <div class="mb-3">
                        <label for="focusedinput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="showname_modal" disabled name="Plant_name">
                    </div>
                    <button type="submit" class="btn btn-success float-right">Submit</button>
                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
                </form>
            </div>

        </div>
    </div>
</div>
<!------------------------------------------------------------------------------->
<h1>
    Assessor Management (การจัดการผู้ประเมิน)
</h1>
<div class="card-header" id="card_radius">
    <div>
        <br>
        <div>
        <h1>Promote To <?php echo $obj_assessor->sec_level?></h1>
        <!-------------------------------------  Select Year  --------------------------------------------------------------->
        <form action="<?php echo site_url() . 'Assessor_management/Assessor_list/show_year/'.$sec_id.'/' ?>" method="post"
                    enctype="multipart/form-data" name = "formyear">
        <label class="form-control-label" for="input-city" style="margin-left : 84%">Select Year</label>            
        <select name="year" id="year" class="form-select" aria-label="Default select example" onchange="formyear.submit()" >
                <?php for ($i = 0; $i < count($obj_year); $i++) {
                        if (date("Y", strtotime($obj_year[$i]->grp_date)) == $year_select) { ?>
                        <option selected value="<?php echo date("Y", strtotime($obj_year[$i]->grp_date)) ?>">
                        <?php echo date("Y", strtotime($obj_year[$i]->grp_date)); ?>
                        </option>
                        <?php } //if
                        else { ?>
                        <option value="<?php echo date("Y", strtotime($obj_year[$i]->grp_date)) ?>">
                        <?php echo date("Y", strtotime($obj_year[$i]->grp_date)); ?>
                        </option>
                        <?php } //else
                } //for ?>
        </select>
            </form>
        <!----------------------------------------------------------------------------------------------------------------------->
                    <br>
        <!--------------------------------- Button Add Assessor    --------------------------------------------->
            <button class="btn btn-primary" data-toggle="modal" data-target="#Add" style="margin-left : 84%">
                <i class="fa fa-plus-square-o" style="font-size:20px;"></i>&nbsp;Add Assessor
            </button>
        <!------------------------------------------------------------------------------------------------------->
        </div>
        <br>
        <div>
        <!------------------------------------- Show assessor ------------------------------------------------>
        <table class="table" id="example">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>ID Employee</th>
                    <th>Assessor Name</th>
                    <th>Position</th>
                    <th>Department</th>
                    <th>Action</th>
                </tr>
            </thead>
        <tbody>
        
                <?php
                $cheack = 0;
                for ($i = 0; $i < count($arr_assessor); $i++) { ?>   
                <tr>
                    <td><?php echo $i+1 ?></td>
                    <td><?php echo $arr_assessor[$i]->ase_emp_id ?></td>
                    <td><?php echo $arr_assessor[$i]->Empname_eng.' '.$arr_assessor[$i]->Empsurname_eng ?></td>
                    <td><?php echo $arr_assessor[$i]->Position_name?></td>
                    <td><?php echo $arr_assessor[$i]->Department?></td>
                    <td>
                        <?php if($arr_assessor[$i]->ase_date == date("Y")){
                            foreach($arr_cheack as $row){
                                if($arr_assessor[$i]->ase_emp_id == $row->gro_ase_id){
                                $cheack++;
                                }

                            }
                            if($cheack == 0){ ?>
                        <a href="<?php echo site_url().'Assessor_management/Assessor_list/delete_assessor/'.$arr_assessor[$i]->ase_id.'/'.$obj_assessor->sec_id.'/';?>">
                        <button class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil-square"></i>
                        </button>
                    </a>
                <?php }else{ ?>
                    <button class="btn btn-sm btn-danger">
                            <i class="fa fa-pencil-square"></i>
                        </button>
                <?php } 
                $cheack = 0 ;
                ?>
                <?php }else if($arr_assessor[$i]->ase_date < date("Y") || $arr_assessor[$i]->ase_date > date("Y")){ ?> 
                    <p>-</p>
                <?php } ?>
                    </td>
                </tr> 
                    <?php } ?>
            </tbody>
        </table>
        <!------------------------------------------------------------------------------------------------------------------------->
        <br>
        <!--------------------------------------------Button Blace----------------------------------------------------------->
        <center><a href="<?php echo site_url() . 'Assessor_management/Promote_list/index/'; ?>" class="btn btn-secondary float-center"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></center>
        <!------------------------------------------------------------------------------------------------------------------------->
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
        