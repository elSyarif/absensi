<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= base_url('/assets/icon/favicon.ico'); ?>" type="image/x-icon">

    <title>Absensi : <?= $title; ?></title>

    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/pages/jquery-ui/jquery-ui.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/bower_components/bootstrap-tagsinput/css/bootstrap-tagsinput.css') ?>">
    <?php $this->load->view('master/_meta'); ?>


    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- Navbar -->
            <?php $data['picture'] = $users_auth['picture']; ?>
            <?php $this->load->view('master/_navbar', $data); ?>
            <!-- End Navbar -->
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- sidebar -->
                    <?php $this->load->view('master/_sidebar') ?>
                    <!-- End Sidebar -->
                    <!-- content -->
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="alert alert-success" style="display: none;">

                                    </div>
                                    <div class="page-header">
                                        <div class="row align-items-end">
                                            <div class="col-lg-8">
                                                <div class="page-header-title">
                                                    <div class="d-inline">
                                                        <h4><?= $judul ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="page-body">
                                        <?php if ($this->session->flashdata('Sukses')) : ?>
                                        <div id="alert" class="alert alert-primary background-primary">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <i class="icofont icofont-close-line-circled text-white"></i>
                                            </button>
                                            <strong>Pengaturan!</strong> <?= $this->session->flashdata('Sukses') ?>
                                        </div>
                                        <?php endif ?>
                                        <div class="card">
                                            <div class="card-header">
                                                <form action="<?php echo base_url('Karyawan/set_libur'); ?>" method="POST">

                                                    <div class="form-group row">
                                                        <label for="nama" class="col-md-1 col-form-label">Nama</label>
                                                        <div class="col-sm-4">
                                                            <input id="nama" name="nama" class="form-control" autocomplete="off" required type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="no_akun" class="col-sm-1 col-form-label">No Akun</label>
                                                        <div class="col-sm-2">
                                                            <input id="no_akun" name="no_akun" class="form-control" type="text" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nip" class="col-sm-1 col-form-label">NIP</label>
                                                        <div class="col-sm-2">
                                                            <input type="text" id="nip" name="nip" class="form-control" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="waktu" class="col-sm-1 col-form-label">Tanggal</label>
                                                        <div class="col-sm-4">
                                                            <input type="date" data-role="tagsinput" id="waktu" name="waktu" class="form-control" autocomplete="off" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="status" class="col-sm-1 col-form-label">Status</label>
                                                        <div class="col-sm-3">
                                                            <select name="status" id="status" class="form-control">
                                                                <option value="Libur">Libur</option>
                                                                <option value="Ijin">Ijin</option>
                                                                <option value="Alfa">Alfa</option>
                                                                <option value="Sakit">Sakit</option>
                                                                <option value="Cuti">Cuti</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-1">
                                                            <input type="submit" id="simpan" name="simpan" value="simpan" class="btn btn-info">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="card-block">
                                        <div class="dt-responsive table-responsive">

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="container">
                            </div>
                            <!-- Modal -->
                            <div class="modal fade " tabindex="-1" id="modal">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modal-title"></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                <span class="sr-only">Close</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="modal-body">

                                        </div>
                                        <div class="modal-footer" id="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="modal-btn-save">Save changes</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
                        </div>
                    </div>
                </div>
            </div>

            <!--  -->
        </div>
    </div>
    </div>
    </div>

    <?php $this->load->view('master/_js');
    ?>
    <script type="text/javascript" src="<?= base_url('/assets/pages/jquery-ui/jquery-ui.js') ?>"></script>
    <script src="<?= base_url('/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?= base_url('/bower_components/bootstrap-datepicker/build/js/moment.js') ?>"></script>
    <script src="<?= base_url('/bower_components/bootstrap-datepicker/build/js/bootstrap-datetimepicker.min.js') ?>"></script>
    <script type="text/javascript">
        $(function() {
            $('#datetimepicker1').datetimepicker();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#nama').autocomplete({
                source: "<?php echo base_url('Karyawan/get_auto?'); ?>",
                select: function(event, ui) {
                    $('[name="nama"]').val(ui.item.label);
                    $('[name="no_akun"]').val(ui.item.akun);
                    $('[name="nip"]').val(ui.item.nip);
                }
            });
            $(function() {
                $("#alert").delay(2000).fadeOut();
            });

        })
    </script> 