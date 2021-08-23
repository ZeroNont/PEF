<h1>
    Score management group (การจัดการคะแนนกลุ่ม)
</h1>
<div class="card-header" id="card_radius">
    <div class="row">
        <div class="col">
            <h2>Detail Group</h2>
            <hr class="my-4" color="gray">
            <h3 class="mb-0">Group ID : <?php echo $group[0]->grp_id ?></h3>
            <h3 class="mb-0">Date : <?php echo date("d/m/Y", strtotime($group[0]->grp_date)) ?></h3>
            <h3 class="mb-0">Promote To : <?php echo 'T' . $group[0]->sec_level ?></h3>
            <h3 class="mb-0">Group Section : <?php echo $group[0]->sec_name ?></h3>
            <hr class="my-4" color="gray">
        </div>
        <!-- Light table -->
        <div class="table-responsive">
            <table class="table" id="Score">
                <thead class="thead-light">
                    <tr>
                        <th scope="col" class="sort" data-sort="name">#</th>
                        <th scope="col" class="sort" data-sort="name">Nominee ID</th>
                        <th scope="col" class="sort" data-sort="name">Nominee name</th>
                        <th scope="col" class="sort" data-sort="status">Status</th>
                        <th scope="col">Assessor</th>
                        <th scope="col" class="sort" data-sort="completion">Summary Score</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="list">
                    <?php for ($i = 0; $i < count($nominee); $i++) { ?>
                        <tr>
                            <th scope="row">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <span class="name mb-0 text-sm"><?php echo $i + 1 ?></span>
                                    </div>
                                </div>
                            </th>
                            <td class="budget">
                                <?php echo $nominee[$i]->Emp_ID ?>
                                <input type="text" id="<?php echo 'emp_id_' . $i ?>" value=" <?php echo $nominee[$i]->Emp_ID ?>" hidden onchange="get_evaluation(<?php echo $nominee[$i]->Emp_ID ?>)">
                            </td>
                            <td>
                                <span class="badge badge-dot mr-4">
                                    <!-- <i class="bg-warning"></i> -->
                                    <span class="status"><?php echo $nominee[$i]->Empname_eng . ' ' . $nominee[$i]->Empsurname_eng ?></span>
                                </span>
                            </td>
                            <td>
                                <?php
                                if ($count[$i] == count($assessor)) {
                                    if ($nominee[$i]->grn_status == 0) { ?>
                                        <span class="badge badge-dot mr-4">
                                            <i class="bg-success"></i>
                                            <span class="status"><?php echo 'Assessed' ?></span>
                                        </span>
                                    <?php }
                                } else { ?>
                                    <span class="badge badge-dot mr-4">
                                        <i class="bg-warning"></i>
                                        <span class="status"><?php echo 'Pending Assess' ?></span>
                                    </span>
                                <?php } ?>
                            </td>
                            <td>
                                <div class="avatar-group">

                                    <span id="<?php echo 'demo_' . $i ?>" class="User"><?php echo $count[$i] ?>/<?php echo count($assessor) ?></span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="completion mr-2">60%</span>
                                    <div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo '100' . '%' ?>;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php
                                if ($count[$i] == count($assessor)) {
                                    if ($nominee[$i]->grn_status == 0) { ?>
                                        <div class="dropdown">
                                            <a class="btn btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal">
                                                    <i class="fa fa-pencil"></i>
                                                </button>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="#">Pass</a>
                                                <a class="dropdown-item" href="#">Not Pass</a>
                                                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                            Launch demo modal
                                            </button> -->
                                                <a class="dropdown-item" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Review</a>
                                            </div>
                                        </div>
                                    <?php }
                                } else { ?>
                                    <div class="dropdown">
                                        <a class="btn btn-sm" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" disabled>
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                        </a>
                                    </div>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <center><a href="<?php echo site_url() . 'Report/Summary/index'; ?>" class="btn btn-secondary float-center"><i class="fas fa-arrow-alt-circle-left"></i> Back</a></center>
</div>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Manage Group review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title" id="exampleModalLabel">Date</h5>
                <input type="date" class="form-control" min="<?php echo date('Y-m-d') ?>">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#Score').DataTable();
        console.log(999);



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