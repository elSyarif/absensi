<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= base_url('/assets/icon/favicon.ico'); ?>" type="image/x-icon">

    <title><?= $title; ?></title>
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/pages/data-table/extensions/responsive/css/responsive.dataTables.css">
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
                                                        <!-- <h4></h4> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="page-body">

                                        <div class="card">
                                            <div class="card-header">
                                                <!-- opt -->
                                                <h4>Daftar Laporan </h4>
                                                <div class="card-block">
                                                    <div class="dt-responsive table-responsive">
                                                        <ul class="nav nav-tabs md-tabs" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link active" data-toggle="tab" href="#bulan" role="tab">Laporan Per-Bulan</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab">Laporan Per-Instansi</a>
                                                                <div class="slide"></div>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                    <!-- isi Tab -->
                                                    <div class="tab-content card-block">
                                                        <div class="tab-pane active" id="bulan" role="tabpanel">
                                                            <?= form_open('Laporan/list_laporan', ''); ?>
                                                            <div class="form-group">
                                                                <select name="bulan" id="bulan" class="form-control">
                                                                    <option value="1">Januari</option>
                                                                    <option value="2">Februari</option>
                                                                    <option value="3">Maret</option>
                                                                    <option value="4">April</option>
                                                                    <option value="5">Mei</option>
                                                                    <option value="6">Juni</option>
                                                                    <option value="7">Juli</option>
                                                                    <option value="8">Agustus</option>
                                                                    <option value="9">September</option>
                                                                    <option value="10">Oktober</option>
                                                                    <option value="11">November</option>
                                                                    <option value="12">Desember</option>
                                                                </select>
                                                            </div>
                                                            <input type="submit" value="PDF" class="btn btn-primary">
                                                            <?= form_close(); ?>
                                                        </div>
                                                        <div class="tab-pane" id="profile3" role="tabpanel">
                                                            <?= form_open('Laporan/per_instansi', ''); ?>
                                                            <div class="form-group row">
                                                                <div class="col-sm-4">
                                                                    <select name="instansi" id="instansi" class="form-control">
                                                                        <?php foreach ($instansi as $row) : ?>
                                                                        <option value="<?= $row->id ?>"><?= $row->nama ?></option>
                                                                        <?php endforeach ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-sm-4">
                                                                    <select name="bulan" id="bulan" class="form-control">
                                                                        <option value="1">Januari</option>
                                                                        <option value="2">Februari</option>
                                                                        <option value="3">Maret</option>
                                                                        <option value="4">April</option>
                                                                        <option value="5">Mei</option>
                                                                        <option value="6">Juni</option>
                                                                        <option value="7">Juli</option>
                                                                        <option value="8">Agustus</option>
                                                                        <option value="9">September</option>
                                                                        <option value="10">Oktober</option>
                                                                        <option value="11">November</option>
                                                                        <option value="12">Desember</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <input type="submit" value="PDF" class="btn btn-primary">
                                                            <?= form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- conten -->

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Modal -->
                                <div class="modal fade " tabindex="-1" id="modal">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="modal-title"></h4>
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