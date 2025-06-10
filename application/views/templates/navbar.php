<!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      <img src="<?=base_url('design/assets/production/images/img.jpg');?>" alt=""><?=$this->session->fullname;?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="#" data-toggle="modal" data-target="#UserPassword">
                          <span class="badge pull-right"><i class="fa fa-lock"></i></span>
                          <span>Change Password</span>
                        </a>
                      <a class="dropdown-item"  href="<?=base_url('deposit');?>">
                          <span class="badge pull-right"><i class="fa fa-credit-card"></i></span>
                          <span>Deposit</span>
                        </a>
                        <a class="dropdown-item"  href="<?=base_url('withdraw');?>">
                          <span class="badge pull-right"><i class="fa fa-database"></i></span>
                          <span>Withdraw</span>
                        </a>
                      <!-- <a class="dropdown-item"  href="javascript:;"> Profile</a> -->
                        <a class="dropdown-item"  href="<?=base_url('bet_history');?>">
                          <span class="badge pull-right"><i class="fa fa-history"></i></span>
                          <span>Bet History</span>
                        </a>
                    <!-- <a class="dropdown-item"  href="javascript:;">Help</a> -->
                      <a class="dropdown-item"  href="<?=base_url('logout');?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                  </li>
                  <?php                 
                    $acct=$this->Sabong_model->getCustomerAccount($this->session->customer_id);                 
                  ?>                                                   
                    <!-- <a href="" class="info-number" title="Refresh">
                      <i class="fa fa-refresh"></i>                      
                    </a> -->
                    <li>
                    <a href="javascript:;">
                      <i class="fa fa-rub"></i> <?=number_format($acct['amount'],2);?>
                    </a>                                       
                    <a href="<?=base_url('main');?>" class="info-number" title="Home">
                      <i class="fa fa-home"></i>                      
                    </a>                    
                  </li>
                    <!-- <li class="nav-item dropdown open" style="padding-left: 5px;">
                    <a href="<?=base_url('deposit');?>" class="info-number" title="Deposit">
                      <i class="fa fa-credit-card"></i>                      
                    </a>
                    </li>
                    <li role="presentation" class="nav-item dropdown open" style="padding-left: 5px;">
                    <a href="<?=base_url('withdraw');?>" class="info-number" title="Withdraw">
                      <i class="fa fa-database"></i>                      
                    </a>
                    </li>                     -->
                  
                </ul>
              </nav>
            </div>
          </div>