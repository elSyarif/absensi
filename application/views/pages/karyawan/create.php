<div id="alert-danger" class="alert alert-danger" style="display:none"></div>

<?php echo form_open($link . '/store', 'novalidate', 'id="myform"'); ?>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
    <div class="col-sm-9">
        <input id="id" name="id" class="form-control" type="hidden" value="">
        <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off" required="required">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">No. KTP</label>
    <div class="col-sm-9">
        <input type="number" class="form-control" name="nik" id="nik" placeholder="No KTP" autocomplete="off">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Tempat Lahir</label>
    <div class="col-sm-3">
        <input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" autocomplete="off" placeholder="Tempat Lahir">
        <span class="messages form-txt-danger"></span>
    </div>
    <div class="col-sm-6">
        <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" autocomplete="off" placeholder="Tgl Lahir">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">NIP</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="nip" id="nip" autocomplete="off" placeholder="Nomor Induk Pekerja">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">No Telp</label>
    <div class="col-sm-9">
        <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="08123456789" autocomplete="off">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Gol Darah</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="gol_darah" id="gol_darah" placeholder="Gol Darah" autocomplete="off">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">NPWP</label>
    <div class="col-sm-9">
        <input type="number" class="form-control" name="npwp" id="npwp" placeholder="NPWP" autocomplete="off">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Agama</label>
    <div class="col-sm-9">
        <select name="agama" id="agama" class="form-control">
            <option value="" selected>-pilih-</option>
            <option value="Islam">Islam</option>
            <option value="Kristen">Kristen</option>
            <option value="Katolik">Katolik</option>
            <option value="Budha">Budha</option>
            <option value="Hindu">Hindu</option>
            <option value="Kohucu">Kohucu</option>
        </select>
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Alamat</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" autocomplete="off">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Divisi</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="divisi" id="divisi" placeholder="Divisi" autocomplete="off">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">Instansi</label>
    <div class="col-sm-9">
        <select name="kd_outsorsing" id="kd_outsorsing" class="form-control">
            <?php foreach ($instansi as $item) { ?>
            <option value="<?= $item->id ?>"><?= $item->nama ?></option>
            <?php 
					} ?>
            <!-- <option value="user">User</option> -->
        </select>
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-3 col-form-label">No Akun</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="no_akun" id="no_akun" placeholder="No Akun" autocomplete="off">
        <span class="messages form-txt-danger"></span>
    </div>
</div>
<?php echo form_close(); ?> 