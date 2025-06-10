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
              <li class="breadcrumb-item"><a href="<?=base_url('adminmain');?>">Home</a></li>
              <li class="breadcrumb-item active">Student</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Student</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>                    
                    <th>Middle Name</th>                    
                    <th>School</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x=1;
                    foreach($students as $item){
                        $school=$this->Billing_model->getSingleSchool($item['school_id']);
                        echo "<tr>";
                            echo "<td>$x.</td>";
                            echo "<td>$item[student_id]</td>";
                            echo "<td>$item[student_lastname]</td>";
                            echo "<td>$item[student_firstname]</td>";
                            echo "<td>$item[student_middlename]</td>";
                            echo "<td>$school[school_name]</td>";
                            ?>
                            <td>

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
                    <th>ID</th>
                    <th>Last Name</th>
                    <th>First Name</th>                    
                    <th>Middle Name</th>                    
                    <th>School</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>