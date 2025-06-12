<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?=base_url('main');?>" class="navbar-brand">
        <img src="<?=base_url('design/assets/dist/img/billinglogo.png');?>" width="50" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Online Billing System</b></span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <?php
    if($this->session->staff_id==""){
      $view="";
    }else{
      $view="style='display:none;'";
    }    
    ?>
      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="<?=base_url('main');?>" class="nav-link">Home</a>
          </li>          
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Settings</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?=base_url('school_info');?>" class="dropdown-item">School Info </a></li>
              <li><a href="<?=base_url('course_grade_info');?>" class="dropdown-item">Course/Grade Info</a></li>
              <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#ExamFrequency">Exam Frequency</a></li>
              <li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#SchoolYear">Set School Year</a></li>

              <li class="dropdown-divider" <?=$view;?>></li>

              <!-- Level two dropdown-->
              <li class="dropdown-submenu dropdown-hover" <?=$view;?>>
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Staff Manager</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item addstaff" data-toggle="modal" data-target="#ManageStaff">Add Staff</a>
                  </li>
                  <?php
                  $staff=$this->Billing_model->getAllStaff();
                  foreach($staff as $item){
                  ?>
                  <!-- Level three dropdown-->
                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle"><?=$item['staff_name'];?></a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item editStaff" data-toggle="modal" data-target="#ManageStaff" data-id="<?=$item['staff_id'];?>_<?=$item['staff_name'];?>_<?=$item['status'];?>">Edit Info</a></li>
                      <li><a href="#" class="dropdown-item manageAccount" data-toggle="modal" data-target="#ManageStaffAccount" data-id="<?=$item['staff_id'];?>_<?=$item['username'];?>_<?=$item['password'];?>">User Account</a></li>
                    </ul>
                  </li>
                  <!-- End Level three -->
                  <?php
                  }
                  ?>
                  <!-- <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li> -->
                </ul>
              </li>
              <!-- End Level two -->
            </ul>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <!-- <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form> -->
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">       
        <li class="nav-item">
          <a class="btn btn-danger" data-toggle="modal" data-target="#logout" href="#" role="button" title="Logout">
            <i class="fas fa-home"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->