  <!-- Sidenav -->

  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="hid">
      <div class="scrollbar-inner">
          <!-- Brand -->
          <div class="sidenav-header  align-items-center">
              <a class="navbar-brand" href="javascript:void(0)">
                  <img src="../../../argon/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
              </a>
          </div>
          <div class="navbar-inner">
              <!-- Collapse -->
              <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                  <!-- Nav items -->
                  <?php $id = $_SESSION['Usrole'];
                    if ($id == 1) { ?>
                  <ul class="navbar-nav">
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url() . 'Licence_form/Licence_input/index/' ?>">
                              <i class="ni ni-badge text-orange"></i> //เปลี่ยนไอคอนด้วย
                              <span class="nav-link-text">Evaluation</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url() . 'Renewal/Renewal/show_renewal/' ?>">
                              <i class="ni ni-single-copy-04 text-primary"></i> //เปลี่ยนไอคอนด้วย
                              <span class="nav-link-text">Result<span> 
                          </a>
                      </li>
                  </ul>
                  <?php } else if ($id == 2) { ?>

                  <div class="navbar-inner">
                      <!-- Collapse -->
                      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                          <!-- Nav items -->
                          <ul class="navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Licence_form/Licence_input/index/' ?>">
                                      <i class="ni ni-badge text-orange"></i> //เปลี่ยนไอคอนด้วย
                                      <span class="nav-link-text">Section Management</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo base_url() . 'Renewal/Renewal/show_renewal/' ?>">
                                      <i class="ni ni-single-copy-04 text-primary"></i> //เปลี่ยนไอคอนด้วย
                                      <span class="nav-link-text">Report</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'check_schedule/Check_schedule/show_check_schedule/' ?>">
                                      <i class="ni ni-calendar-grid-58 text-yellow"></i> //เปลี่ยนไอคอนด้วย
                                      <span class="nav-link-text">Reviewer</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Check_out_form/Check_out_form/index/' ?>">
                                      <i class="ni ni-user-run text-default"></i> //เปลี่ยนไอคอนด้วย
                                      <span class="nav-link-text">Assessor Management </span>
                                  </a>
                              </li>
                          </ul>
                          

                          </ul>
                      </div>
                  </div>

                  <?php } ?>
                  <!-- Divider -->

              </div>

          </div>
      </div>
  </nav>

  <!-- Main content -->