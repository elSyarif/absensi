<form id="form" method="POST" action="<?= base_url('user/update'); ?>" novalidate>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
            <input id="id" name="id" class="form-control" type="hidden" value="<?= $user['id'] ?>">
            <input type="text" class="form-control" name="username" id="username" placeholder="username" autocomplete="off" value="<?= $user['username'] ?>">
            <span class="messages"></span>
        </div>
    </div>
    <!-- <div class="form-group row">
        <label class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <span class="messages"></span>
        </div>
    </div> -->
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" autocomplete="off" value="<?= $user['nama'] ?>">
            <span class="messages"></span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-10">
            <select name="role" id="role" class="form-control">
                <option value="1" <?php if ($user['role'] == 'admin') {
                                            echo "selected";
                                        } ?>>Admin</option>
                <option value="2" <?php if ($user['role'] == 'user') {
                                        echo "selected";
                                    } ?>>User</option>
            </select>
            <span class="messages"></span>
        </div>
    </div>
</form>