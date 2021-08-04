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
                      <li class="nav-item ">
                          <a class="nav-link " href="<?php echo site_url() . 'Main/Main/show_main/' ?>">
                              <i class="ni ni-tv-2 text-primary"></i>
                              <span class="nav-link-text">Home</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url() . 'Licence_form/Licence_input/index/' ?>">
                              <i class="ni ni-badge text-orange"></i>
                              <span class="nav-link-text">Request Form</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url() . 'Renewal/Renewal/show_renewal/' ?>">
                              <i class="ni ni-single-copy-04 text-primary"></i>
                              <span class="nav-link-text">Renew Form</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link"
                              href="<?php echo base_url() . 'check_schedule/Check_schedule/show_check_schedule/' ?>">
                              <i class="ni ni-calendar-grid-58 text-yellow"></i>
                              <span class="nav-link-text">Check Schedule</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url() . 'Check_out_form/Check_out_form/index/' ?>">
                              <i class="ni ni-user-run text-default"></i>
                              <span class="nav-link-text">Check out</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url() . 'Check_status/Check_status/index/' ?>">
                              <i class="ni ni-tag text-info"></i>
                              <span class="nav-link-text">Status Form</span>
                          </a>
                      </li>


                      <li class="nav-item">
                          <a class="nav-link"
                              href="<?php echo base_url() . 'history/History/show_history_employee/' ?>">
                              <i class="ni ni-time-alarm text-pink"></i>
                              <span class="nav-link-text">History Form</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link"
                              href="<?php echo base_url() . 'request/Request_form/show_request_form_list/' ?>">
                              <i class="ni ni-email-83 text-dark"></i>
                              <span class="nav-link-text">Pending Approve</span>
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
                                  <a class="nav-link "
                                      href="<?php echo site_url() . 'Main/Main/show_main/' ?>">
                                      <i class="ni ni-tv-2 text-primary"></i>
                                      <span class="nav-link-text">Home</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Licence_form/Licence_input/index/' ?>">
                                      <i class="ni ni-badge text-orange"></i>
                                      <span class="nav-link-text">Request Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo base_url() . 'Renewal/Renewal/show_renewal/' ?>">
                                      <i class="ni ni-single-copy-04 text-primary"></i>
                                      <span class="nav-link-text">Renew Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'check_schedule/Check_schedule/show_check_schedule/' ?>">
                                      <i class="ni ni-calendar-grid-58 text-yellow"></i>
                                      <span class="nav-link-text">Check Schedule</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Check_out_form/Check_out_form/index/' ?>">
                                      <i class="ni ni-user-run text-default"></i>
                                      <span class="nav-link-text">Check out</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Check_status/Check_status/index/' ?>">
                                      <i class="ni ni-tag text-info"></i>
                                      <span class="nav-link-text">Status Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'history/History/show_history_employee/' ?>">
                                      <i class="ni ni-time-alarm text-pink"></i>
                                      <span class="nav-link-text">History Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'request/Request_form/show_request_form_list/' ?>">
                                      <i class="ni ni-email-83 text-dark"></i>
                                      <span class="nav-link-text">Pending Approve</span>
                                  </a>
                              </li>

                          </ul>
                          

                          </ul>
                      </div>
                  </div>

                  <?php } else if ($id == 3) { ?>

                  <div class="navbar-inner">
                      <!-- Collapse -->
                      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                          <!-- Nav items -->
                          <ul class="navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link "
                                      href="<?php echo site_url() . 'Main/Main/show_main/' ?>">
                                      <i class="ni ni-tv-2 text-primary"></i>
                                      <span class="nav-link-text">Home</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Licence_form/Licence_input/index/' ?>">
                                      <i class="ni ni-badge text-orange"></i>
                                      <span class="nav-link-text">Request Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo base_url() . 'Renewal/Renewal/show_renewal/' ?>">
                                      <i class="ni ni-single-copy-04 text-primary"></i>
                                      <span class="nav-link-text">Renew Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'check_schedule/Check_schedule/show_check_schedule/' ?>">
                                      <i class="ni ni-calendar-grid-58 text-yellow"></i>
                                      <span class="nav-link-text">Check Schedule</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Check_out_form/Check_out_form/index/' ?>">
                                      <i class="ni ni-user-run text-default"></i>
                                      <span class="nav-link-text">Check out</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Check_status/Check_status/index/' ?>">
                                      <i class="ni ni-tag text-info"></i>
                                      <span class="nav-link-text">Status Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'history/History/show_history_employee/' ?>">
                                      <i class="ni ni-time-alarm text-pink"></i>
                                      <span class="nav-link-text">History Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'request/Request_form/show_request_form_list/' ?>">
                                      <i class="ni ni-email-83 text-dark"></i>
                                      <span class="nav-link-text">Pending Approve</span>
                                  </a>
                              </li>

                          </ul>
                          <!-- Divider -->
                          <hr class="my-3">
                          <!-- Heading -->
                          <h6 class="navbar-heading p-0 text-muted">
                              <span class="docs-normal">HR/5S Cennter</span>
                          </h6>
                          <!-- Navigation -->
                          <ul class="navbar-nav mb-md-3">
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'approve_form/Approve_form/show_approve_form_list/' ?>">
                                      <i class="ni ni-active-40 text-red"></i>
                                      <span class="nav-link-text">Approve Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Plant_management/Plant_list/index/' ?>">
                                      <i class="ni ni-single-02 text-green"></i>
                                      <span class="nav-link-text">Plant Management</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" 
                                  href="<?php echo base_url() . 'Report/Report/show_report/' ?>">
                                      <i class="ni ni-chart-bar-32 text-blue"></i>
                                      <span class="nav-link-text">Report</span>
                                  </a>
                              </li>

                          </ul>
                      </div>
                  </div>


                  <?php } else if ($id == 4) { ?>

                  <div class="navbar-inner">
                      <!-- Collapse -->
                      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                          <!-- Nav items -->
                          <ul class="navbar-nav">
                              <li class="nav-item">
                                  <a class="nav-link "
                                      href="<?php echo site_url() . 'Main/Main/show_main/' ?>">
                                      <i class="ni ni-tv-2 text-primary"></i>
                                      <span class="nav-link-text">Home</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Licence_form/Licence_input/index/' ?>">
                                      <i class="ni ni-badge text-orange"></i>
                                      <span class="nav-link-text">Request Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo base_url() . 'Renewal/Renewal/show_renewal/' ?>">
                                      <i class="ni ni-single-copy-04 text-primary"></i>
                                      <span class="nav-link-text">Renew Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'check_schedule/Check_schedule/show_check_schedule/' ?>">
                                      <i class="ni ni-calendar-grid-58 text-yellow"></i>
                                      <span class="nav-link-text">Check Schedule</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Check_out_form/Check_out_form/index/' ?>">
                                      <i class="ni ni-user-run text-default"></i>
                                      <span class="nav-link-text">Check out</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Check_status/Check_status/index/' ?>">
                                      <i class="ni ni-tag text-info"></i>
                                      <span class="nav-link-text">Status Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'history/History/show_history_employee/' ?>">
                                      <i class="ni ni-time-alarm text-pink"></i>
                                      <span class="nav-link-text">History Form</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'request/Request_form/show_request_form_list/' ?>">
                                      <i class="ni ni-email-83 text-dark"></i>
                                      <span class="nav-link-text">Pending Approve</span>
                                  </a>
                              </li>

                          </ul>
                          <!-- Divider -->
                          <hr class="my-3">
                          <!-- Heading -->
                          <h6 class="navbar-heading p-0 text-muted">
                              <span class="docs-normal">Approve Plant</span>
                          </h6>


                          <!-- Navigation -->
                          <ul class="navbar-nav mb-md-3">
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'approve_form/Approve_form/show_approve_form_plant/' ?>">
                                      <i class="ni ni-active-40 text-red"></i>
                                      <span class="nav-link-text">Approve Form</span>
                                  </a>
                              </li>


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