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
            <h3 class="mb-0">Promote To : <?php echo 'T'.$group[0]->sec_level ?></h3>
            <h3 class="mb-0">Group Section : <?php echo $group[0]->sec_name ?></h3>
            <hr class="my-4" color="gray">

            </a> -->
            <div class="media-body">
                <span class="name mb-0 text-sm"><?php echo $i + 1 ?></span>
            </div>
        </div>
        </th>
        <td class="budget">
            <?php echo $nominee[$i]->Emp_ID ?>
            <input type="text" id="<?php echo 'emp_id_' . $i ?>" value=" <?php echo $nominee[$i]->Emp_ID ?>" hidden
                onchange="get_evaluation(<?php echo $nominee[$i]->Emp_ID ?>)">
        </td>
        <td>
            <span class="badge badge-dot mr-4">
                <!-- <i class="bg-warning"></i> -->
                <span class="status"><?php echo $nominee[$i]->Empname_eng . ' ' . $nominee[$i]->Empsurname_eng ?></span>
            </span>
        </td>
        <td>
            <span class="badge badge-dot mr-4">
                <i class="bg-warning"></i>
                <span class="status"><?php echo $nominee[$i]->grn_status ?></span>
            </span>
        </td>
        <td>
            <div class="avatar-group">

                <span id="<?php echo 'demo_' . $i ?>"
                    class="User"><?php echo count($form) ?>/<?php echo count($assessor) ?></span>
            </div>
        </td>
        <td>
            <div class="d-flex align-items-center">
                <span class="completion mr-2">60%</span>
                <div>
                    <div class="progress">
                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0"
                            aria-valuemax="100" style="width: <?php echo '60%' ?>;"></div>
                    </div>
                </div>
            </div>
        </td>
        <td class="text-right">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <button type="button" class="btn btn-warning btn-lg" data-toggle="modal">
                        <i class="fa fa-cog fa-fw"></i></button>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <a class="dropdown-item" href="#">Pass</a>
                    <a class="dropdown-item" href="#">Not Pass</a>
                    <a class="dropdown-item" href="#">Review</a>
                </div>
            </div>
        </td>
        </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
    <!-- Card footer -->

</div>
</div>
</div>
<script>
function get_evaluation(num) {
    console.log(num);
    console.log(123);
};
</script>
<script>
$(document).ready(function() {
    $('#Score').DataTable();
    console.log(999);

    var i = [0, 1];
    var T = [];

    for (j = 0; j < 2; j++) {
        var T = document.getElementById('emp_id_' + i[j]).value;
        console.log(j);
        //   var num = T.length;
        document.getElementById('demo_' + j).innerHTML = 'Hello JavaScript!'

        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Report/Summary/get_evaluation",
            data: {
                "emp": T,
            },
            success: function(data, status) {
                for (var k = 0; k < 2; k++) {
                    console.log(data);
                    console.log(T);
                }
            }
        })
    }


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