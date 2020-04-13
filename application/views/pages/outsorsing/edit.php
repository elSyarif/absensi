<div id="alert-danger" class="alert alert-danger" style="display:none"></div>

<?php echo form_open('outsorsing/update', 'novalidate', 'id="myform"'); ?>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input id="id" name="id" class="form-control" type="hidden" value="<?= $row['id']; ?>">
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Instansi" autocomplete="off" required="required" value="<?= $row['nama']; ?>">
            <span class="messages form-txt-danger"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?= $row['alamat']; ?>">
            <span class="messages form-txt-danger"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">No Telp</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="08123456789" autocomplete="off" value="<?= $row['no_telp']; ?>">
            <span class="messages form-txt-danger"></span>
        </div>
    </div>
    <!-- <div class="form-group row">
        <label class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-control">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <span class="messages form-txt-danger"></span>
        </div>
    </div> -->
<?php echo form_close(); ?>
