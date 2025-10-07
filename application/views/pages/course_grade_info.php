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
              <li class="breadcrumb-item">Course and Grade Information</li>
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
            <div class="card card-primary shadow">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-graduation-cap"></i> Course Information Manager (College)</h5>
                <div style="float:right;">
                    <a href="" class="btn btn-success btn-sm addCourse" data-toggle="modal" data-target="#ManageCourse"><i class="fas fa-plus"></i> Add New</a>
                </div>
              </div>
              <div class="card-body table-responsive">
                    <table class="table table-bordered" id="example2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Course</th>
                                <th>Price per Unit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $x=1;
                            foreach($courses AS $course){
                                echo "<tr>";
                                    echo "<td>$x.</td>";
                                    echo "<td>$course[description]</td>";
                                    echo "<td align='right'>".number_format($course['amount'],2)."</td>";
                                    ?>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm editCourse" data-toggle="modal" data-target="#ManageCourse" data-id="<?=$course['id'];?>_<?=$course['description'];?>_<?=$course['amount'];?>"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                    <?php
                                echo "</tr>";
                                $x++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Course</th>
                                <th>Price per Unit</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
              </div>
            </div>           
          </div>          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-success shadow">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-graduation-cap"></i> Grade Information Manager (High School)</h5>
                <div style="float:right;">
                    <a href="" class="btn btn-primary btn-sm addGrade" data-toggle="modal" data-target="#ManageGrade"><i class="fas fa-plus"></i> Add New</a>
                </div>
              </div>
              <div class="card-body table-responsive">
                    <table class="table table-bordered" id="example3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Grade Level</th>
                                <th>Price per Year</th>
                                <th>Action</th>
                            </tr>                            
                        </thead>
                        <tbody>
                            <?php
                            $x=1;
                            foreach($grades AS $course){
                                echo "<tr>";
                                    echo "<td>$x.</td>";
                                    echo "<td>$course[description]</td>";
                                    echo "<td align='right'>".number_format($course['amount'],2)."</td>";
                                    ?>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm editGrade" data-toggle="modal" data-target="#ManageGrade" data-id="<?=$course['id'];?>_<?=$course['description'];?>_<?=$course['amount'];?>"><i class="fas fa-edit"></i> Edit</a>
                                    </td>
                                    <?php
                                echo "</tr>";
                                $x++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Grade Level</th>
                                <th>Price per Year</th>
                                <th>Action</th>
                            </tr>                            
                        </tfoot>
                    </table>
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