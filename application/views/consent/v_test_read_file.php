<div class="card-header" id="card_radius">
    <?php
    for ($i = 0; $i < count($file_emp); $i++) {
        // if($file_emp[$i]->fil_emp_id ==)
        $path = "upload/" . $file_emp[$i]->fil_location;
        // echo $file_emp[$i]->fil_location;
        // echo $path;
        echo readfile($path);
    }
    ?>
    <!-- <input type="button" value="Open file"> -->

    <!-- <iframe src="<?php //echo $path 
                        ?>" type="application/pdf" style="width:100% height:100%"></iframe> -->

</div>