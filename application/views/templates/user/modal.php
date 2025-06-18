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
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Student</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table" id="example3">
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
                $students=$this->Billing_model->getAllStudentBySchool('college');
                foreach($students as $item){
                    echo "<tr>";
                        echo "<td>$item[student_id]</td>";
                        echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                        echo "<td>$item[description]</td>";
                        ?>
                        <td><a href="<?=base_url('user_add_student/'.$item['student_id']);?>" class='btn btn-success btn-sm' onclick="return confirm('Do you wish to add this student?');return false;">Add</a></td>
                        <?php
                    echo "</tr>";
                }
                $students=$this->Billing_model->getAllStudentBySchool('highschool');
                foreach($students as $item){
                    echo "<tr>";
                        echo "<td>$item[student_id]</td>";
                        echo "<td>$item[student_lastname], $item[student_firstname] $item[student_middlename]</td>";
                        echo "<td>$item[description]</td>";
                        ?>
                        <td><a href="<?=base_url('user_add_student/'.$item['student_id']);?>" class='btn btn-success btn-sm' onclick="return confirm('Do you wish to add this student?');return false;">Add</a></td>
                        <?php
                    echo "</tr>";
                }
              ?>
              </tbody>
              </table>
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