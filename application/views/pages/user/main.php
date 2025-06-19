<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?=$title;?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <?php
        if($this->session->success){
        ?>
        <div class="alert bg-success"><?=$this->session->success;?></div>
        <?php
        }
        ?>
        <?php
        if($this->session->failed){
        ?>
        <div class="alert bg-danger"><?=$this->session->failed;?></div>
        <?php
        }
        ?>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?=base_url('design/assets/dist/img/user4-128x128.jpg');?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?=$this->session->fullname;?></h3>

                <p class="text-muted text-center">Guardian</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Students</b> <a class="float-right"><?=count($student_college)+count($student_high);?></a>
                  </li>                  
                </ul>

                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#AddStudent"><b>Add Students</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> ID</strong>

                <p class="text-muted">
                  <?=$this->session->guard_id;?>
                </p>

                <hr>

                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                <p class="text-muted"><?=$guard['g_email'];?></p>

                <hr>

                <strong><i class="fas fa-phone mr-1"></i> Contact No</strong>

                <p class="text-muted">
                  <?=$guard['g_contact'];?>
                </p>                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Payment History</a></li>                  
                  <li class="nav-item"><a class="nav-link" href="#students" data-toggle="tab">Students</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Account</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                     <?php
                     foreach($student_college as $item){
                      $billing=$this->Billing_model->getBillingHistory($item['school_id'],$item['student_id'],'college');
                      foreach($billing as $bill){
                        if($bill['status']=="pending"){
                          $status="";
                        }else{
                          $status="style='display:none;'";
                        }
                        $payment=$this->Billing_model->getStudentPayment($bill['refno'],$item['school_id'],$item['student_id']);
                        $amtpaid=0;
                        foreach($payment as $pay){
                          $amtpaid += $pay['amount'];
                        }

                        if($amtpaid > 0){
                          $paid="";
                        }else{
                          $paid="style='display:none;'";
                        }
                     ?>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?=base_url('design/assets/dist/img/billinglogo.png');?>" alt="user image">
                        <span class="username">
                          <a href="#"><?=$bill['refno'];?></a>
                          <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                        </span>
                        <span class="description"><?=date('m/d/Y',strtotime($bill['datearray']));?> - <?=date('h:i A',strtotime($bill['timearray']));?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Account Name: <?=$item['student_lastname'];?>, <?=$item['student_firstname'];?> <?=$item['student_middlename'];?><br>
                        Due Date: <?=date('m/d/Y',strtotime($bill['due_date']));?><br>
                        Amount Due: <?=number_format($bill['amount'],2);?><br>
                        Amount Paid: <?=number_format($amtpaid,2);?><br>
                        Status: <span class="bg-danger"><?=$bill['status'];?></span>
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2 postPayment" <?=$status;?> data-toggle="modal" data-target="#PostPayment" data-id="<?=$bill['refno'];?>_<?=$item['student_type'];?>"><i class="fas fa-share mr-1"></i> Post Payment</a>
                        <a href="<?=base_url('viewpaymentdetails/'.$bill['refno']."/".$bill['school_id']."/".$bill['student_id']);?>" class="link-black text-sm" target="_blank"><i class="fas fa-receipt mr-1"></i> View Payment Details</a>
                        <span class="float-right">
                          <a href="<?=base_url('print_invoice_user/'.$bill['refno'].'/'.$item['student_type']);?>" class="link-black text-sm" target="_blank">
                            <i class="far fa-eye"></i> View Invoice
                          </a>
                        </span>
                      </p>                     
                    </div>                  
                    <?php
                      }
                     }
                    ?>
                    <?php
                     foreach($student_high as $item){
                      $billing=$this->Billing_model->getBillingHistory($item['school_id'],$item['student_id'],'highschool');
                      foreach($billing as $bill){
                        if($bill['status']=="pending"){
                          $status="";
                        }else{
                          $status="style='display:none;'";
                        }
                        $payment=$this->Billing_model->getStudentPayment($bill['refno'],$item['school_id'],$item['student_id']);
                        $amtpaid=0;
                        foreach($payment as $pay){
                          $amtpaid += $pay['amount'];
                        }
                     ?>
                    <div class="post">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="<?=base_url('design/assets/dist/img/billinglogo.png');?>" alt="user image">
                        <span class="username">
                          <a href="#"><?=$bill['refno'];?></a>
                        </span>
                       <span class="description"><?=date('m/d/Y',strtotime($bill['datearray']));?> - <?=date('h:i A',strtotime($bill['timearray']));?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Account Name: <?=$item['student_lastname'];?>, <?=$item['student_firstname'];?> <?=$item['student_middlename'];?><br>
                        Due Date: <?=date('m/d/Y',strtotime($bill['due_date']));?><br>
                        Amount Due: <?=number_format($bill['amount'],2);?><br>
                        Amount Paid: <?=number_format($amtpaid,2);?><br>
                        Status: <span class="bg-danger"><?=$bill['status'];?></span>
                      </p>

                      <p>
                        <a href="#" class="link-black text-sm mr-2 postPayment" <?=$status;?> data-toggle="modal" data-target="#PostPayment" data-id="<?=$bill['refno'];?>_<?=$item['student_type'];?>"><i class="fas fa-share mr-1"></i> Post Payment</a>
                        <span class="float-right">
                          <a href="<?=base_url('print_invoice_user/'.$bill['refno'].'/'.$item['student_type']);?>" class="link-black text-sm" target="_blank">
                            <i class="far fa-eye"></i> View Invoice
                          </a>
                        </span>
                      </p>                      
                    </div>                  
                    <?php
                      }
                     }
                    ?>
                    <!-- /.post -->
                  </div>                 
                  <div class="tab-pane" id="students">
                    <b>Student List</b>
                    <table class="table" id="example11">
                        <thead>
                            <tr>
                                <th width="20%">ID</th>
                                <th width="40%">Name</th>
                                <th width="30%">Course</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($student_college as $item){
                                echo "<tr>";
                                    echo "<td>$item[student_id]</td>";
                                    echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                                    echo "<td>$item[description]</td>";
                                    ?>
                                    <td><a href="<?=base_url('user_delete_student/'.$item['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this record?');return false;">Delete</a></td>
                                    <?php
                                echo "</tr>";
                            }
                            foreach($student_high as $item){
                                echo "<tr>";
                                    echo "<td>$item[student_id]</td>";
                                    echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                                    echo "<td>$item[description]</td>";
                                    ?>
                                    <td><a href="<?=base_url('user_delete_student/'.$item['id']);?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to delete this record?');return false;">Delete</a></td>
                                    <?php
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>                    
                  </div>
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="<?=base_url('update_user_profile');?>" method="post">
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="fullname" class="form-control" id="inputName" placeholder="Name" value="<?=$guard['g_name'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?=$guard['g_email'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Contact No</label>
                        <div class="col-sm-10">
                          <input type="text" name="contactno" class="form-control" id="inputName2" placeholder="Contact No" value="<?=$guard['g_contact'];?>">
                        </div>
                      </div>                      
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" name="username" class="form-control" id="inputSkills" placeholder="Username" value="<?=$guard['g_username'];?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" class="form-control" id="inputSkills" placeholder="Password" value="<?=$guard['g_password'];?>">
                        </div>
                      </div>
                      <!-- <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div> -->
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>