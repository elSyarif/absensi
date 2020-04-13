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
                <?php if (isset($_POST['preview'])) {
                  if (isset($upload_error)) {
                    echo "<div class='col-md-8'>";
                    echo "<span style='color: red;'>" . $upload_error . "</span>"; // Muncul pesan error upload
                    echo "</div>";
                  }
                  echo '<div class="card-block">';
                  echo '<form action="' . base_url('Absensi/import') . '" method="post">';
                  echo "<div style='color: red;' id='kosong'>
                        Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
                        </div>";

                  echo '<table id="myFoo" class="table table-striped" data-paging="true">';
                  echo '<thead>';
                  echo '<tr>
                          <th>#</th>
                          <th>No Akun</th>
                          <th>NIP</th>
                          <th>Nama</th>
                          <th data-breakpoints="xs">Waktu</th>
                          <th data-breakpoints="xs">Kondisi</th>
                          <th data-breakpoints="xs">Kondisi Baru</th>
                          <th data-breakpoints="xs">Status</th>
                          <th data-breakpoints="xs">Operasi</th>
                        </tr>';
                  echo '</thead>';

                  $numrow = 1;
                  $kosong = 0;
                  echo '<tbody>';
                  $i = 0;
                  foreach ($sheet as $row) {
                    $no_akun = $row['A'];
                    $nip = $row['B'];
                    $nama = $row['C'];
                    $waktu = $row['D'];
                    $kondisi = $row['E'];
                    $kondisi_baru = $row['F'];
                    $status = $row['G'];
                    $operasi = $row['H'];

                    if (empty($no_akun) && empty($nama) && empty($waktu) && empty($kondisi)) continue;

                    if ($numrow > 1) {
                      $no_akun_td = (!empty($no_akun)) ? "" : "style='background: #E07171;'";
                      $nama_td = (!empty($nama)) ? "" : " style='background: #E07171;'";
                      $waktu_td = (!empty($waktu)) ? "" : "style='background: #E07171;'";
                      $kondisi_td = (!empty($kondisi)) ? "" : "style='background: #E07171;'";

                      if (empty($no_akun) or empty($nama) or empty($waktu) or empty($kondisi)) {
                        $kosong++;
                      }
                      ?>
						
							<tr>
								<td><?= $i ?></td>
                <td<?= $no_akun_td; ?>> <?= $no_akun ?></td>
                <td><?= $nip ?></td>
								<td<?= $nama_td; ?>><?= $nama ?></td>
								<td<?= $waktu_td; ?>><?= $waktu ?></td>
								<td<?= $kondisi_td; ?>><?= $kondisi ?></td>
								<td><?= $kondisi_baru ?></td>
								<td><?= $status ?></td>
								<td><?= $operasi ?></td>
							</tr>
				<?php	
  }
  $numrow++;
  $i++;
}
echo '</tbody>';
echo '</table>';
if ($kosong > 0) {
  ?>
					<script>
						$(document).ready(function(){
							// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
							$("#jumlah_kosong").html('<?php echo $kosong; ?>');
							
							$("#kosong").show(); // Munculkan alert validasi kosong
						});
				</script>
				<?php

  } else {
				// Buat sebuah tombol untuk mengimport data ke database
    echo "<button type='submit' class='btn btn-success' name='import'>Import</button>";
    echo "<a class='btn btn-default' href='" . base_url("Karyawan/Absensi") . "'>Cancel</a>";
  }
  echo '</form>';
  echo '</div>';
} ?>
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
    $("#kosong").hide();

      $("#myFoo").footable({
        "paging": {
				"enabled": true
        },
      });
    });
  </script>
