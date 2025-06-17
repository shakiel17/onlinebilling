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
              <a href="<?=base_url('logout');?>" class="btn btn-danger">Yes, I will go!</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

      <div class="modal fade" id="ChangeLogo">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Logo Manager</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('upload_logo');?>" method="POST" enctype="multipart/form-data">                              
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputFile">School Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="exampleInputFile" accept="image/*" required>
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>                      
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Upload</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageStaff">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Staff</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('save_staff');?>" method="POST">     
                <input type="hidden" name="staff_id" id="staff_id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" name="staff_name" id="staff_name" placeholder="Staff Name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Status</label>
                    <select name="status" class="form-control" id="staff_status">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageStaffAccount">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Staff</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('save_staff_account');?>" method="POST">     
                <input type="hidden" name="staff_id" id="staff_account_id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" name="username" id="staff_username" placeholder="Staff USername">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Password</label>
                    <input type="password" class="form-control" name="password" id="staff_password" placeholder="Staff Password">
                </div>                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageCourse">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Course Manager</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('save_course');?>" method="POST">     
                <input type="hidden" name="course_id" id="course_id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Course</label>
                    <input type="text" class="form-control" name="description" id="course_name" placeholder="Description">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price/Unit</label>
                    <input type="text" class="form-control" name="unitcost" id="course_amount" placeholder="Price per Unit">
                </div>                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageGrade">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Grade Manager</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('save_grade');?>" method="POST">     
                <input type="hidden" name="grade_id" id="grade_id">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Grade Description</label>
                    <input type="text" class="form-control" name="description" id="grade_name" placeholder="Description">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price/Year</label>
                    <input type="text" class="form-control" name="unitcost" id="grade_amount" placeholder="Price per Year">
                </div>                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageStudentCollege">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Student Manager (College)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('save_student');?>" method="POST">     
                <input type="hidden" name="id" id="student_college_id">
                <input type="hidden" name="type" value="college">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Student ID</label>
                    <input type="text" class="form-control" name="student_id" id="st_col_id" placeholder="Student ID" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="st_col_lastname" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="st_col_firstname" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input type="text" class="form-control" name="middlename" id="st_col_middlename" placeholder="Middle Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea name="address" class="form-control" rows="3" id="st_col_address"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <select name="gender" class="form-control" id="st_col_gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date of Birth</label>
                    <input type="date" class="form-control" name="birthdate" id="st_col_birthdate" placeholder="Birthdate" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course</label>
                    <select name="course" class="form-control" id="st_col_course">
                        <?php
                        $course=$this->Billing_model->getAllCourse();
                        foreach($course as $row){
                            echo "<option value='$row[id]'>$row[description]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageStudentHigh">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Student Manager (High School)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('save_student');?>" method="POST">     
                <input type="hidden" name="id" id="student_high_id">
                <input type="hidden" name="type" value="highschool">
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Student ID</label>
                    <input type="text" class="form-control" name="student_id" id="st_high_id" placeholder="Student ID" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" name="lastname" id="st_high_lastname" placeholder="Last Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" name="firstname" id="st_high_firstname" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Middle Name</label>
                    <input type="text" class="form-control" name="middlename" id="st_high_middlename" placeholder="Middle Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Address</label>
                    <textarea name="address" class="form-control" rows="3" id="st_high_address"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <select name="gender" class="form-control" id="st_high_gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Date of Birth</label>
                    <input type="date" class="form-control" name="birthdate" id="st_high_birthdate" placeholder="Birthdate" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course</label>
                    <select name="course" class="form-control" id="st_high_course">
                        <?php
                        $course=$this->Billing_model->getAllGrade();
                        foreach($course as $row){
                            echo "<option value='$row[id]'>$row[description]</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ExamFrequency">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Exam Frequency</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
              $freq=$this->Billing_model->getExamFrequency();
              if($freq){
                $fr=$freq['frequency'];
              }else{
                $fr=1;
              }
            ?>
            <form action="<?=base_url('save_exam_frequency');?>" method="POST">                              
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputFile">No of Examination</label>
                    <input type="text" class="form-control" name="frequency" value="<?=$fr;?>" required>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ViewStudentDetails">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Student Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p id="student_details"></p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!-- <a href="<?=base_url('logout');?>" class="btn btn-danger">Yes, I will go!</a> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="ManageAccountCollege">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Student Account Manager (College)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('save_student_account');?>" method="POST">                     
                <input type="hidden" name="student_id" id="account_college_id">
                <input type="hidden" name="course" id="account_course">
                <input type="hidden" name="unitcost" id="account_college_unitcost">
                <input type="hidden" name="type" value="college">
            <div class="modal-body">                
                <div class="form-group">
                    <label for="exampleInputEmail1">No. of Units</label>
                    <input type="number" class="form-control" name="units" id="account_units" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Semester</label>
                    <select name="semester" class="form-control" id="account_semester" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">School Year</label>
                    <input type="text" class="form-control" name="syear" id="account_syear" placeholder="School Year (YYYY-YYYY)" required>
                </div>                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="SchoolYear">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Set School Year</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            $schoolyear=$this->Billing_model->getSchoolYear();
            if($schoolyear){
              $syear=$schoolyear['schoolyear'];
              $sem=$schoolyear['semester'];
            }else{
              $syear="";
              $sem="";
            }
            $one="";$two="";
            if($sem=="1"){
              $one="selected";              
            }
            if($sem=="2"){
              $two="selected";              
            }
            ?>
            <form action="<?=base_url('save_schoolyear');?>" method="POST">                              
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputFile">Active School Year</label>                    
                    <input type="text" name="syear" class="form-control" value="<?=$syear;?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Semester</label>
                    <select name="semester" class="form-control" required>                      
                      <option value="1" <?=$one;?>>1</option>
                      <option value="2" <?=$two;?>>2</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageAccountHigh">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Student Account Manager (High School)</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?=base_url('save_student_account');?>" method="POST">                     
                <input type="hidden" name="student_id" id="account_hs_id">
                <input type="hidden" name="course" id="account_grade">
                <input type="hidden" name="unitcost" id="account_hs_unitcost">
                <input type="hidden" name="type" value="high">
            <div class="modal-body">                                
                <div class="form-group">
                    <label for="exampleInputEmail1">School Year</label>
                    <input type="text" class="form-control" name="syear" id="account_syear_hs" placeholder="School Year (YYYY-YYYY)" required>
                </div>                                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      <div class="modal fade" id="ManageBilling">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Billing Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>            
            <?php
            $profile = $this->Billing_model->getSingleStudent($school_id,$student_id);
            if($profile['student_type']=="college"){
              $freq=$this->Billing_model->getExamFrequency();
              if($freq){
                $fr=$freq['frequency'];
              }else{
               $fr=1;
              }
            }else{
              $fr=10;
            }
            $bill=$this->Billing_model->getBillHistory($profile['school_id'],$profile['student_id'],$this->session->semester,$this->session->schoolyear,$profile['student_type']);
            if(count($bill) > 0){
              $fr = $fr-count($bill);
            }
            if($fr <= 0){
              $fr=1;
            }

            $payable=$profile['rem_balance']/$fr;
            ?>
            <form action="<?=base_url('save_billing');?>" method="POST">
              <input type="hidden" name="school_id" value="<?=$school_id;?>">
              <input type="hidden" name="student_id" value="<?=$student_id;?>">
              <input type="hidden" name="type" value="<?=$profile['student_type'];?>">
            <div class="modal-body">        
              <div class="form-group">
                  <label>Bill Date</label>
                  <input type="date" name="bill_date" class="form-control" value="<?=date('Y-m-d');?>">
              </div>
              <div class="form-group">
                  <label>Due Date</label>
                  <input type="date" name="due_date" class="form-control" value="<?=date('Y-m-d',strtotime('+7 days'));?>">
              </div>
              <div class="form-group">
                  <label>Amount</label>
                  <input type="text" name="bill_amount" class="form-control" value="<?=$payable;?>">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</a>
            </div>
          </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="GCashAccount">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Manage GCash Account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <?php
            $cash=$this->Billing_model->getGCashDetails();
            ?>
            <form action="<?=base_url('save_gcash');?>" method="POST" enctype="multipart/form-data">                                     
            <div class="modal-body">                                
                <div class="form-group">
                    <label for="exampleInputEmail1">Account Number</label>
                    <input type="text" class="form-control" name="accnum" id="account_syear_hs" placeholder="Phone No. 091xxxxxx" required value="<?=$cash['acctno'];?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Account Name</label>
                    <input type="text" class="form-control" name="accname" id="account_syear_hs" placeholder="Account Name" required value="<?=$cash['acctname'];?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">QR Code</label>
                    <input type="file" class="form-control" name="file" id="account_syear_hs" placeholder="Account Name" required>
                </div>                                          
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>