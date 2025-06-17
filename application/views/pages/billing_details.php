<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?=$details['school_name'];?></h1>
            Address: <?=$details['school_address'];?><br>
            Email/Contact # : <?=$details['school_email'];?> / <?=$details['school_contact'];?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=base_url('main');?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?=base_url('manage_billing');?>">Billing Manager</a></li>
              <li class="breadcrumb-item active">Top Navigation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">        
                    <?php
                    if($this->session->success){
                    ?>
                        <div class="alert alert-success"><?=$this->session->success;?></div>
                    <?php
                    }
                    ?>
                    <?php
                    if($this->session->failed){
                    ?>
                        <div class="alert alert-danger"><?=$this->session->failed;?></div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="card">
        <div class="card-header">
          <h3 class="card-title"><i class="fas fa-file-alt"></i> Student Account Billing</h3>

          <!-- <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div> -->
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">              
              <div class="row">
                <div class="col-12">
                  <h4>Billing History</h4>
                  <?php
                  $history=$this->Billing_model->getBillHistory($profile['school_id'],$profile['student_id'],$this->session->semester,$this->session->schoolyear,$profile['student_type']);
                foreach($history as $bill){
                  if($bill['status']=="pending"){
                    $badge="danger";
                  }else if($bill['status']=="paid"){
                    $badge="success";
                  }
                  ?>
                    <div class="post clearfix">
                      <div class="user-block">                        
                        <img src="<?=base_url('design/assets/dist/img/billinglogo.png');?>">
                        <span class="username">
                          <a href="#"><?=$bill['refno'];?></a>
                        </span>
                        <span class="description"><?=date('m/d/Y',strtotime($bill['datearray']));?> - <?=date('h:i A',strtotime($bill['timearray']));?></span>
                      </div>
                      <!-- /.user-block -->
                      <p>
                        Amount: <?=number_format($bill['amount'],2);?><br>
                        Payment Due Date: <?=date('m/d/Y',strtotime($bill['due_date']));?><br>
                        Status: <small class="badge badge-<?=$badge;?>"><?=$bill['status'];?></small>
                      </p>

                      <p>
                        <a href="<?=base_url('print_invoice/'.$bill['refno'].'/'.$profile['student_type']);?>" class="link-black text-sm" target="_blank"><i class="fas fa-receipt mr-1"></i> Print Invoice</a>
                      </p>
                    </div>
                    <?php
                    }
                    ?>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
              <h3 class="text-primary"><i class="fas fa-user"></i> <?=$profile['student_lastname'];?>, <?=$profile['student_firstname'];?> <?=$profile['student_middlename'];?></h3>
              <!-- <p class="text-muted">                
                <?php
                if($profile['student_gender']=="Male"){
                    $gender="male";
                }else{
                    $gender="female";
                }
                ?>
                <ul class="list-unstyled">
                    <li>
                        <a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-image"></i> ID: <?=$profile['student_id'];?></a>
                    </li>
                    <li>
                        <a href="#" class="btn-link text-secondary"><i class="fas fa-landmark"></i> Address: <?=$profile['student_address'];?></a>
                    </li>
                    <li>
                        <a href="#" class="btn-link text-secondary"><i class="fas fa-<?=$gender;?>"></i> Gender: <?=$profile['student_gender'];?></a>
                    </li>
                    <li>            
                        <a href="#" class="btn-link text-secondary"><i class="fas fa-calendar-alt"></i> Birthdate: <?=date('m/d/Y',strtotime($profile['student_birthdate']));?></a>
                    </li>
                </ul>
                </p> -->
                <ul class="list-unstyled">
                <li>
                  <a href="#" class="btn-link text-secondary"><i class="far fa-fw fa-image"></i> ID: <?=$profile['student_id'];?></a>
                </li>
                <li>
                  <a href="#" class="btn-link text-secondary"><i class="fas fa-landmark"></i> Address: <?=$profile['student_address'];?></a>
                </li>
                <li>
                  <a href="#" class="btn-link text-secondary"><i class="fas fa-<?=$gender;?>"></i> Gender: <?=$profile['student_gender'];?></a>
                </li>
                <li>
                  <a href="#" class="btn-link text-secondary"><i class="fas fa-calendar-alt"></i> Birthdate: <?=date('m/d/Y',strtotime($profile['student_birthdate']));?></a>
                </li>
                <li>
                  <a href="#" class="btn-link text-secondary"><i class="fas fa-graduation-cap"></i> Type: <?=$profile['student_type'];?></a>
                </li>                
              </ul>
              <br>
              <div class="text-muted">
                <p class="text-sm">Course/Grade
                  <b class="d-block"><?=$profile['description'];?></b>
                </p>
                <p class="text-sm">Semester/School Year
                  <b class="d-block">
                    <?php if($profile['semester']=="1"){ echo "First"; } if($profile['semester']=="2"){ echo "Second"; }?> / <?=$profile['syear'];?></b>
                </p>
                <p class="text-sm">Remaining Balance
                  <b class="d-block">
                    <?php
                    if($profile['rem_balance']==""){
                        echo "0.00";
                    }else{
                        echo number_format($profile['rem_balance'],2);
                    }
                    ?>                    
                </p>
              </div>

              <!-- <h5 class="mt-5 text-muted">Project files</h5>
              <ul class="list-unstyled">
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Functional-requirements.docx</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-pdf"></i> UAT.pdf</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-envelope"></i> Email-from-flatbal.mln</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                </li>
                <li>
                  <a href="" class="btn-link text-secondary"><i class="far fa-fw fa-file-word"></i> Contract-10_12_2014.docx</a>
                </li>
              </ul> -->
              <div class="mt-5 mb-3">
                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ManageBilling">Add Billing</a>
                <!-- <a href="#" class="btn btn-sm btn-warning">Report contact</a> -->
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->