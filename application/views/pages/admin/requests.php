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
              <li class="breadcrumb-item active">Request</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
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
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">           
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Request</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Contact #</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    $x=1;
                    foreach($items as $item){
                        if($item['status'] <> "pending"){
                            $view="style='display:none;'";
                        }else{
                            $view="";
                        }
                        echo "<tr>";
                            echo "<td>$x.</td>";
                            echo "<td>$item[school_name]</td>";
                            echo "<td>$item[school_address]</td>";
                            echo "<td>$item[school_contact]</td>";
                            echo "<td>$item[school_email]</td>";
                            ?>
                            <td>
                                <a href="<?=base_url('manage_request/'.$item['school_id'].'/approved');?>" class="btn btn-success btn-sm" onclick="return confirm('Do you wish to approve this request?');return false;" <?=$view;?>><i class="fas fa-thumbs-up"></i> Approved</a>
                                <a href="<?=base_url('manage_request/'.$item['school_id'].'/cancel');?>" class="btn btn-danger btn-sm" onclick="return confirm('Do you wish to cancel this request?');return false;" <?=$view;?>><i class="fas fa-thumbs-down"></i> Cancel</a>
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
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Contact #</th>
                    <th>Email</th>
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