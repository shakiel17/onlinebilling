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
              <li class="breadcrumb-item">School Information</li>
              <!-- <li class="breadcrumb-item active">Top Navigation</li> -->
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
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-building"></i> School Information Manager</h5>
              </div>
              <div class="card-body">
                    <div class="form-group"> 
                        <label for="exampleInputEmail1">School Logo</label><br>
                        <a href="#" data-toggle="modal" data-target="#ChangeLogo">
                        <?php
                        if($details['school_logo']==""){
                            ?>
                            <img src="<?=base_url('design/assets/dist/img/AdminLTElogo.png');?>" width="100">
                            <?php
                        }else{
                            ?>
                            <img src="data:image/jpg;charset=utf8;base64,<?=base64_encode($details['school_logo']);?>" width="100">
                            <?php
                        }
                        ?>    
                        </a>                    
                    </div>
                    <form action="<?=base_url('school_info_save');?>" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="sname" id="exampleInputEmail1" placeholder="School Name" value="<?=$details['school_name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Adress</label>
                        <textarea name="address" class="form-control" rows="3"><?=$details['school_address'];?></textarea>                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contact No.</label>
                        <input type="text" class="form-control" name="contactno" id="exampleInputEmail1" placeholder="School Contact #" value="<?=$details['school_contact'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="School Email" value="<?=$details['school_email'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" name="username" id="exampleInputEmail1" placeholder="Username" value="<?=$details['username'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" class="form-control" name="password" id="exampleInputEmail1" placeholder="Password" value="<?=$details['password'];?>">
                    </div>
                    <div class="form-group">                        
                        <input type="submit" class="btn btn-primary" name="btnsave" value="Update">
                    </div>
                    </form>                                                          
              </div>
            </div>           
          </div>          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->