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