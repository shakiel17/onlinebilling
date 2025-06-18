<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Online Billing System | Registration Page</title>
  <link rel="icon" type="image/x-icon" href="<?=base_url('design/assets/dist/img/billinglogo.png');?>">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('design/assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=base_url('design/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('design/assets/dist/css/adminlte.min.css');?>">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="<?=base_url('user');?>"><b>Online Billing System</b></a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="<?=base_url('user_registration');?>" method="post">
        <div class="input-group mb-3">
            <select name="school" class="form-control" required>
                <option value="">Select School</option>
                <?php
                $school=$this->Billing_model->getAllSchoolByStatus('approved');
                foreach($school as $item){
                    echo "<option value='$item[school_id]'>$item[school_name]</option>";
                }
                ?>
            </select>   
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-school"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="fullname" class="form-control" placeholder="Full name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="contactno" class="form-control" placeholder="Contact No">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        
      </div>

        <a href="<?=base_url('user');?>" class="text-center">Sign in now</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="<?=base_url('design/assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url('design/assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('design/assets/dist/js/adminlte.min.js');?>"></script>
</body>
</html>
