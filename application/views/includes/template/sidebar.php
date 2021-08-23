  <!-- Sidenav -->

  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="hid">
      <div class="scrollbar-inner">
          <!-- Brand -->
          <div class="sidenav-header  align-items-center">
              <a class="navbar-brand" href="javascript:void(0)">
                  <img src="../../../argon/assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
                  <!-- <img src="../template/denso.jpg" class="navbar-brand-img" alt="..."> -->
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
                          <a class="nav-link" href="<?php echo base_url() . 'Evaluation/Evaluation/show_evaluation' ?>">
                              <i class="fas fa-file-signature text-green"></i>
                              <span class="nav-link-text">Evaluation</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="<?php echo base_url() . 'Result/Result/show_result_list/' ?>">
                              <i class="fas fa-clipboard-list text-primary"></i>
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
                                      href="<?php echo base_url() . 'Group_management/Group_list/index/' ?>">
                                      <i class="ni ni-calendar-grid-58 text-orange"></i>
                                      <span class="nav-link-text">Group Management</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo base_url() . 'Report/Report/show_report/' ?>">
                                      <i class="ni ni-chart-bar-32 text-blue"></i>
                                      <span class="nav-link-text">Report</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="<?php echo base_url() . 'Report/Summary/index/' ?>">
                                      <i class="ni ni-single-02 text-green"></i>
                                      <span class="nav-link-text">Score Summary</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'Assessor_management/Promote_list/index/' ?>">
                                      <i class="fas fa-address-book text-gray"></i>
                                      <span class="nav-link-text">Assessor Management</span>
                                  </a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link"
                                      href="<?php echo base_url() . 'File_present_management/File_present_management/show_list_nominee/' ?>">
                                      <i class="fas fa-file-upload text-default"></i>
                                      <span class="nav-link-text">File Management</span>
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
  </nav>

  <!-- Main content -->