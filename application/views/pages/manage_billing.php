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
              <li class="breadcrumb-item">Billing Manager</li>
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
                <h5 class="card-title m-0"><i class="fas fa-building"></i> Student List (College)</h5>
                <!-- <div style="float:right;">
                    <a href="#" class="btn btn-primary btn-sm addStudentCollege" data-toggle="modal" data-target="#ManageStudentCollege"><i class="fas fa-plus"></i> Add New</a>
                </div> -->
              </div>
              <div class="card-body">
                <table class="table table-bordered" id="example11">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($college as $item){
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[student_id]</td>";
                                echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                                echo "<td>$item[description]</td>";
                                ?>
                                <td align="center">
                                    <a href="<?=base_url('billing_details/'.$this->session->id."/".$item['student_id']);?>" class="btn btn-info btn-sm editStudentCollege"><i class="fas fa-file-alt"></i> Billing Details</a>
                                </td>
                                <?php
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
              </div>
            </div>           
          </div>
          
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-building"></i> Student List (High School)</h5>
                <!-- <div style="float:right;">
                    <a href="#" class="btn btn-primary btn-sm addStudentHigh" data-toggle="modal" data-target="#ManageStudentHigh"><i class="fas fa-plus"></i> Add New</a>
                </div> -->
              </div>
              <div class="card-body">
                <table class="table table-bordered" id="example12">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($highschool as $item){
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[student_id]</td>";
                                echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                                echo "<td>$item[description]</td>";
                                ?>
                                <td align="center">
                                    <a href="#" class="btn btn-info btn-sm editStudentHigh" data-toggle="modal" data-target="#ManageStudentHigh" data-id="<?=$item['id'];?>"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" class="btn btn-warning btn-sm viewStudentDetails" data-toggle="modal" data-target="#ViewStudentDetails" data-id="<?=$item['id'];?>"><i class="fas fa-search"></i> View</a>
                                </td>
                                <?php
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Grade</th>
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