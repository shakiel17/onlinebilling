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
              <li class="breadcrumb-item">Student Manager</li>
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
            <div class="card">
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
                    <a href="<?=base_url('generate_list_college');?>" class="btn btn-primary btn-sm" onclick="return confirm('Do you wish to generate list?');return false;"><i class="fas fa-plus"></i> Generate List</a>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered" id="example11">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Unitcost</th>
                            <th>Units</th>
                            <th>Sem/SYear</th>
                            <th>Total Due</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $x=1;
                        foreach($college as $item){
                            if($item['unitcost']==""){
                                $unitcost=$item['amount'];
                            }else{
                                $unitcost=$item['unitcost'];
                            }

                            if($item['units']==""){
                                $units=0;
                            }else{
                                $units=$item['units'];
                            }
                            if($this->session->schoolyear==$item['syear'] && $this->session->semester==$item['semester'] || $item['unitcost']==""){
                            $totaldue=$unitcost*$units;
                            echo "<tr>";
                                echo "<td>$x.</td>";
                                echo "<td>$item[student_id]</td>";
                                echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                                echo "<td>$item[description]</td>";
                                echo "<td align='right'>".number_format($unitcost,2)."</td>";
                                echo "<td align='center'>$units</td>";
                                echo "<td align='center'>$item[semester] / $item[syear]</td>";
                                echo "<td align='right'>".number_format($totaldue,2)."</td>";
                                ?>
                                <td align="center">
                                    <a href="#" class="btn btn-info btn-sm editAccountCollege" data-toggle="modal" data-target="#ManageAccountCollege" data-id="<?=$item['student_id'];?>_<?=$item['student_course'];?>_<?=$unitcost;?>_<?=$item['units'];?>_<?=$item['semester'];?>_<?=$item['syear'];?>"><i class="fas fa-edit"></i> Edit</a>                                   
                                </td>
                                <?php
                            echo "</tr>";
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
                            <th>Unitcost</th>
                            <th>Units</th>
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
            <div class="card">
              <div class="card-header">
                <h5 class="card-title m-0"><i class="fas fa-graduation-cap"></i> Student Account (High School)</h5>
                <div style="float:right;" <?=$generate;?>>
                    <a href="<?=base_url('generate_list_hs');?>" class="btn btn-primary btn-sm" onclick="return confirm('Do you wish to generate list?');return false;"><i class="fas fa-plus"></i> Generate List</a>
                </div>
              </div>
              <div class="card-body">
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