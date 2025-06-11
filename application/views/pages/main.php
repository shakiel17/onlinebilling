<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <?=$title;?></h1>
            Address: <?=$address;?><br>
            Email/Contact # : <?=$email;?> / <?=$contactno;?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <!-- <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Top Navigation</li> -->
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
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-user"></i> Student Manager</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Student Info</h6>

                <p class="card-text">You can manage the information of the students here.</p>
                <a href="<?=base_url('manage_student');?>" class="btn btn-primary"><i class="fas fa-cogs"></i> Manage</a>
              </div>
            </div>

            <div class="card card-outline">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-money-bill-alt"></i> Billing Manager</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Student Billing</h6>

                <p class="card-text">You can manage the biling of your student here.</p>
                <a href="" class="btn btn-primary"><i class="fas fa-cogs"></i> Manage</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-file-alt"></i> Account Manager</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Student Account</h6>

                <p class="card-text">You can manage the account of the students here.</p>
                <a href="#" class="btn btn-primary"><i class="fas fa-cogs"></i> Manage</a>
              </div>
            </div>

            <div class="card  card-outline">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-mail-bulk"></i> Email Notification Manager</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Send Invoice/Reminders</h6>

                <p class="card-text">You can send the digital invoice/ reminders here.</p>
                <a href="#" class="btn btn-primary"><i class="fas fa-cogs"></i> Manage</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->