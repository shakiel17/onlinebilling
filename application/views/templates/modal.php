<div class="modal fade" id="NewUser" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">User Manager</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?=base_url('save_user_account');?>" method="POST">
            <input type="hidden" name="userid" id="user_id">
            <div class="modal-body">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" class="form-control" name="fullname" required id="user_fullname">
                </div>
                <div class="form-group">
                    <label>Designation</label>
                    <select name="designation" class="form-control" required id="user_role">
                        <option value="Cashier">Cashier</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" id="user_name">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" id="user_password">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="ChangePassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Password Manager</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?=base_url('change_password');?>" method="POST">
            <input type="hidden" name="username" value="<?=$this->session->username;?>">
            <div class="modal-body">                
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="oldpassword">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="newpassword">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>

<div class="modal fade" id="UserPassword" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="myModalLabel2">Password Manager</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="<?=base_url('change_user_password');?>" method="POST">
            <input type="hidden" name="customer_id" value="<?=$this->session->customer_id;?>">
            <div class="modal-body">                
                <div class="form-group">
                    <label>Current Password</label>
                    <input type="password" class="form-control" name="oldpassword">
                </div>
                <div class="form-group">
                    <label>New Password</label>
                    <input type="password" class="form-control" name="newpassword">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
    </div>
</div>