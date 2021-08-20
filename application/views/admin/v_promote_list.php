<!--v_promote_list
* Display assessor management
* @input -
* @output  -
* @author Niphat Kuhokciw
* @Create Date 2564-08-12 -->
<h1>
    Assessor Management (การจัดการผู้ประเมิน)
</h1>
<div class="card-header" id="card_radius">
    <div class="table-responsive">
        <!-- Table -->
        <table class="table" id="example">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Promote</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- show promote -->
                <?php for ($i = 0; $i < count($obj_promote); $i++) { ?> 
                <tr>
                    <td>
                    <?php echo $i + 1 ?>
                    </td>
                    <td>
                    Promote to <?php echo 'T'.$obj_promote[$i]->sec_level?>
                    </td>
                    <td>
                    <a href=" <?php echo site_url().'Assessor_management/Assessor_list/show_assessor/'.$obj_promote[$i]->sec_id?>">
                        <button class="btn btn-sm btn-warning" data-toggle="modal"
                            data-target="#exampleModal<?php echo $i; ?>"><i class="fa fa-pencil-square-o"></i></button>
                </a>
                </td>
                <?php  } ?> 
                <!---------------->
            </tbody> 
        </table>
        <!-------------------------------------------->
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