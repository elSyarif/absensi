<div id="alert-danger" class="alert alert-danger" style="display:none"></div>

<?php echo form_open('user/store', 'novalidate','id="myform"'); ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input id="id" name="id" class="form-control" type="hidden">
            <input type="text" class="form-control" name="username" id="username" placeholder="username" autocomplete="off" required="required">
            <span class="messages form-txt-danger"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span class="messages form-txt-danger"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" autocomplete="off">
            <span class="messages form-txt-danger"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-control">
                <option value="1">Admin</option>
                <option value="2">User</option>
            </select>
            <span class="messages form-txt-danger"></span>
        </div>
    </div>
<?php echo form_close(); ?>
