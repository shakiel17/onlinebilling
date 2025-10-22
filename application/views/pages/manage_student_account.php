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
              <li class="breadcrumb-item">Account Manager</li>
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
    <?php
    if($this->session->schoolyear==""){
        $generate="style='display:none;'";
    }else{
        $generate="";
    }
    ?>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary shadow">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-graduation-cap"></i> Student Account (College)
                <?php
                if($this->session->semester <> ""){
                  if($this->session->semester=="1"){
                    echo "First Semester of ".$this->session->schoolyear;
                  }else{
                    echo "Second Semester of ".$this->session->schoolyear;
                  }
                }
                ?>
              </h5>
                <div style="float:right;" <?=$generate;?>>
                    <a href="<?=base_url('generate_list_college');?>" class="btn btn-success btn-sm" onclick="return confirm('Do you wish to generate list?');return false;"><i class="fas fa-plus"></i> Generate List</a>
                </div>
              </div>
              <div class="card-body">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('manage_student_account');?>">All</a></li>
                <?php
                $courses=$this->Billing_model->getAllCourse();
                foreach($courses as $cor){
                  ?>
                    <li class="breadcrumb-item"><a href="<?=base_url('search_account_course/'.$cor['id']);?>"><?=$cor['description'];?></a></li>
                  <?php
                }
                ?>                
                <!-- <li class="breadcrumb-item active">Top Navigation</li> -->
              </ol>
                <table class="table table-bordered" id="example11">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Unitcost (Lec)</th>
                            <th>Units (Lec)</th>
                            <th>Unitcost (Lab)</th>
                            <th>Units (Lab)</th>
                            <th>Sem/SYear</th>
                            <th>Total Due</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($college as $item){
                            if($item['unitcost_lec']==""){
                                $unitcost_lec=$item['amount_lec'];                                
                            }else{
                                $unitcost_lec=$item['unitcost_lec'];
                            }

                            if($item['unitcost_lab']==""){
                                $unitcost_lab=$item['amount_lab'];                                
                            }else{
                                $unitcost_lab=$item['unitcost_lab'];
                            }

                            if($item['units_lec']==""){
                                $units_lec=0;
                            }else{
                                $units_lec=$item['units_lec'];
                            }
                            if($item['units_lab']==""){
                                $units_lab=0;
                            }else{
                                $units_lab=$item['units_lab'];
                            }
                            if($this->session->schoolyear==$item['syear'] && $this->session->semester==$item['semester'] || $item['unitcost_lec']=="" || $item['unitcost_lab']==""){
                            $totaldue=($unitcost_lec*$units_lec)+($unitcost_lab*$units_lab);
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[student_id]</td>";
                                echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                                echo "<td>$item[description]</td>";
                                echo "<td align='right'>".number_format($unitcost_lec,2)."</td>";
                                echo "<td align='center'>$units_lec</td>";
                                echo "<td align='right'>".number_format($unitcost_lab,2)."</td>";
                                echo "<td align='center'>$units_lab</td>";
                                echo "<td align='center'>$item[semester] / $item[syear]</td>";
                                echo "<td align='right'>".number_format($totaldue,2)."</td>";
                                ?>
                                <td align="center">
                                    <a href="#" class="btn btn-info btn-sm editAccountCollege" data-toggle="modal" data-target="#ManageAccountCollege" data-id="<?=$item['student_id'];?>_<?=$item['student_course'];?>_<?=$unitcost_lec;?>_<?=$item['units_lec'];?>_<?=$item['semester'];?>_<?=$item['syear'];?>_<?=$unitcost_lab;?>_<?=$item['units_lab'];?>"><i class="fas fa-edit"></i> Edit</a>                                   
                                </td>
                                <?php
                            echo "</tr>";
                            $x++;
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Unitcost (Lec)</th>
                            <th>Units (Lec)</th>
                            <th>Unitcost (Lab)</th>
                            <th>Units (Lab)</th>
                            <th>Sem/SYear</th>
                            <th>Total Due</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
              </div>
            </div>           
          </div>
          
          <div class="col-lg-12">
            <div class="card card-success shadow">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-graduation-cap"></i> Student Account (High School)</h5>
                <div style="float:right;" <?=$generate;?>>
                    <a href="<?=base_url('generate_list_hs');?>" class="btn btn-primary btn-sm" onclick="return confirm('Do you wish to generate list?');return false;"><i class="fas fa-plus"></i> Generate List</a>
                </div>
              </div>
              <div class="card-body">
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('manage_student_account');?>">All</a></li>
                <?php
                $courses=$this->Billing_model->getAllGrade();
                foreach($courses as $cor){
                  ?>
                    <li class="breadcrumb-item"><a href="<?=base_url('search_account_grade/'.$cor['id']);?>"><?=$cor['description'];?></a></li>
                  <?php
                }
                ?>                
                <!-- <li class="breadcrumb-item active">Top Navigation</li> -->
              </ol>
                <table class="table table-bordered" id="example12">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Cost/Year</th>
                            <th>School Year</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($highschool as $item){
                            if($item['unitcost']==""){
                                $unitcost=$item['amount'];
                            }else{
                                $unitcost=$item['unitcost'];
                            }
                            if(($this->session->schoolyear==$item['syear'] || $item['syear']=="")){
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[student_id]</td>";
                                echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                                echo "<td>$item[description]</td>";
                                echo "<td align='right'>".number_format($unitcost,2)."</td>";
                                echo "<td align='center'>$item[syear]</td>";                                
                                ?>
                                <td align="center">
                                    <a href="#" class="btn btn-info btn-sm editAccountHigh" data-toggle="modal" data-target="#ManageAccountHigh" data-id="<?=$item['student_id'];?>_<?=$item['student_course'];?>_<?=$unitcost;?>_<?=$item['syear'];?>"><i class="fas fa-edit"></i> Edit</a>                                   
                                </td>
                                <?php
                            echo "</tr>";
                            $x++;
                            }
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Grade</th>
                            <th>Cost/Year</th>
                            <th>School Year</th>
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