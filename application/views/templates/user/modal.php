<div class="modal fade" id="logout">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Leaving so soon?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h2>Do you wish to logout?</h2>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <a href="<?=base_url('user_logout');?>" class="btn btn-danger">Yes, I will go!</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="AddStudent">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Student</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="form" action="" method="POST">
              <table width="100%" border="0">
                <tr>
                  <td width="90%">                                          
                    <input type="text" name="searchme" class="form-control" onKeyUp="showResult();" id="searchme" placeholder="Search student by ID or lastname">
                  </td>
                  <td width="10%">
                    <input type="button" name="submit" id="submit" value="Search" class="btn btn-primary submit" style="width:100px;">                                          
                  </td>
                </tr>
              </table>
              </form>
              <b>Search Result:</b>              
                <!-- <table class="table table-bordered" id="example12">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php
                    // $students=$this->Billing_model->getAllStudentBySchool('college');
                    // foreach($students as $item){
                    //     echo "<tr>";
                    //         echo "<td>$item[student_id]</td>";
                    //         echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                    //         echo "<td>$item[description]</td>";
                    //         ?>
                    //         <td><a href="<?=base_url('user_add_student/'.$item['student_id']);?>" class='btn btn-success btn-sm' onclick="return confirm('Do you wish to add this student?');return false;">Add</a></td>
                    //         <?php
                    //     echo "</tr>";
                    // }
                    // $students=$this->Billing_model->getAllStudentBySchool('highschool');
                    // foreach($students as $item){
                    //     echo "<tr>";
                    //         echo "<td>$item[student_id]</td>";
                    //         echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                    //         echo "<td>$item[description]</td>";
                    //         ?>
                    //         <td><a href="<?=base_url('user_add_student/'.$item['student_id']);?>" class='btn btn-success btn-sm' onclick="return confirm('Do you wish to add this student?');return false;">Add</a></td>
                    //         <?php
                    //     echo "</tr>";
                    // }
                  ?>
                </tbody>
              </table> -->
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <a href="<?=base_url('user_logout');?>" class="btn btn-danger">Yes, I will go!</a> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="PostPayment">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Post Payment</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('post_payment');?>" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="refno" id="pay_refno">
              <input type="hidden" name="type" id="pay_type">
              <input type="hidden" name="student_id" id="pay_student_id">
            <div class="modal-body">
              <div class="form-group">
                <label>Amount Due</label>
                <input type="text" name="amount_due" class="form-control" id="pay_amount" readonly>
              </div>
              <div class="form-group">
                <label>Amount to pay</label>
                <input type="text" name="amount" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Transaction #</label>
                <input type="text" name="txno" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Proof of Payment</label>
                <input type="file" name="file" class="form-control" required>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Post</a>
            </div>
              </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ViewPayment">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Payment Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <div class="modal-body">
              <p id="payment_details"></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>              
            </div>              
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>