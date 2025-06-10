<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?=base_url();?>" class="site_title"><img src="<?=base_url('design/assets/production/images/sabong.png');?>" width="50"> <span>Online Sabong</span></a>
            </div>
            <?php
            if($this->session->role=="admin"){
              $fight="";
              $reports="";
              $settings="";
            }else{
              $fight="style='display:none;'";
              $reports="style='display:none;'";
              $settings="style='display:none;'";
            }
            ?>
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url('design/assets/production/images/img.jpg');?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?=$this->session->fullname;?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="<?=base_url('adminmain');?>"><i class="fa fa-home"></i> Home</a>                    
                  </li>
                  <li <?=$fight;?>><a><i class="fa fa-gamepad"></i> Fights <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('fight_list');?>">Fight List</a></li>
                      <li><a href="<?=base_url('active_fight');?>">Active Fight</a></li>                      
                    </ul>
                  </li>
                  <li><a><i class="fa fa-money"></i> Cash Flow <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('manage_deposit');?>">Deposit Requests</a></li>
                      <li><a href="<?=base_url('manage_withdrawal');?>">Withdrawal Requests</a></li>                      
                    </ul>
                  </li>
                  <li <?=$reports;?>><a><i class="fa fa-file-text-o"></i> Reports <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('income');?>">Income</a></li>                      
                    </ul>
                  </li>
                  <li <?=$settings;?>><a><i class="fa fa-cogs"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?=base_url('user_account');?>">User Account</a></li>
                      <li><a href="<?=base_url('user_list');?>">User List</a></li>                      
                    </ul>
                  </li>                  
                </ul>
              </div>              
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
            <!-- /menu footer buttons -->
          </div>
        </div>