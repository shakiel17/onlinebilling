<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Sabong</title>
    <link rel="icon" type="image/x-icon" href="<?=base_url('design/assets/production/images/sabong.png');?>">

    <!-- Bootstrap -->
    <link href="<?=base_url('design/assets/vendors/bootstrap/dist/css/bootstrap.min.css');?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('design/assets/vendors/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?=base_url('design/assets/vendors/nprogress/nprogress.css');?>" rel="stylesheet">
    
    <!-- Custom Theme Style -->
    <link href="<?=base_url('design/assets/build/css/custom.min.css');?>" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <!-- page content -->
        <div class="col-md-12">
          <div class="col-middle">
            <div class="text-center">
              <h1 class="error-number">Online Sabong</h1>
              <h2>Administrator Portal</h2>
              <p>Please enter your username and password to start your session!
              </p>              
              <div class="mid_center">          
                <?php
                if($this->session->error){
                ?>
                <div class="alert alert-danger"><?=$this->session->error;?></div>
                <?php
                }
                ?>
                <form action="<?=base_url('admin_authenticate');?>" method="POST">
                  <div class="  form-group pull-right top_search">
                    <div class="input-group">
                      <input type="text" class="form-control" name="username" placeholder="Username" autocomplete="off">
                      <span class="input-group-btn">
                              <button class="btn btn-secondary" type="button"><i class="fa fa-user"></i></button>
                          </span>
                    </div>
                  </div>
                  <div class="form-group pull-right top_search">
                    <div class="input-group">
                      <input type="password" name="password" class="form-control" placeholder="Password">
                      <span class="input-group-btn">
                              <button class="btn btn-secondary" type="button"><i class="fa fa-key"></i></button>
                          </span>
                    </div>
                  </div>
                  <div class="form-group pull-right top_search">
                    <div class="input-group">
                      <button type="submit" class="btn btn-secondary">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="<?=base_url('design/assets/vendors/jquery/dist/jquery.min.js');?>"></script>
    <!-- Bootstrap -->
   <script src="<?=base_url('design/assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js');?>"></script>
    <!-- FastClick -->
    <script src="<?=base_url('design/assets/vendors/fastclick/lib/fastclick.js');?>"></script>
    <!-- NProgress -->
    <script src="<?=base_url('design/assets/vendors/nprogress/nprogress.js');?>"></script>

    <!-- Custom Theme Scripts -->
    <script src="<?=base_url('design/assets/build/js/custom.min.js');?>"></script>
  </body>
</html>