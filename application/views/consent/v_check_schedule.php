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
    #card_radius
    {
        border-radius: 20px;
    }
    #center_th td
    {
        text-align: center;
        font-weight: bold;
    }

</style>

<!-- Evaluation form -->
<h1>Evaluation</h1>
<div class="container"> 
    <div class="card" id="border-radius">  
        <div class="card-body">
                <div class="row">
                    <div class="col-sm-6"><h3>Assessor Name :</h3></div>
                    <div class="col-sm-3"><h3>Date :</h3></div>
                </div>      
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th colspan="5"><center><b>Performance Factor Evaluation <br> (Promote to Master, Master-Interpreting, Senior Specialist, Senior Specialist-Interpreting)</b>
                            </center></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr id="center_th">
                            <th width="40px">Name - Surname</th>
                            <td colspan="2"></td>
                            <th width="40px">Position</th>
                            <td></td>
                        </tr>
                        <tr id="center_th">
                            <th width="40px">Promote to</th>
                            <td colspan="2"></td>
                            <th width="40px">Department/Section</th>
                            <td></td>
                        </tr>
                        </tbody>
                </table>
                    <br>
                    <h2><b>Assessor</b></h2>
                    <!-- Table Score -->
                    <table class="table table-bordered table-sm" >
                        <tbody>
                            <tr id="center_th">
                                <td rowspan="2">ITems</td>
                                <td rowspan="2">Points for observation</td>
                                <td>% weight</td>
                                <td>Rating(B)</td>
                                <td>Score</td>
                            </tr>
                            <tr>
                                <td>(A)</td>
                                <td>[Fill score 1-5]</td>
                                <td>(AxB)</td>
                            </tr>
                            <tr>
                                <td>Awareness of the issue <br>
                                       ตระหนักในปัญหา</td>
                                <td>
                                    Is aware of the issues of the business in their area of responsibility; <br>
                                    understands the environment or issues of their department.<br>
                                    ตระหนักในปัญหาของงานที่รับผิดชอบ เข้าใจสิ่งแวดล้อมหรือสภาพปัญหา <br>
                                    ของแผนกตนเอง
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Analytical ability <br>
                                ความสามารถเชิงวิเคราะห์</td>
                                <td>
                                    Is aware of the issues of the business in their area of responsibility; <br>
                                    understands the environment or issues of their department.<br>
                                    ตระหนักในปัญหาของงานที่รับผิดชอบ เข้าใจสิ่งแวดล้อมหรือสภาพปัญหา <br>
                                    ของแผนกตนเอง
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
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
    
 