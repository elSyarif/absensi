<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="<?= base_url('/assets/icon/favicon.ico'); ?>" type="image/x-icon">

    <title><?= $title; ?></title>

    <?php $this->load->view('master/_meta'); ?>
      <link rel="stylesheet" type="text/css" href="<?= base_url('/bower_components/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/pages/foo-table/css/footable.bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/pages/foo-table/css/jquery.dataTables.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('/assets/pages/foo-table/css/footable.standalone.min.css') ?>">

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
              <div class="page-header">
                <div class="row align-items-end">
                  <div class="col-lg-8">
                    <div class="page-header-title">
                      <div class="d-inline">
                        <h4>Import Absensi</h4>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="page-body">
                <div class="card">
                  <div class="card-header">
                    	<form method="post" action="<?= base_url('Absensi/form') ?>" enctype="multipart/form-data">
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <input id="file" name="file" class="form-control" type="file">
                            </div>
                            <div class="col-sm-2">
                                <input class="pull-left btn btn-primary" type="submit" name="preview" value="Preview">
                            </div>
                        </div>
                    </form>
                  </div>
                  <!--  -->
                  <!-- <div class="card-block">
                    
                    <table id="myFoo" class="table table-striped" data-paging="true">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>No Akun</th>
                          <th>NIP</th>
                          <th>Nama</th>
                          <th data-breakpoints="xs">Waktu</th>
                          <th data-breakpoints="xs">Kondisi</th>
                          <th data-breakpoints="xs">Kondisi Baru</th>
                          <th data-breakpoints="xs">Status</th>
                          <th data-breakpoints="xs">Operasi</th>
                        </tr>
                      </thead>
                          
                      <tbody>
                        <tr>
                          <td>#</td>
                          <td>No Akun</td>
                          <td>NIP</td>
                          <td>Nama</td>   
                          <td>Waktu</td>
                          <td>Kondisi</td>
                          <td>Kondisi Baru</td>
                          <td>Status</td>
                          <td>Operasi</td>
                        </tr>
                      </tbody>
                    </table>
                  </div> -->
                </div>
              </div>
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
  <script type="text/javascript" src="<?= base_url('/assets/pages/foo-table/js/footable.min.js') ?>"></script>
  <script>
    $(document).ready(function() {
      $("#myFoo").footable({
        "paging": {
				"enabled": true
        },
        "sorting": {
          "enabled": true
        },
      });
    });
  </script>
